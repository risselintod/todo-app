<?php 

require_once './connection.php';
$id = $_POST['task_id'];

$sql = "DELETE FROM tasks WHERE id = $id";
mysqli_query($conn, $sql) or die(mysqli_error($conn));

?>