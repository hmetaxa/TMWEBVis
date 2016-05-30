<?php

$db_name = "PTM3DB_oct15.db";

include "./common.php";
include "./database.php";

$trend_query = "Select TopicDistributionPerBatch.TopicId, BatchId, NormWeight, TotalAvgWeight, Title, TrendIndex, TopicDistributionPerBatch.ExperimentId
from TopicDistributionPerBatch
INNER Join ImportantTopicsView on ImportantTopicsView.TopicId = TopicDistributionPerBatch.TopicId
and ImportantTopicsView.ExperimentId = TopicDistributionPerBatch.ExperimentId
where JournalISSN='" . $_GET['id'] . "' AND TopicDistributionPerBatch.ExperimentId='" . $_GET['ex'] . "' order by TopicDistributionPerBatch.TopicId, BatchId, TrendIndex desc";


if (!isset($_GET['ex']) || !isset($_GET['ex'])) {
    echo "Parameter 'ex' or 'id' on URL not set";
}

$mydb = new database("sqlite", "", 0, $db_path, "", "");


///// TOPICS DISTRIBUTION PER YEAR : TRENDS //////

$everything = array();
$allTrends = array();
$query = $trend_query;
if ($query != null) {
    $trends = array();
    $stmt = $mydb->doQuery($query);
    $res = $stmt->fetch();
    do {
        array_push($trends, array("id" => $res[0], "year" => $res[1], "weight" => $res[2], "avgweight" => $res[3]));
    } while ($res = $stmt->fetch());
} else {
    $trends = null;
}

$everything['trends'] = $trends;

$output = json_encode($everything, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
echo $output;

unset($everything);//release memory
