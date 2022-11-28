<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assign Project</title>
</head>
<body>
    <?php include "home.php";?>
    <?php include "dbconfig.php";?>
    
    <?php 
    if($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $eidd = $_POST['eid'];
        $sql = "SELECT eid FROM employee WHERE eid = '$eidd'";
        $pname = $_POST['pname'];
        $pid = $_SESSION['projid'];
        $result = mysqli_query($db,$sql);
        $count = mysqli_num_rows($result);
        $sdate = $_POST['startdate'];
        $edate = $_POST['enddate'];
        if ($count == 1)
        {
            $sql = "INSERT INTO allocation(pid,eid,sdate,edate) VALUES ('$pid','$eidd','$sdate','$edate')";
            $res = mysqli_query($db,$sql);
            if($res)
            {
                echo "Added Successfully...";
            }
            header("Location: viewallocation.php");
            exit();

        }
        else{
            echo "Invalid emp id ";
        }
    }
        ?>
<center>
    
<h2>...Assign new Project Allocation...</h2>

<form action="" id="taxform" method="post" >
<table>
    <tr>
        <td class="subhead1 column1 orangebox bold">
            Project Name
        </td>
        <td class="column2 greenbox">
            <input type="text" id="pname" value = <?php echo $_SESSION['projname'] ?> name="pname" />
        </td>
    </tr>
    <tr>
        <td class="subhead1 column1 orangebox bold">
            Employee ID
        </td>
        <td class="column2 greenbox">
            <input type="text" id="eid" name="eid"/>
        </td>
    </tr>
    <tr>
        <td class="subhead1 column1 orangebox bold">
            Start Date
        </td>
        <td class="column2 greenbox">
            <input type="datetime-local" id="startdate" name="startdate"/>
        </td>
    </tr>
    <tr>
        <td class="subhead1 column1 orangebox bold">
            End Date
        </td>
        <td class="column2 greenbox">
            <input type="datetime-local" id="enddate" name="enddate"/>
        </td>
    </tr>
</table>
<p class="subhead1 column2 greenbox bold">
    <input type="submit" value="Assign">
</p>
</form>
</center>

</div>
</body>
</html>