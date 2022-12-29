<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AMS</title>
</head>
<body>
    <?php
    include 'dbconfig.php';
    include 'header.php';
    ?>

    <center>
    <fieldset style='width:500px'>
        <legend>View Accounts</legend>
        <form action='' method='post'>
            <table>
                <tr>
                    <td>Branch Information:</td>
                    <td>
                        <select name='branch' id='branch' required>
                            <option value='none' selected disabled hidden>Select Branch</option>
                            <?php
                                $query = 'SELECT BranchId, BranchName FROM branch;';
                                $table = mysqli_query($db, $query);
                                while($row = mysqli_fetch_assoc($table)){
                            ?>
                            <option value=<?php echo $row['BranchId']?>><?php echo $row['BranchName']?></option>
                            <?php
                            }
                            ?>
                        </select>
                        <label style='color:Red'> *</label>
                    </td>
                </tr>
                <tr>
                    <td>Account Type:</td>
                    <td>
                        <select name='type' id='type' required>
                            <option value='none' selected disabled hidden>Select Account Type</option>
                            <option value='Savings'>Savings Account</option>
                            <option value='Current'>Current Account</option>
                        </select>
                        <label style='color:Red'> *</label>
                    </td>
                </tr>
            </table>
            <p><input type='submit' name='submit' value='View Accounts'></p>
        </form>
    </fieldset>
    </center>

    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            if (isset($_POST['submit'])){
                $branch = $_POST['branch'];
                $acc_type = $_POST['type'];
                $query = "SELECT a.CustomerId, c.CustomerName, a.AccountType, a.Balance, a.Privilege FROM account a, customer c WHERE c.CustomerId = a.CustomerId AND BranchId = '$branch' AND AccountType = '$acc_type'";
                $res = mysqli_query($db, $query);
                if (mysqli_num_rows($res)){
                ?>
                    <div>
                        <center>
                        <hr>
                        <fieldset style="width:500px; flex:display; float:bottom">
                            <legend>Accounts Information</legend>
                            <table border='1px solid' style='padding:5px; float:bottom'>
                                <tr>
                                    <th>Customer ID</th>
                                    <th>Customer Name</th>
                                    <th>Account Type</th>
                                    <th>Balance</th>
                                    <th>Privilege</th>
                                </tr>
                            <?php
                            while($row = mysqli_fetch_assoc($res)){
                            ?>
                                <tr>
                                    <td><?php echo $row['CustomerId'] ?></td>
                                    <td><?php echo $row['CustomerName'] ?></td>
                                    <td><?php echo $row['AccountType'] ?></td>
                                    <td><?php echo $row['Balance'] ?></td>
                                    <td><?php echo $row['Privilege'] ?></td>
                                </tr>
                            <?php
                            }
                            ?>  
                            </table>
                        </fieldset>
                        <hr>
                        </center>
                    </div>
                <?php
                }
            }
        }
    ?>
    <?php
        include 'footer.php';
    ?>
</body>
</html>