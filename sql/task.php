<?php

$host = 'localhost';
$db_name = 'Tasks_DB';
$user = 'root';
$password = '';

// connecting to Database
$conn = new PDO("mysql:host =$host; dbname=$db_name", $user, $password);

$lastLast = $_POST['saveTask'];

$newFinalDate = date('Y-m-d H:i:s');

// First Select the max Id from the table
$lastIndex = $conn->prepare("SELECT MAX(id_task) FROM tasks_");
$lastIndex->execute();
$getLastIndex = $lastIndex->fetch(PDO::FETCH_ASSOC);
$getLastIndex['MAX(id_task)'];
$index = $getLastIndex['MAX(id_task)'];

// With the Id, Update the value of the row with que end time of the task 
$getFinal = $conn->prepare("UPDATE tasks_ SET time_end='$newFinalDate' WHERE id_task=$index");
$getFinal->execute();
$getFinal->finalize();
$getTime = $getFinal->fetch(PDO::FETCH_ASSOC);



?>
