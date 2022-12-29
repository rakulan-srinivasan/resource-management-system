<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include 'dbconfig.php';
        include 'header.php';
    ?>
    <div>
        <center>
        <fieldset style="width:500px; flex:display; float:bottom">
            <legend>Search Customer</legend>
            <form action='' method='post'>
                <table>
                    <tr>
                        <td>Customer ID:</td>
                        <td>
                            <input type='text' name='cid' id='cid'>
                        </td>
                    </tr>
                </table>
                <p><input type='submit' name='find' value='Find Me!'></p>
            </form>
        </fieldset>
        </center>
    </div>
    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            if (isset($_POST['find']) && isset($_POST['cid'])){
                $cid = $_POST['cid'];
                $query = "SELECT * FROM customer WHERE CustomerId = '$cid';";
                $res = mysqli_query($db, $query);
                if ($row = mysqli_fetch_assoc($res)){
                ?>
                <center>
                <fieldset style="width:500px; flex:display; float:bottom">
                    <legend>Update Customer</legend>
                    <form action='' method='post'>
                        <table border='1px solid' style='padding:5px; float:bottom'>
                            <tr>
                                <td>Customer ID</td>
                                <td>
                                    <input readonly type='text' name='cid' id='cid' value=<?php echo $row['CustomerId'];?>>
                                </td>
                            </tr>
                            <tr>
                                <td>Customer Name</td>
                                <td>
                                    <input type='text' name='cname' id='cname' value=<?php echo $row['CustomerName']; ?>>
                                </td>
                            </tr>
                            <tr>
                                <td>Customer Address</td>
                                <td>
                                    <input type='text' name='caddr' id='caddr' value=<?php echo $row['CustomerAddress']; ?>>
                                </td>
                            </tr>
                                <td>Contact</td>
                                <td>
                                    <input type='text' name='contact' id='contact' value=<?php echo $row['ContactNumber']; ?>>
                                </td>
                            </tr>
                        </table>
                        <p><input type='submit' name='edit' value='Confirm Edit'></p>
                    </form>
                </fieldset>
                </center>
                <?php
                }
                echo "0";
            }
            else if (isset($_POST['edit'])){
                if (isset($_POST["cid"]))
                    $cid = $_POST["cid"];
                if (isset($_POST["cname"]))
                    $cname = $_POST["cname"];
                if (isset($_POST["caddr"]))
                    $caddr = $_POST["caddr"];
                if (isset($_POST["contact"]))
                    $contact = $_POST["contact"];
                $edit_query = "UPDATE customer SET CustomerName = '$cname', CustomerAddress = '$caddr', ContactNumber = '$contact' WHERE CustomerId = '$cid';";
                $res = mysqli_query($db, $edit_query);
                echo "<script>alert('Update Successful');</script>";
                $check = "SELECT * FROM customer WHERE CustomerId = '$cid';";
                $ch_res = mysqli_query($db, $check);
                while ($row = mysqli_fetch_assoc($ch_res)){
                ?>
                <hr>
                <center>
                <fieldset style="width:500px; flex:display; float:bottom">
                    <legend>Updated Customer Information</legend>
                        <table border='1px solid' style='padding:5px; float:bottom; width:450px;'>
                            <tr>
                                <td>Customer ID</td>
                                <td><?php echo $row['CustomerId'] ?></td>
                            </tr>
                            <tr>
                                <td>Customer Name</td>
                                <td><?php echo $row['CustomerName'] ?></td>
                            </tr>
                            <tr>
                                <td>Customer Address</td>
                                <td><?php echo $row['CustomerAddress'] ?></td>
                            </tr>
                                <td>Contact</td>
                                <td><?php echo $row['ContactNumber'] ?></td>
                            </tr>
                        </table>
                </fieldset>
                </center>
            <?php
                }
            }
        }
    ?>
</body>
</html>