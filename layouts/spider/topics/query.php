<?

///////////////////////////////////
///// back-end configuration  /////
///////////////////////////////////


$max_execution_time = 120;  //300 seconds = 5 minutes
$memory_limit = '4096M';	//'-1';		// unlimited memory
$memcache_port = 11211;
$db_name = "PTM3DB_oct15.db";
$db_path = "../../../dbs/".$db_name;

$memcache_time = 2592000;				//600 = 10 minutes 		//2592000 = 30 days (maximum for memcached) //600 = 10 minutes


// --Journals
// -- CACM, Communications of the ACM ISSN: 00010782
// -- ACM SIGSOFT Software Engineering Notes, 01635948
// --Journal of the ACM : 00045411
// -- ACM SIGMOD Record: 01635808
// -- ACM SIGPLAN Notices: 03621340
// -- ACM SIGGRAPH Computer Graphics: 00978930
//$move_elems = array('?');
//$set_elems = array("00010782","01635948","00045411","01635808","03621340","00978930");
//$set_elemsTitles = array("ACM Topic Trend Analysis 1950-2011","Journal: CACM, Communications of the ACM","Journal: ACM SIGSOFT Software Engineering Notes","Journal: Journal of the ACM","Journal: ACM SIGMOD Records","Journal: ACM SIGPLAN Notices","Journal: ACM SIGGRAPH Computer Graphics");

// DONT FORGET TO ALSO CHANGE THE TOTAL NUMBER OF TRENDS IN THE VARIABLE BELOW $trends_num

// general query for all trends


//--  LEFT OUTER JOIN  ImportantTopicsView on ImportantTopicsView.TopicId = TopicDistributionPerBatch.TopicId
//--                                    and ImportantTopicsView.ExperimentId = TopicDistributionPerBatch.ExperimentId

//-- prepei kai to journal na einai null gia na paroume ola ta journals kai oxi gia kathena

// splits authorsid from string to array elements
$pieces = explode("_", $_GET['id']);
//echo $pieces[0]; // piece1
//echo $pieces[1]; // piece2

$spider_query = "select Title, Item, WeightedCounts, TopicId from topicsweightsort as tw where ";
foreach ($pieces as $key=>&$value) {
    if ($key > 0)
        $spider_query .= " or ";
    $spider_query .= "tw.TopicId='".$value."'  ";
}
$spider_query .= " order by tw.topicid ";
//$spider_query = "Select authorid, TopicDistributionPerBatch.TopicId,  Standard, TopicDistributionPerBatch.ExperimentId
//from TopicDistributionPerBatch
//  INNER Join TopicDistributionPerAuthor on TopicDistributionPerAuthor.TopicId = TopicDistributionPerBatch.TopicId
//where AuthorId='".$_GET['layoutid']."' AND JournalISSN is NULL AND TopicDistributionPerBatch.ExperimentId='ACM_400T_1000IT_0IIT_100B_3M_cos' order by TopicDistributionPerBatch.TopicId";

// e.g.
//$query_trends1 = str_replace($move_elems, $set_elems[0], $query_trendsX);
//array_push($trends_queries,$query_trends1));

//$trends_queries = array();
//array_push($trends_queries,$query_trendsAll);
//foreach ($set_elems as &$elem) {
//    array_push($trends_queries,str_replace($move_elems, $elem, $query_trendsX));
//}
//

?>
