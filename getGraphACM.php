<?php

$db_name = "PTM3DB_oct15.db";

include "./common.php";
include "./database.php";


$query_graphLayout = "select node1id, node2id,node1name,node2name,category1_1,category1_2,category1_3,category2_1,category2_2,category2_3,category1_counts,category2_counts,Similarity from graphlayout where ExperimentId=? and  Similarity>?";
$query_experiments = "select distinct ExperimentId,Description from experiment";
$query_nodes = "select authorid, ta.topicid, Standard as weight from topicdistributionperauthor as ta,TopicDescription as td where ta.topicId=td.topicid and ExperimentId=? order by authorid, ta.TopicId";
$query_topics = "select TopicId,Item, WeightedCounts,title, ExperimentId from topicsweightsort where ExperimentId=?";
$query_topics_nosort = "select TopicId,Item, WeightedCounts,title, ExperimentId from topicsweightnosort 
where ExperimentId=?";
$query_topicsdistribution = null;
$query_heatmap = "select * from heatmap";
//for all
$query_trendsAll = "Select BatchId, TopicDistributionPerBatch.TopicId, NormWeight, Title,TrendIndex, TotalAvgWeight , TopicDistributionPerBatch.ExperimentId
from TopicDistributionPerBatch
INNER Join ImportantTopicsView on ImportantTopicsView.TopicId = TopicDistributionPerBatch.TopicId
and ImportantTopicsView.ExperimentId = TopicDistributionPerBatch.ExperimentId
where JournalISSN IS NULL AND TopicDistributionPerBatch.ExperimentId='ACM_400T_1000IT_0IIT_100B_3M_cos' order by TrendIndex desc";

$move_elems = array('?');
$set_elems = array("00010782", "01635948", "00045411", "01635808", "03621340", "00978930");
$set_elemsTitles = array("ACM Topic Trend Analysis 1950-2011", "Journal: CACM, Communications of the ACM", "Journal: ACM SIGSOFT Software Engineering Notes", "Journal: Journal of the ACM", "Journal: ACM SIGMOD Records", "Journal: ACM SIGPLAN Notices", "Journal: ACM SIGGRAPH Computer Graphics");

// DONT FORGET TO ALSO CHANGE THE TOTAL NUMBER OF TRENDS IN THE VARIABLE BELOW $trends_num

$query_trendsX = "Select BatchId, TopicDistributionPerBatch.TopicId, NormWeight, Title,TrendIndex, TotalAvgWeight , TopicDistributionPerBatch.ExperimentId
from TopicDistributionPerBatch
INNER Join ImportantTopicsView on ImportantTopicsView.TopicId = TopicDistributionPerBatch.TopicId
and ImportantTopicsView.ExperimentId = TopicDistributionPerBatch.ExperimentId
where JournalISSN='?' AND TopicDistributionPerBatch.ExperimentId='ACM_400T_1000IT_0IIT_100B_3M_cos' order by TrendIndex desc";

$trends_queries = array();
array_push($trends_queries, $query_trendsAll);
foreach ($set_elems as &$elem) {
    array_push($trends_queries, str_replace($move_elems, $elem, $query_trendsX));
}

if (!isset($_GET['s']) || !isset($_GET['ex'])) {
    echo "Parameters 's' and 'ex' on URL not set";
}

$mydb = new database("sqlite", "", 0, $db_path, "", "");


///// GRAPH LAYOUT QUERY /////

$query = $query_graphLayout;
$stmt = $mydb->doPrepare($query);
$stmt = $mydb->doExecute($stmt, array($_GET['ex'], $_GET['s']));
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    foreach ($row as &$value) {
        $value = mb_convert_encoding($value, "UTF-8", "Windows-1252");
    }
    unset($value); # safety: remove reference
    $list[] = array_map('utf8_encode', $row);
}
//print_r($list);

///// EXPERIMENTS QUERY //////

$query = $query_experiments;
$experiments = array();
$stmt = $mydb->doQuery($query);
$res = $stmt->fetch();
do {
    array_push($experiments, array("id" => $res[0], "desc" => $res[1], "Metadata" => $res[2], "initialSimilarity" => $res[3], "PhraseBoost" => $res[4]));
} while ($res = $stmt->fetch());


///// GRANTS QUERY //////

$query = $query_nodes;
$nodes = array();
$stmt = $mydb->doPrepare($query);
$stmt = $mydb->doExecute($stmt, array($_GET['ex']));
$res = $stmt->fetch();
do {
    if (!isset($nodes[$res[0]]))
        $nodes[$res[0]] = array();
    if (count($nodes[$res[0]]) > 3)
        continue;
    array_push($nodes[$res[0]], array("topic" => $res[1], "weight" => $res[2]));
} while ($res = $stmt->fetch());


///// TOPICS QUERY //////

$query = $query_topics;
$topics = array();
$stmt = $mydb->doPrepare($query);
$stmt = $mydb->doExecute($stmt, array($_GET['ex']));
$res = $stmt->fetch();
do {
    if (!isset($topics[$res[0]]))
        $topics[$res[0]] = array();
    if (count($topics[$res[0]]) > 9)
        continue;
    array_push($topics[$res[0]], array("item" => $res[1], "counts" => $res[2], "title" => $res[3]));
} while ($res = $stmt->fetch());


/////// TOPICS NOT SORTED QUERY //////

$query = $query_topics_nosort;
$topicsNoSort = array();
$stmt = $mydb->doPrepare($query);
$stmt = $mydb->doExecute($stmt, array($_GET['ex']));
$res = $stmt->fetch();
do {
    if (!isset($topicsNoSort[$res[0]]))
        $topicsNoSort[$res[0]] = array();
    if (count($topicsNoSort[$res[0]]) > 9)
        continue;
    array_push($topicsNoSort[$res[0]], array("item" => $res[1], "counts" => $res[2], "title" => $res[3]));
} while ($res = $stmt->fetch());


$everything = array();
$everything['resp'] = $list;
$everything['nodes'] = $nodes;
$everything['topics'] = $topics;
$everything['topicsNoSort'] = $topicsNoSort;
$everything['expers'] = $experiments;

$output = json_encode($everything, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
echo $output;

unset($everything);//release memory