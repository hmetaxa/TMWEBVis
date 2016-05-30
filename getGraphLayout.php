<?php

$db_name = "PTM3DB_oct15.db";

include "./common.php";
include "./database.php";

$query_graphLayout = "select node1id, node2id,node1name,node2name,category1_1,category1_2,category1_3,category2_1,category2_2,category2_3,category1_counts,category2_counts,Similarity from graphlayout where ExperimentId=? and  Similarity>?";

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


$everything = array();
$everything['resp'] = $list;

$output = json_encode($everything, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
echo $output;

unset($everything);//release memory