<?php

$db_name = "PTM3DB_oct15.db";

include "./common.php";
include "./database.php";


$query_topicids = "select DISTINCT TopicId from topicsweightsort where ExperimentId=?";
$query_authorids = "select AuthorId from author";
$query_journalids = "select distinct JournalISSN from topicdistributionperbatch where ExperimentId=?";


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


///// AUTHORS QUERY //////

$query = $query_authorids;
$authors = array();
$stmt = $mydb->doQuery($query);
$res = $stmt->fetch();
do {
    array_push($authors, array("id" => $res[0]));
} while ($res = $stmt->fetch());


///// JOURNALS QUERY //////

$query = $query_journalids;
$journals = array();
$stmt = $mydb->doPrepare($query);
$stmt = $mydb->doExecute($stmt, array($_GET['ex']));
$res = $stmt->fetch();
do {
    array_push($journals, array("id" => $res[0]));
} while ($res = $stmt->fetch());



$everything = array();
$everything['topics'] = $topics;
$everything['authors'] = $authors;
$everything['journals'] = $journals;

$output = json_encode($everything, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
echo $output;

unset($everything);//release memory