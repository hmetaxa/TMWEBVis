<?php

$db_name = "PTM3DB.db";

include "./common.php";
include "./database.php";


$query_topicids = "select DISTINCT TopicId from TopicDescription where ExperimentId=?";


if (!isset($_GET['ex'])) {
    echo "Parameter 'ex' on URL not set";
}

$mydb = new database("sqlite", "", 0, $db_path, "", "");


///// TOPICS QUERY //////

$query = $query_topicids;
$topics = array();
$stmt = $mydb->doPrepare($query);
$stmt = $mydb->doExecute($stmt, array($_GET['ex']));
$res = $stmt->fetch();
do {
    array_push($topics, array("id" => $res[0]));
} while ($res = $stmt->fetch());


$everything = array();
$everything['topics'] = $topics;

$output = json_encode($everything, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
echo $output;

unset($everything);//release memory