<?php 
	
require_once "./connection.php";

$newTask = $_GET['name'];

$sql = "INSERT INTO tasks(name) VALUES ('$newTask')";
$result = mysqli_query($conn, $sql);

if ($result === TRUE) {
	echo "new Task added successfully";
} else {
	echo "error: " . $sql . "<br>" . mysqli_error($conn);
}

//CLose a previously opened database connection:

mysqli_close($conn);

?>