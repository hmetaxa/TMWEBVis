<?php
$myFile = "data/graph_".$_POST["experiment"]."_".$_POST["similarity"]."_".$_POST["gravity"]."_".$_POST["charge"].".json";
$fh = fopen($myFile, 'w') or die("can't open file");

$nodes = str_replace("\\","",$_POST["datanodes"]);
$links = str_replace("\\","",$_POST["datalinks"]);

$everything = array();
$everything['nodes'] = $nodes;
$everything['links'] = $links;

fwrite($fh, json_encode($everything,JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE));

unset($everything);
fclose($fh)
?>