<?

///////////////////////////////////
///// back-end configuration  /////
///////////////////////////////////

$max_execution_time = 120;  //300 seconds = 5 minutes
$memory_limit = '4096M';	//'-1';		// unlimited memory
$memcache_port = 11211;

$memcache_time = 2592000;				//600 = 10 minutes 		//2592000 = 30 days (maximum for memcached) //600 = 10 minutes

$db_name = "PTM3DB.db";
$db_path = "../../../dbs/".$db_name;

$memcache_time = 2592000;				//600 = 10 minutes 		//2592000 = 30 days (maximum for memcached) //600 = 10 minutes
$query_topics="select * from TopicDescription where VisibilityIndex>=3 and ExperimentId='HEALTHTender_400T_1000IT_6000CHRs_100B_2M_cos'";



///////////////////////////////////
///// front-end configuration /////
///////////////////////////////////

$title = "Health Tender";								// title of the webpage
$trends_title = "ACM Trends";								// title of the webpage when ACM
$subtitle = "";								// subtitle of the webpage
$experimentName = "HEALTHTender_400T_1000IT_6000CHRs_100B_2M_cos";	// first experiment to load HEALTHTender_400T_1000IT_6000CHRs_100B_2M_cos
$experimentDescription = ""; 	// first description to load
$node_name = "Author";
$node_groupName1 = "Authors";
$node_groupName2 = "Authors";
$node_areaName = "ACM Category";
$trends_num = 7;            // 6 Journals + 1 for all
$layout = "graph";


// trends conf init
$layoutId = "allfunder";
$layoutType = "stream";  // default
$topicsSort = "yes";

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
