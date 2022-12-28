<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="stdStyle.css" rel="stylesheet">
</head>
<body>
    <?php include "Header.php" ?>
    

    <div class="contentbody">
    <p class="title">
        ..Find Customer..
    </p>
    <form id="findcustomerform" method="post" action="">
    <table>
        <tr>
            <td class="column1 orangebox">
                Customer ID               
            </td>
            <td class="column2 greenbox">         
                <input type="text" id="cid" name="cid" pattern="[0-9]*">      
            </td>
        </tr>
    </table>
    <p class="title">
        <input type="submit" value="Find" name="find" id="find">
    </p>
    </form>
</div>
<?php
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        if(isset($_POST["find"]))
        {
            if(isset($_POST['cid']) && trim($_POST['cid']!=""))
            {
                $cid = trim($_POST['cid']);
                //echo $cid;
                include "dbconfig.php"; 
                $sql = "select * from Customer where CustomerId='$cid'";
                $res = mysqli_query($db,$sql);
                $count = mysqli_num_rows($res);
                if($count==0)
                {
                    echo '<script>alert("No Record Found..."); </script>';
                }
                else
                {
                    #echo '<script>alert("Record Found..."); </script>';
                    $row = mysqli_fetch_array($res);
                    $cid = $row["CustomerId"];
                    $cname = $row["CustomerName"];
                    $caddr = $row["CustomerAddress"];
                    $cnumber = $row["ContactNumber"];
?>
                    <div class="contentbody">
                        <p class="title">
                            ..Update Customer..
                        </p>
                        <form id="updatecustomerform" method="post" action="">
                        <input type="hidden" id="cid1" name="cid1" value='<?php echo $cid; ?>'>      
 
                        <table>
                            <tr>
                                <td class="column1 orangebox">
                                    Customer ID               
                                </td>
                                <td class="column2 greenbox">         
                                    <input readonly type="text" id="cid" name="cid" value='<?php echo $cid; ?>'>      
                                </td>
                            </tr>
                            <tr>
                                <td class="column1 orangebox">
                                    Customer Name               
                                </td>
                                <td class="column2 greenbox">         
                                    <input type="text" id="cname" name="cname" value='<?php echo $cname; ?>'>      
                                </td>
                            </tr>
                            <tr>
                                <td class="column1 orangebox">
                                    Customer Address               
                                </td>
                                <td class="column2 greenbox">         
                                    <input type="text" id="caddr" name="caddr" value='<?php echo $caddr; ?>'>      
                                </td>
                            </tr>
                            <tr>
                                <td class="column1 orangebox">
                                    Contact Number               
                                </td>
                                <td class="column2 greenbox">         
                                    <input type="text" id="cnumber" name="cnumber" value='<?php echo $cnumber; ?>'>      
                                </td>
                            </tr>
                        </table>
                        <p class="title">
                            <input type="submit" value="Update" name="update" id="update">
                        </p>
                        </form>
                    </div>
<?php
                }

            }

        }
        else if(isset($_POST["update"]))
        {
            if (isset($_POST["cid1"]))
                $cid = $_POST["cid1"];
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
        }
    }
?>
</body>
</html>