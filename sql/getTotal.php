<?php

$host = 'localhost';
$db_name = 'Tasks_DB';
$user = 'root';
$password = '';

// connecting to Database

$conn = new PDO("mysql:host =$host; dbname=$db_name", $user, $password);

// Select the two columns named as tasks and get the TimeStamp indivividual and Sum of all the values in a column called Time.

$sql="SELECT IFNULL(task, 'TOTAL') AS 'Tasks', SEC_TO_TIME(SUM(TIMESTAMPDIFF(SECOND, time_init, time_end))) AS 'Time' FROM tasks_ GROUP BY task with ROLLUP";
$run = $conn->prepare($sql);
$run->execute();

while($row= $run->fetch(PDO::FETCH_ASSOC)){

    echo '<tr class="Trow">'.'<td class="Trow">'.$row['Tasks'].'</td>'.'<td class="Trow">'.$row['Time'].'</td>'.'</tr>';
}

?>