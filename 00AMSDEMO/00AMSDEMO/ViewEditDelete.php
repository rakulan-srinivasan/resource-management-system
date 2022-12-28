<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="stdStyle.css" rel="stylesheet">
    <script>
        function dosubmit(action,cid)
        {
            document.getElementById('cid').value=cid; 
            document.getElementById('action').value=action; 
            document.getElementById('vieweditdeletform').submit();
            return true;
        }
    </script>
</head>
<body>

<?php
    include "Header.php";
    
    include "dbconfig.php";
    $action=$inputcid="";
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $action = $_POST["action"];
        $inputcid = $_POST["cid"];
        if($action=="update")
        {
            if (isset($_POST["cid"]))
                $cid = $_POST["cid"];
            if (isset($_POST["cname"]))
                $cname = $_POST["cname"];
            if (isset($_POST["caddr"]))
                $caddr = $_POST["caddr"];
            if (isset($_POST["cnumber"]))
                $cnumber = $_POST["cnumber"];   
            include "dbconfig.php"; 
            $sql = "update customer set CustomerName='$cname', CustomerAddress='$caddr', ContactNumber='$cnumber' where CustomerId='$cid'";
            $res = mysqli_query($db,$sql);
            
            if($res>=1)
            {
                echo '<script>alert("Success..."); </script>';
            }
            else
            {
                echo '<script>alert("Failed..."); </script>';
            }
            $inputcid="";
        }
        else if($action=="delete")
        {
            if (isset($_POST["cid"]))
                $cid = $_POST["cid"];
            include "dbconfig.php"; 
            $sql = "delete from Account where CustomerId='$cid';"; 
            $res = mysqli_query($db,$sql);
            $sql = "delete from Customer where CustomerId='$cid'";
            $res = mysqli_query($db,$sql);
            
            if($res>=1)
            {
                $inputcid="";
                echo '<script>alert("Success..."); </script>';
            }
            else
            {
                echo '<script>alert("Failed..."); </script>';
            }
            $inputcid="";
        }
    }

    $sql = "select * from Customer";
    $res = mysqli_query($db,$sql);
    $count = mysqli_num_rows($res);
    if($count==0)
    {
        echo '<script>alert("No Record Found"); </script>';
    }
    else
    {        
?>
        <div class="viewbody">
            <form id="vieweditdeletform" method="post" action="">
            <input type="hidden" id="action" name="action">
            <input type="hidden" id="cid" name="cid">
            
            <table width="100%" border="1" style="border-collapse:collapse;">
                <thead>
                    <tr>
                        <th>S. No.</th>
                        <th>Customer Id</th>
                        <th>Customer Name</th>
                        <th>Address</th>
                        <th>Contact Number</th>
                        <th>Edit/Update</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
    <?php
                    $rno=1;
                    while(($row=mysqli_fetch_array($res)))
                    {
                        $cid = $row["CustomerId"];
                        $cname = $row["CustomerName"];
                        $caddr = $row["CustomerAddress"];
                        $cnumber = $row["ContactNumber"];
                        if($cid!=$inputcid)
                        {
    ?>
                            <tr>
                            <td><?php echo $rno; ?></td>
                            <td><?php echo $cid; ?></td>
                            <td><?php echo $cname; ?></td>
                            <td><?php echo $caddr; ?></td>
                            <td><?php echo $cnumber; ?></td>
                            <td>
                                <a href="#" name="editlink" onclick="return dosubmit('edit','<?php echo $cid; ?>')">Edit</a>
                            </td>
                            <td>
                                <a href="#" name="deletelink" onclick="return dosubmit('delete','<?php echo $cid; ?>')">Delete</a>
                            </td>
                        </tr>
    <?php
                        }
                        else
                        {
    ?>
                            <tr>
                                <td><?php echo $rno; ?></td>
                                <td><?php echo $cid; ?></td>                         
                                    
                                <td>         
                                    <input type="text" id="cname" name="cname" value='<?php echo $cname; ?>'>      
                                </td>                      
                            
                                <td>         
                                    <input type="text" id="caddr" name="caddr" value='<?php echo $caddr; ?>'>      
                                </td>
                            
                                <td>        
                                    <input type="text" id="cnumber" name="cnumber" value='<?php echo $cnumber; ?>'>      
                                </td>
                                
                                <td>
                                    <a href="#" name="updatelink" onclick="return dosubmit('update','<?php echo $cid; ?>')">Update</a>
                                </td>
                                <td>
                                    <a href="#" name="deletelink" onclick="return dosubmit('delete','<?php echo $cid; ?>')">Delete</a>
                                </td>
                            </tr>
    <?php
                        }
                        $rno = $rno + 1;
                    }
    ?>
                </tbody>
            </table>
            </form>
        </div>
                    
<?php
    }
?>


    
</body>
</html>