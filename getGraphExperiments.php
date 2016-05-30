<?php

$db_name = "PTM3DB_oct15.db";

include "./common.php";
include "./database.php";


$query_experiments = "select distinct ExperimentId,Description from experiment";

if (!isset($_GET['s']) || !isset($_GET['ex'])) {
    echo "Parameters 's' and 'ex' on URL not set";
}

$mydb = new database("sqlite", "", 0, $db_path, "", "");


///// EXPERIMENTS QUERY //////

$query = $query_experiments;
$experiments = array();
$stmt = $mydb->doQuery($query);
$res = $stmt->fetch();
do {
    array_push($experiments, array("id" => $res[0], "desc" => $res[1], "Metadata" => $res[2], "initialSimilarity" => $res[3], "PhraseBoost" => $res[4]));
} while ($res = $stmt->fetch());

$everything = array();
$everything['expers'] = $experiments;

$output = json_encode($everything, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
echo $output;

unset($everything);//release memory