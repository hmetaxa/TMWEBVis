<?

///////////////////////////////////
///// back-end configuration  /////
///////////////////////////////////


$max_execution_time = 120;  //300 seconds = 5 minutes
$memory_limit = '4096M';	//'-1';		// unlimited memory
$memcache_port = 11211;
$db_name = "PTMDB_ACM2016.db";
$db_path = "../../../dbs/".$db_name;

$memcache_time = 2592000;				//600 = 10 minutes 		//2592000 = 30 days (maximum for memcached) //600 = 10 minutes




// splits authorsid from string to array elements
$pieces = explode("_", $_GET['id']);
//echo $pieces[0]; // piece1
//echo $pieces[1]; // piece2

$trend_query = "select td.Title, ta.Item, ta.Counts, ta.TopicId from TopicAnalysis as ta, TopicDescription as td
where ta.TopicId=td.TopicId and ";
foreach ($pieces as $key=>&$value) {
    if ($key > 0)
        $trend_query .= " or ";
    $trend_query .= "ta.TopicId='".$value."'  ";
}
$trend_query .= " order by ta.topicid ";
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
