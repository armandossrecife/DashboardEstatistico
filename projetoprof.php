<?php
//setting header to json
header('Content-Type: application/json');

//database
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'yourUsername');
define('DB_PASSWORD', 'yourPassword');
define('DB_NAME', 'dashboard');

//get connection
$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

if(!$mysqli){
	die("Connection failed: " . $mysqli->error);
}


//query to get data from the table

//$query = sprintf("SELECT id, professor_id FROM projeto where professor_id is not null limit 50");
$query = sprintf("SELECT professor.nomerh, professor.ID, projeto.professor_id FROM projeto, professor where projeto.professor_id = professor.ID" );

//execute query
$result = $mysqli->query($query);

//loop through the returned data
$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

//free memory associated with result
$result->close();

//close connection
$mysqli->close();

//now print the data
print json_encode($data);
?>
