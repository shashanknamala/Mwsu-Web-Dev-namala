<?php
	echo "<pre>";
	// Include dbconnection string
	//include 'dbconnect.php';
	//include_once 'dbconnect.php';
	$con = mysql_connect('localhost', 'web-dev', 'mwsumustangsmwsu');
	if (!$con) {
		die('Could not connect: ' . mysql_error());
	}
	echo 'Connected successfully';
	
	mysql_select_db("web-dev", $con);

	//echo "Succesfully copied json file to web-dev database";
	// file_get_contents - reads a file
	// json_decode - decodes json obviously, but the "true" turns the json into an associative array.
	$json_array = json_decode(file_get_contents('products_big.json'),true);

	// These two commands would dump the json array for viewing in a clear manner.
	// Only needed for debugging
	echo "<pre>";
	print_r($json_array);

	//For each entry in the json_array ... do something with it.
	foreach($json_array as $entry){

	$image=str_replace("160","~",$entry[imgs][0]);
	$price=str_replace("$","",$entry[price]);
	//print_r("<br>");
	//print_r($image);
	//echo '<br>';
	//print_r($price);
	$query = "INSERT INTO products(`id`, `category`, `desc`, `price`, `img`)VALUES ('', '$entry[category]', '$entry[h2]', '$price', '$image');";
	//print_r($query);
	mysql_query($query);
	
    // Remember to use  str_replace to replace '160' with a '~'
    // Remember to use substring to turn price into a float.
    // Create sql insert statement
    // Insert each into database here
	}

  mysql_close($con);
?>