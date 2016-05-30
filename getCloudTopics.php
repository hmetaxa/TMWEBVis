<?php

$db_name = "PTM3DB_oct15.db";

include "./common.php";
include "./database.php";


$pieces = explode("_", $_GET['id']);
$trend_query = "select Title, Item, WeightedCounts, TopicId from topicsweightsort as tw where ";
foreach ($pieces as $key => &$value) {
    if ($key > 0)
        $trend_query .= " or ";
    $trend_query .= "tw.TopicId='" . $value . "'  ";
}
$trend_query .= " order by tw.topicid ";

if (!isset($_GET['ex']) || !isset($_GET['id'])) {
    echo "Parameter 'ex' or 'id' on URL not set";
}

$mydb = new database("sqlite", "", 0, $db_path, "", "");


///// TOPICS DISTRIBUTION PER YEAR : TRENDS //////

$everything = array();
$allTrends = array();
$trends = array();
$query = $trend_query;

$stmt = $mydb->doQuery($query);
$res = $stmt->fetch();
do {
    array_push($trends, array("id" => $res[3], "year" => $res[1], "weight" => $res[2], "avgweight" => $res[0]));
} while ($res = $stmt->fetch());
$everything['trends'] = $trends;

$output = json_encode($everything, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
echo $output;

unset($everything);//release memory