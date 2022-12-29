<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AMS</title>
    <script>
        function show_bal(){
            console.log('inside show_bal');
            <?php echo 'inside show_bal'; ?>
            var type = document.getElementById('type').value();
            if (type == 'Savings'){
                document.getElementById('balance').value() = 500;
            }
            elseif (type == 'Current'){
                document.getElementById('balance').value() = 1000;
            }
        }
    </script>
</head>
<body>
    <?php
        include 'dbconfig.php'
    ?>
    
    <div>
        <fieldset>
            <legend>Add Account</legend>
            <form action='' method='post'>
                <table>
                    <tr>
                        <td>Customer ID:</td>
                        <td><input type='text' name='cid'></td>
                    </tr>
                    <tr>
                        <td>Branch:</td>
                        <td>
                            <select name='branch' id='branch'>
                                <option value='Select'>Select Branch</option>
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
                        </td>
                    </tr>
                    <tr>
                        <td>Account Type:</td>
                        <td>
                            <select name='type' id='type' onchange=show_bal()>
                                <option value='Select'>Select Account Type</option>
                                <option value='Savings'>Savings Account</option>
                                <option value='Current'>Current Account</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Balance:</td>
                        <td><input type='text' id='balance' name='balance' value=1000></td>
                    </tr>
                    <tr>
                        <td>Privilege:</td>
                        <td>
                            <input type='radio' id = 'priv1' name='priv'>Gold </input>
                            <input type='radio' id = 'priv2' name='priv'>Silver </input>
                            <input type='radio' id = 'priv3' name='priv'>Platinum 
                        </td>
                    </tr>
                </table>
                <p><input type='submit' value='Add Account'></input></p>
            </form>
        </fieldset>
    </div>
</body>
</html>