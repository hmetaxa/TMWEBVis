<?php

$db_name = "PTM3DB_oct15.db";

include "./common.php";
include "./database.php";

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


$everything = array();
$everything['resp'] = $list;
$everything['nodes'] = $nodes;
$everything['topics'] = $topics;
$everything['topicsNoSort'] = $topicsNoSort;
$everything['expers'] = $experiments;

$output = json_encode($everything, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
echo $output;

unset($everything);//release memory