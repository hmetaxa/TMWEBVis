<?

///////////////////////////////////
///// back-end configuration  /////
///////////////////////////////////


$max_execution_time = 120;  //300 seconds = 5 minutes
$memory_limit = '4096M';	//'-1';		// unlimited memory
$memcache_port = 11211;
//$db_name = "PTM3DB.db";
$db_name = "PTM3DB_oct15.db";
$db_path = "../../../dbs/".$db_name;

$memcache_time = 2592000;				//600 = 10 minutes 		//2592000 = 30 days (maximum for memcached) //600 = 10 minutes



// ta parakatw einai apo to openaire march
//$query_graphLayout = "select EntityId1,EntityId2,OurCategory1,CV1_Category0,CV1_Category1,OurCategory2,CV2_Category0,CV2_Category1,catCnts1,catCnts2,Similarity from EntitySimilarityView_cat where ExperimentId=?  and  Similarity>?";
// $query_graphLayout = "select EntityId1 as node1id,EntityId2 as node2id,Author1 as node1name,Author2 as node2name,AC1_Category0 as category1_1, AC1_Category0 as category1_2, AC1_Category0 as category1_3, AC2_Category0 as category2_1, AC2_Category0 as category2_2,AC2_Category0 as category2_3, catCnts1 as category1_counts,catCnts2 as category2_counts,Similarity from EntitySimilarityView_authors where ExperimentId=? and  Similarity>?";
$query_graphLayout = "select node1id, node2id,node1name,node2name,category1_1,category1_2,category1_3,category2_1,category2_2,category2_3,category1_counts,category2_counts,Similarity from graphlayout where ExperimentId=? and  Similarity>?";
// $query_graphLayout = "select node1id, node2id,node1name,node2name,category1_1,category1_2,category1_3,category2_1,category2_2,category2_3,category1_counts,category2_counts,Similarity from graphlayout where ExperimentId=? and  Similarity>?";
$query_experiments = "select distinct ExperimentId,Description from experiment";

//$query_nodes = "select PubCategoryview.Category, TopicId, AVG(weight) as Weight from topicsPerDoc Inner Join PubCategoryview on topicsPerDoc.DocId= PubCategoryview.PubId INNER JOIN (Select Category FROM PubCategoryview GROUP BY Category HAVING Count(*)>10) catCnts1 ON catCnts1.Category = PubCategoryview.category where weight>0.02 AND ExperimentId=? group By PubCategoryview.Category, TopicId order by  PubCategoryview.Category, Weight desc, TopicId";
// until Sept15
//$query_nodes = "select authorid, topicid, Weight from topicauthorview where ExperimentId=?";
//after Sept15
//$query_nodes = "select TopicDistributionPerAuthorView.AuthorId,
//TopicDistributionPerAuthorView.TopicId,
//TopicDistributionPerAuthorView.NormWeight as weight
//from TopicDistributionPerAuthorView
//where TopicDistributionPerAuthorView.experimentId=?  and
//TopicDistributionPerAuthorView.NormWeight>0.03
//and TopicDistributionPerAuthorView.topicid in (select TopicId from
//topicdescription
//where topicdescription.experimentId=? and topicdescription.VisibilityIndex>1)";

//gia to pt3md_oct15
$query_nodes = "select authorid, ta.topicid, Standard as weight from topicdistributionperauthor as ta,TopicDescription as td where ta.topicId=td.topicid and ExperimentId=? order by authorid, ta.TopicId";
//$query_nodes = "select AuthorId,TopicId, standard as weight from TopicDistributionPerAuthor where ExperimentId=?";

//$query_topics = "select TopicId,Item, WeightedCounts from topicdescriptionview where ExperimentId=? Order By TopicID ASC, WeightedCounts DESC";
// $query_topics = "select topicdescriptionview.TopicId,Item, WeightedCounts,title from topicdescriptionview 
// inner join topicdescription on topicdescription.topicid=topicdescriptionview.topicid
// and topicdescription.ExperimentId=topicdescriptionview.ExperimentId
// where topicdescription.ExperimentId=? Order By topicdescription.TopicID ASC, WeightedCounts DESC";
$query_topics = "select TopicId,Item, WeightedCounts,title, ExperimentId from topicsweightsort where ExperimentId=?";

//$query_topics_nosort = "select TopicId,Item, WeightedCounts from topicdescriptionview where ExperimentId=? Order By TopicID ASC, Counts DESC";
// $query_topics_nosort = "select topicdescriptionview.TopicId,Item, WeightedCounts,title from topicdescriptionview 
// inner join topicdescription on topicdescription.topicid=topicdescriptionview.topicid
// and topicdescription.ExperimentId=topicdescriptionview.ExperimentId
// where topicdescription.ExperimentId=? Order By topicdescription.TopicID ASC, Counts DESC";
$query_topics_nosort = "select TopicId,Item, WeightedCounts,title, ExperimentId from topicsweightnosort 
where ExperimentId=?";

