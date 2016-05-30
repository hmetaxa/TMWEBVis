<?php

$db_name = "PTM3DB_oct15.db";

include "./common.php";
include "./database.php";


$pieces = explode("_", $_GET['id']);
$spider_query = "select FirstName, LastName, Title, Standard, authorid, topicid from authorRadar where ";
foreach ($pieces as $key => &$value) {
    if ($key > 0)
        $spider_query .= " or ";
    $spider_query .= " AuthorId='" . $value . "'  ";
}

if (!isset($_GET['ex']) || !isset($_GET['id'])) {
    echo "Parameter 'ex' or 'id' on URL not set";
}

$mydb = new database("sqlite", "", 0, $db_path, "", "");


///// TOPICS DISTRIBUTION PER YEAR : TRENDS //////

$everything = array();
$allTrends = array();

$query = $spider_query;

if ($query != null) {
    $trends = array();
    $trendsAllValues = array();
    $stmt = $mydb->doQuery($query);
    $res = $stmt->fetch();
    $topicids = array();
    do {
        // array with topics deduplicated
        if (!in_array($res[2], $topicids)) {
            $topicids[] = $res[2];
        }
        $name = $res[0] . " " . $res[1];
        array_push($trends, array("group" => $name, "axis" => $res[2], "value" => $res[3] * 100, "description" => $res[4], "topicid" => $res[5]));
    } while ($res = $stmt->fetch());

    $i = 0;
    $filename = "";
    while ($i < count($trends)) {
        $authorid = $trends[$i]["description"];
        $authorname = $trends[$i]["group"];
        $filename .= "_" . $trends[$i]["description"];
        for ($j = 0; $j < count($topicids); $j++) {
            if ($authorid == $trends[$i]["description"] && $trends[$i]["axis"] == $topicids[$j]) {
//                  echo "\n<2-".$authorid."-".$trends[$i]["axis"]."-".$topicids[$j].">\n";
                array_push($trendsAllValues, array("group" => $trends[$i]["group"], "axis" => $trends[$i]["axis"], "value" => $trends[$i]["value"], "description" => $trends[$i]["description"]));
                $i++;
            } else {
//                  echo "\n<1-".$authorid."-".$trends[$i]["axis"]."-".$topicids[$j].">\n";
                array_push($trendsAllValues, array("group" => $authorname, "axis" => $topicids[$j], "value" => 0, "description" => $authorid));
            }
        }
    }
} else {
    $trends = null;
    $trendsAllValues = null;
}

$everything['spider'] = $trendsAllValues;

$output = json_encode($everything, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
echo $output;

unset($everything);//release memory