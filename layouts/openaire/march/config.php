<?

///////////////////////////////////
///// back-end configuration  /////
///////////////////////////////////


$max_execution_time = 120;  //300 seconds = 5 minutes
$memory_limit = '4096M';	//'-1';		// unlimited memory
$memcache_port = 11211;
$db_name = "openairedb.db";
$db_path = "../../../dbs/".$db_name;

$memcache_time = 2592000;				//600 = 10 minutes 		//2592000 = 30 days (maximum for memcached) //600 = 10 minutes


//den ebala ta acr1
$query_graphLayout = "select EntityId1 as node1id,EntityId2 as node2id,Acr1 as node1name,Acr2 as node2name,Gr1_Category0 as category1_0,Gr1_Category1 as category1_1,Gr1_Category2 as category1_2,Gr1_Category3 as category1_3,Gr1_Category3Descr as category1_3descr,Gr2_Category0 as category2_0,Gr2_Category1 as category2_1,Gr2_Category2 as category2_2,Gr2_Category3 as category2_3,Gr2_Category3Descr as category2_3descr,grantsCnt1 as category1_counts,grantsCnt2 as category2_counts,Similarity from EntitySimilarityView where ExperimentId=?  and  Similarity>?";
//$query_graphLayout = "select EntityId1,EntityId2,Acr1,Acr2,Gr1_Category0,Gr1_Category1,Gr1_Category2,Gr1_Category3,Gr1_Category3Descr,Gr2_Category0,Gr2_Category1,Gr2_Category2,Gr2_Category3,Gr2_Category3Descr,grantsCnt1,grantsCnt2,Similarity from EntitySimilarityView where ExperimentId=?  and  Similarity>?";

$query_experiments = "select distinct ExperimentId,Description,initialSimilarity from experiment";

$query_nodes = "select project_code, TopicId, AVG(Weight) as weight from TopicsPerDoc Inner join links on TopicsPerDoc.DocId=links.originalid where Weight>0.02 AND ExperimentId=? Group By project_code, TopicId Order by project_code, AVG(Weight) Desc";
//$query_nodes = "select PubCategory.Category, TopicId, AVG(weight) as Weight from topicsPerDoc Inner Join PubCategory on topicsPerDoc.DocId= PubCategory.PubId INNER JOIN (Select Category FROM pubCategory GROUP BY Category HAVING Count(*)>10) catCnts1 ON catCnts1.Category = PubCategory.category where weight>0.02 AND ExperimentId=? group By PubCategory.Category , TopicId order by  pubCategory.Category, Weight desc, TopicId";

$query_topics = "select TopicId,Item, WeightedCounts from topicdescriptionview where ExperimentId=? Order By TopicID ASC, WeightedCounts DESC";

$query_topics_nosort = "select TopicId,Item, WeightedCounts from topicdescriptionview where ExperimentId=? Order By TopicID ASC, Counts DESC";
$query_topicsdistribution = null;
$query_heatmap = null;
$query_trends = null;
// DONT FORGET TO ALSO CHANGE THE TOTAL NUMBER OF TRENDS IN THE VARIABLE BELOW $trends_num


///////////////////////////////////
///// front-end configuration /////
///////////////////////////////////

$title = "OpenAIRE Review";								// title of the webpage
$trends_title = "OpenAIRE Trends";								// title of the webpage when ACM
$chord_title = "Connectivity of FP7 Grants / Subdivision";								// title of the webpage when ACM
$subtitle = "(March, 04 2015)";								// subtitle of the webpage
$experimentName = "FETGrants_80T_1200IT_0IIT_150B_4M_cos";	// first experiment to load 
$experimentDescription = "Topic modeling analyzing: 1)222 ProjectAbstract, 585 PubAbstract, 2298 PubFullText, related to FP7 FET 2)Related Research Areas 3)Publication Venues (e.g., PubMed, Arxiv, ACM, Specific Journals) 4)Grants per Publication SimilarityType:cos"; 	// first description to load
$node_name = "Grant";
$node_groupName1 = "group1";
$node_groupName2 = "group2";
$node_areaName = "Subdivisions";
$trends_num = 7;            // 6 Journals + 1 for all
$layout = "graph";


// appearance
$fade_out = 0.05;
$strong = 1;
$normal = 0.8;
$fontsizeVar = 26; 				// 43 fontsizeVar variable multiplied with previous_scale to change text font size
$smallestFontVar = 13;

// similarities for the graph labeling 
$expsimilarity = 0.45;			// similarity for querying the database ... for the first experiment
$similarityThr = 0.5;			// similarity threshold
$nodeConnectionsThr = 0.1; 		// node connections threshold
$maxNodeConnectionsThr = 0; 	//percentage of minimum node connections for label printing
$linkThr = 0.2;					//similarity value threshold for label printin

// d3 layout plotting
$charge = -1100;					// according to http://jsfiddle.net/cSn6w/8/			// charge of each 'electron' - or 'proton' +, positive or negative
$gravity = 1;					// sets how close to each other the nodes are... if >1000 nodes it is good to be a number >2

// d3 chord dimensions
$chord_width = 0;
$chord_height = -100;
$wordWidth = 150;
$wordHeight = 200;
$wordPadding = -15;				//-15 is for padding labels outside the outerRadius
$groupPadding = .06;			// padding between groups


?>
