<?php

class database1 {
    private $db,$last_query = null;

    function __construct($type,$host,$port,$name,$username,$password){
        try {
            switch($type){
                case 'postgres':
                    try{
                        $this->db = new PDO('pgsql:host='.$host.';port='.$port.';dbname='.$name.';user='.$username.';password='.$password);
                    }
                    catch(PDOException $e){
                        echo $e->getMessage();
                    }
                    break;
                case 'sqlite':
                    try{
                        $this->db = new PDO('sqlite:'.$name);
                    }
                    catch(PDOException $e){
                        echo $e->getMessage();
                    }
                    break;
                default:
                    error_log("not known database type", 0);
                    break;
            }
        } catch(Exception $e){
            echo "oops..".$e->getMessage()."\n";
            exit;
        }
    }

    function doQuery($query){
        $stmt = $this->db->query($query);
        $this->last_query = $query;

        if(!$stmt){
            var_dump($this->db->errorInfo());
            error_log("Failed to do query with message: ".$this->db->errorInfo(), 0);

            return false;
        }
        return $stmt;
    }

    function doPrepare($query){
        $stmt = $this->db->prepare($query);
        $this->last_query = $query;
        if(!$stmt){
            error_log("Failed to prepare query with message: ".$this->db->errorInfo(), 0);
            return false;
        }
        return $stmt;
    }

    function doExecute($stmt,$params){
        if(!$stmt->execute($params)){
            error_log("Failed to execute query with message: ".$stmt->errorInfo(), 0);
            return false;
        }
        return $stmt;
    }

}

if(!isset($_GET['ex'])){
    echo "Parameter 'ex' on URL not set";
}


$mydb = new database1("sqlite","",0,$db_path,"","");



/////////////////////////
///// TOPICS QUERY //////
/////////////////////////

$query = $query_topics;
$topics = array();
echo $query;

$stmt = $mydb->doQuery($query);
echo $stmt;
$res = $stmt->fetch();
do {
    if(!isset($topics[$res[2]]))
        $topics[$res[2]] = array();
    array_push($topics[$res[2]],array("title"=>$res[0]));
} while ($res = $stmt->fetch());


$everything = array();
$everything['topics'] = $topics;
//	print_r($everything['resp']);

//echo json_decode(json_encode($everything, JSON_UNESCAPED_UNICODE));
// encode in every possibility
$output = json_encode($everything,JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
echo $output;

$old = umask(0);

//TODO http://stackoverflow.com/questions/8103860/move-uploaded-file-gives-failed-to-open-stream-permission-denied-error-after$file = fopen("../data/layout_".$_GET['ex']."_".$_GET['s'].".json","w");

// cd layouts/acm/data 		or			cd layouts/openaire/data
// sudo chown daemon ./				// set owner the www-data or daemon in order to be able the client to create file
// sudo chmod -R 0755 ./

// write output to file
$myFile = "../data/topics_".$_GET['ex'].".json";
$file = fopen($myFile,"w");
fwrite($file, $output);
fclose($file);

unset($everything);//release memory

?>