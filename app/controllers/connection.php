<?php

// $host = "localhost";
// $username = "root";
// $password = "";
// $dbname = "todo_app_db";

$host = "db4free.net";
$username = "risselintod";
$password = "@godismysavior111";
$dbname = "risselintod";

$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
	die('Connectin failed: ' . mysqli_error($conn) );
}

echo " &nbsp   &nbsp connnected successfully";
echo "<br>";

?>