//$query_topicsdistribution = "select * from topicsperyearview";
$query_topicsdistribution = null;
//$query_heatmap = "select * from heatmapview";
$query_heatmap = "select * from heatmap";
//$query_trends = "Select * from TopicDistributionPerBatch
//INNER JOIN TopicDescription on
//TopicDescription.TopicId=TopicDistributionPerBatch.TopicId
//AND TopicDescription.ExperimentId=TopicDistributionPerBatch.ExperimentId
//and  TopicDescription.VisibilityIndex>2
//where JournalISSN IS NULL AND (TopicDistributionPerBatch.TopicId IN
//(15,25,36,38,42,
//44,77,79,100,124,137,141,141,146,149,151,159,168,171,175,178,179,180,186,191,196,204,209,220,223,228,236,255,259,263,264,267,269,274,277,278,279,287,290,294,299,301,321,328,332,335,345,346,349,353,355,356,363,365,368,374,380,382))
//order by topicid,batchid";


//for all
$query_trendsAll = "Select BatchId, TopicDistributionPerBatch.TopicId, NormWeight, Title,TrendIndex, TotalAvgWeight , TopicDistributionPerBatch.ExperimentId
from TopicDistributionPerBatch
INNER Join ImportantTopicsView on ImportantTopicsView.TopicId = TopicDistributionPerBatch.TopicId
and ImportantTopicsView.ExperimentId = TopicDistributionPerBatch.ExperimentId
where JournalISSN IS NULL AND TopicDistributionPerBatch.ExperimentId='ACM_400T_1000IT_0IIT_100B_3M_cos' order by TrendIndex desc";

// --Journals
// -- CACM, Communications of the ACM ISSN: 00010782
// -- ACM SIGSOFT Software Engineering Notes, 01635948
// --Journal of the ACM : 00045411
// -- ACM SIGMOD Record: 01635808
// -- ACM SIGPLAN Notices: 03621340
// -- ACM SIGGRAPH Computer Graphics: 00978930
$move_elems = array('?');
$set_elems = array("00010782","01635948","00045411","01635808","03621340","00978930");
$set_elemsTitles = array("ACM Topic Trend Analysis 1950-2011","Journal: CACM, Communications of the ACM","Journal: ACM SIGSOFT Software Engineering Notes","Journal: Journal of the ACM","Journal: ACM SIGMOD Records","Journal: ACM SIGPLAN Notices","Journal: ACM SIGGRAPH Computer Graphics");

// DONT FORGET TO ALSO CHANGE THE TOTAL NUMBER OF TRENDS IN THE VARIABLE BELOW $trends_num


// general query for all trends
$query_trendsX = "Select BatchId, TopicDistributionPerBatch.TopicId, NormWeight, Title,TrendIndex, TotalAvgWeight , TopicDistributionPerBatch.ExperimentId
from TopicDistributionPerBatch
INNER Join ImportantTopicsView on ImportantTopicsView.TopicId = TopicDistributionPerBatch.TopicId
and ImportantTopicsView.ExperimentId = TopicDistributionPerBatch.ExperimentId
where JournalISSN='?' AND TopicDistributionPerBatch.ExperimentId='ACM_400T_1000IT_0IIT_100B_3M_cos' order by TrendIndex desc";

// e.g.
//$query_trends1 = str_replace($move_elems, $set_elems[0], $query_trendsX);
//array_push($trends_queries,$query_trends1));

$trends_queries = array();
array_push($trends_queries,$query_trendsAll);
foreach ($set_elems as &$elem) {
    array_push($trends_queries,str_replace($move_elems, $elem, $query_trendsX));
}


///////////////////////////////////
///// front-end configuration /////
///////////////////////////////////

$title = "ACM Authors";								// title of the webpage
$trends_title = "ACM Trends";								// title of the webpage when ACM
$chord_title = "Connectivity of ACM Authors / Category";								// title of the webpage when ACM
$subtitle = "";								// subtitle of the webpage
$experimentName = "ACM_400T_1000IT_0IIT_100B_3M_cos";	// first experiment to load
$experimentDescription = "Topic modeling based on: 1)Abstracts from ACM publications 2)Authors 3)Citations 4)ACMCategories SimilarityType:cos Similarity on Authors & Categories"; 	// first description to load
$node_name = "Author";
$node_groupName1 = "Authors";
$node_groupName2 = "Authors";
$node_areaName = "ACM Category";
$trends_num = 7;            // 6 Journals + 1 for all
$layout = "graph";

// appearance
$fade_out = 0.05;
$strong = 1;
$normal = 0.8;
$fontsizeVar = 26; 				// 43 fontsizeVar variable multiplied with previous_scale to change text font size
$smallestFontVar = 13;

// similarities for the graph labeling 
$expsimilarity = 0.70;			// similarity for querying the database
$similarityThr = 0.68;			// similarity threshold
$nodeConnectionsThr = 0.1; 		// node connections threshold
$maxNodeConnectionsThr = 0; 	//percentage of minimum node connections for label printing
$linkThr = 0.4;					//similarity value threshold for label printin

// d3 layout plotting
$charge = -450;					// according to http://jsfiddle.net/cSn6w/8/			// charge of each 'electron' - or 'proton' +, positive or negative
$gravity = 3;					// sets how close to each other the nodes are... if >1000 nodes it is good to be a number >2

// d3 chord dimensions
// $chord_width = 0;
// $chord_height = 0;
// $wordWidth = 50;
// $wordHeight = 180;
// $wordPadding = -15;				//-15 is for padding labels outside the outerRadius
// $groupPadding = .06;			// padding between groups

$chord_width = -100;
$chord_height = -250;
$wordWidth = 250;
$wordHeight = 180;
$wordPadding = 0;				//-15 is for padding labels outside the outerRadius
$groupPadding = .06;			// padding between groups


?>
