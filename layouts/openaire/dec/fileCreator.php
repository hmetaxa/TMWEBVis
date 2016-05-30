<?php

	if(isset($_POST['func'])) {
	    if($_POST['func'] == 'json') {
	        json();
	    } 
	    elseif($_POST['func'] == 'csv') {
	        csv();
	    }
	}
 
	function json(){
	   $json = $_POST['json'];
	//   $info = json_encode($json);
	   $info = $json;		// json encode not needed 


// $fh = fopen( 'matrix.json', 'w' );
// ftruncate($fh,0);
// fclose($fh);

	   $file = fopen('matrix.json','w');
	   fwrite($file, $info);
	   fclose($file);

	}


	function csv(){
	   	$csv = $_POST['csv'];
	   	$index = $_POST['id'];
	   	$info = $csv;		// json encode not needed
		$filename = "./data/trendscsv"+$index+".csv";

// $fh = fopen( 'Names.csv', 'w' );
// ftruncate($fh,0);

// fclose($fh);

	   $file = fopen($filename,'w');

	   fwrite($file, $info);
	   fclose($file);

	}
?>
