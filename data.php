<?php
	header('Content-type: application/json');

	$db = mysqli_connect("localhost", "root", "", "a_database");
    if($db === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    $query = sprintf("SELECT xaxis, yaxis FROM pointtable ORDER BY xaxis");
	//$result = $db->query($query);
	$result = mysqli_query($db, $query);

	$data = array();
	foreach ($result as $row) {
		$data[] = $row;
	}

	mysqli_close($db);

	print json_encode($data);

	$page = $_SERVER['PHP_SELF'];
	$sec = "2";
?>

