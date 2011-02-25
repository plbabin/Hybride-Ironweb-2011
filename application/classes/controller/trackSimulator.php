<?php
//date_default_timezone_set('America/Montreal');

// Simule l'ajout de conducteur/participant
$dbhost = 'localhost';
$dbuser = 'hybrideteam';
$dbpass = 'QW12er34';

error_reporting(E_ALL);
$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql:' . mysql_error());

$dbname = 'waqteamhybride';
mysql_select_db($dbname);


for ($i = 1; $i <= 3; $i++) {
    # DEFINE A MySQL QUERY
	$myquery = "SELECT * FROM origine ORDER BY RAND() LIMIT 1";
	
	# EXECUTE THE QUERY FUNCTION
	$result = mysql_query($myquery);
	//$result = $conn->query($myquery);
	# FETCHROW ARRAY
	
	while($row = mysql_fetch_array($result))
	{
	 	$lat = $row['lat'];
	 	$lon = $row['lon'];
	}
	
	//echo $lat . ',' . $lon;
	//exit('fin');
	
	$id_event = 4;  //codŽ du pour la dŽmo WAQ
	$track_type = 'C'; //ou 'P' pour passager
	$track_status = 'O'; //90% soumis ou 10% completed
	$statusArray =  array("O","O","O","O","O","O","O","O","O","C");
	$index = rand(0,9);
	//echo $statusArray[$index];
	$insert = "INSERT INTO track(origin_lat, origin_lon, id_event, track_date, track_type, track_status) VALUES (" . $lat . "," . $lon . "," . $id_event . ",'" . date('Y-m-d H:i:s A', time()) . "','" . $track_type . "','" . $statusArray[$index] . "')";
	//echo $insert;
	mysql_query($insert);
}


//$params = array("origin_lat" => $origin_lat, "origin_lon" => $origin_lon, "id_event" => $id_event, "track_type" => $track_type);
//$records = $track->insert($params);

mysql_close($conn);
	    
