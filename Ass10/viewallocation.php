<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Allocation</title>
</head>
<body>
<?php include "dbconfig.php"?>
    <?php 
    session_start();
    include "Home.php";

    $projid=$_SESSION['projid'];

    echo "<center><h2> Project allocated for Project_ID : $projid </h2></center>";
    echo "<center><table border='1px'><th>Allocation Id</th>";
    echo "<th>Project Id</th>";
    echo "<th>Employee ID</th>";
    echo "<th>Employee Name</th>";
    echo "<th>Start Date</th>";
    echo "<th>End Date</th>";    

    $sel_query="Select a.aid, a.pid, a.eid, e.ename, a.sdate, a.edate from allocation a, employee e inner join on a.eid = e.eid where pid =". $projid ;
    $result = mysqli_query($db,$sel_query);

    while($row = mysqli_fetch_assoc($result))
    { 
        echo "<tr>";
        echo "<td>".$row['a.aid']."</td>";
        echo "<td>".$row['a.pid']."</td>";
        echo "<td>".$row['a.eid']."</td>";
        echo "<td>".$row['e.ename']."</td>";
        echo "<td>".$row['a.sdate']."</td>";
        echo "<td>".$row['a.edate']."</td>";
        echo "</tr>";

        
                
    }

?>
    
</body>
</html>