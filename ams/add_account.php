<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AMS</title>
    <script>
        function show_bal(){
            var type = document.getElementById('type').value;
            if (type == 'Savings'){
                document.getElementById('balance').value = 500;
            }
            else if (type == 'Current'){
                document.getElementById('balance').value = 1000;
            }
        }
    </script>
</head>
<body>
    <?php
        include 'dbconfig.php';
        include 'header.php';
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if (isset($_POST['submit'])){
                $cid = $_POST['cid'];
                $branch = $_POST['branch'];
                $acc_type = $_POST['type'];
                $balance = $_POST['balance'];
                $priv = $_POST['priv'];
                $check = "SELECT * FROM account WHERE CustomerId = '$cid' AND BranchId = '$branch' AND AccountType = '$acc_type';";
                $ch_res = mysqli_query($db, $check);
                if (mysqli_num_rows($ch_res) == 0){
                    $query = "INSERT INTO account VALUES('', '$cid', '$branch', '$acc_type', '$balance', '$priv');";
                    $res = mysqli_query($db, $query);
                    if ($res >= 1){
                        echo '<script>alert("Success!");</script>';
                    }
                    else{
                        echo '<script>alert("Failure!");</script>';
                    }
                }
            }
        }
    ?>
    
    <div>
        <center>
        <fieldset style='width:400px'>
            <legend>Add Account</legend>
            <form action='' method='post'>
                <table>
                    <tr>
                        <td>Customer ID:</td>
                        <td><input type='text' name='cid' required>
                        <label style='color:Red'> *</label>
                        </td>
                    </tr>
                    <tr>
                        <td>Branch:</td>
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
                            <select name='type' id='type' onchange='show_bal()' required>
                                <option value='none' selected disabled hidden>Select Account Type</option>
                                <option value='Savings'>Savings Account</option>
                                <option value='Current'>Current Account</option>
                            </select>
                            <label style='color:Red'> *</label>
                        </td>
                    </tr>
                    <tr>
                        <td>Balance:</td>
                        <td><input type='text' id='balance' name='balance' required>
                        <label style='color:Red'> *</label>    
                    </td>
                    </tr>
                    <tr>
                        <td>Privilege:</td>
                        <td>
                            <input type='radio' id = 'priv1' name='priv' value='Gold' required>Gold </input>
                            <input type='radio' id = 'priv2' name='priv' value='Silver'>Silver </input>
                            <input type='radio' id = 'priv3' name='priv' value='Platinum'>Platinum </input>
                            <label style='color:Red'> *</label>
                        </td>
                    </tr>
                </table>
                <p><input type='submit' name='submit' value='Add Account'></input></p>
                <label style='color:Red; float:right;'>* Mandatory</label> 
            </form>
        </fieldset>
    </center>
    </div>
    <?php
        include 'footer.php';
    ?>
</body>
</html>