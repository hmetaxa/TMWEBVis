<?php

$db_name = "PTM3DB_oct15.db";

include "./common.php";
include "./database.php";

$query_topics = "select TopicId,Item, WeightedCounts,title, ExperimentId from topicsweightsort where ExperimentId=?";

if (!isset($_GET['s']) || !isset($_GET['ex'])) {
    echo "Parameters 's' and 'ex' on URL not set";
}

$mydb = new database("sqlite", "", 0, $db_path, "", "");


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



$everything = array();
$everything['topics'] = $topics;

$output = json_encode($everything, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
echo $output;

unset($everything);//release memory