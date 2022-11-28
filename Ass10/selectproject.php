<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Project</title>
</head>
<body>
    <?php include "dbconfig.php"?>
    <?php 
    session_start();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') 
    {
        if(isset($_POST['proj']))
        {
            if (isset($_POST['assign'])) 
            {
                $_SESSION['projid'] = $_POST['proj'];
                $proj = $_POST['proj'];
                $sql = 'select pname from project where pid='.$proj;
                $res = mysqli_query($db,$sql);
                if ($res->num_rows == 1)
                {
                    while($row = $res->fetch_assoc()) 
                    {
                        $_SESSION['projname'] = $row["pname"];
                        header("Location: assignproject.php");
                        exit(); 
                    } 
                }
            }
            else
            {
                $_SESSION['projid'] = $_POST['proj'];
                header("Location: viewallocation.php");
                exit(); 
            }
            
        }
    }
    
    ?>
    <?php include "home.php";?>
    <?php 
    

        if($r_set = $db->query("SELECT pid,pname from project"))
        {    
            
            echo "<form action = '' method='POST'>";
            echo "<center><h4>Select a project:</h4>";
            echo "<select name='proj' class='form-control' style='width:100px;'>";
            while ($row = $r_set->fetch_assoc()) 
            {
            echo "<option value=$row[pid]>$row[pname]</option>";
            }
            echo "</select>";
            echo "<br> <br> <br>";
            echo "<input type='submit' id='assign' value='Assign'>";
            echo "       ";
            echo "<input type='submit' id='va' value='View Allocation'>";
            //echo "<a href='viewallocation.php'><input type='button' id='va' value='View Allocation'></a>";
        echo "</center></form>";
        echo "";
        }
        
        else
        {
        echo $db->error;
        }
    ?>
</body>
</html>