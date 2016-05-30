<?php

$db_name = "fp7mar16.db";

include "./common.php";
include "./database.php";

$query_graphLayout = "select * from mygraph";
$query_experiments = "select * from myexperiment";
$query_nodes = "select project_code, TopicId, weight
 from mynodes
 where ExperimentId=?";
$query_topics = "select TopicId, Item, WeightedCounts from
  mytopics
where experimentid=?";
$query_topics_nosort = "select TopicId, Item, WeightedCounts from
  mytopics
where experimentid=?";
$query_topicsdistribution = null;
$query_heatmap = null;
$query_trends = null;

if (!isset($_GET['s']) || !isset($_GET['ex'])) {
    echo "Parameters 's' and 'ex' on URL not set";
}


$mydb = new database("sqlite", "", 0, $db_path, "", "");


///// GRAPH LAYOUT QUERY /////

$query = $query_graphLayout;
$stmt = $mydb->doQuery($query);
while ($row = $stmt->fetch()) {
    foreach ($row as &$value) {
        $value = mb_convert_encoding($value, "UTF-8", "Windows-1252");
    }
    unset($value); # safety: remove reference

    $list[] = array_map('utf8_encode', $row);
}


///// EXPERIMENTS QUERY //////

$query = $query_experiments;
$experiments = array();
$stmt = $mydb->doQuery($query);
$res = $stmt->fetch();
do {
    array_push($experiments, array("id" => $res[0], "desc" => $res[1], "initialSimilarity" => $res[2]));
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
    array_push($topics[$res[0]], array("item" => $res[1], "counts" => $res[2], "title" => "aaaa"));
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
