<?php

$db_name = "PTM3DB_oct15.db";

include "./common.php";
include "./database.php";


$query_nodes = "select authorid, ta.topicid, Standard as weight from topicdistributionperauthor as ta,TopicDescription as td where ta.topicId=td.topicid and ExperimentId=? order by authorid, ta.TopicId";

if (!isset($_GET['s']) || !isset($_GET['ex'])) {
    echo "Parameters 's' and 'ex' on URL not set";
}

$mydb = new database("sqlite", "", 0, $db_path, "", "");


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


$everything = array();
$everything['nodes'] = nodes;

$output = json_encode($everything, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
echo $output;

unset($everything);//release memory