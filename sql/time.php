<?php 

$host = 'localhost';
$db_name = 'Tasks_DB';
$user = 'root';
$password = '';

// connecting to Database

$conn = new PDO("mysql:host =$host; dbname=$db_name", $user, $password);

$lastTaskValue = $_POST['task'];

$newDateValue = date('Y-m-d H:i:s');

// Insert the task and the initial time into the database 

$getFirst = $conn->prepare("INSERT INTO tasks_ (task, time_init) VALUES ('$lastTaskValue', '$newDateValue')");

$getFirst->execute();
$getFirst->finalize();
$test = $getFirst->fetch(PDO::FETCH_ASSOC);

$conn->close();
?>
