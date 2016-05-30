<?php
$max_execution_time = 120;  //300 seconds = 5 minutes
$memory_limit = '4096M';    //'-1';		// unlimited memory
ini_set('max_execution_time', $max_execution_time);
ini_set('memory_limit', $memory_limit);

set_time_limit(0);
$db_path = "./dbs/" . $db_name;