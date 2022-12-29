<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AMS Home</title>
</head>
<body>
    <?php
        session_start();
    ?>
    <center><h1>Account Management System</h1></center>
    <hr>
    <table>
        <tr>
            <td><a href='home.php'>Home |</a></td>
            <td><a href='add_account.php'>Add Account |</a></td>
            <td><a href='view_account.php'>View Account |</a></td>
            <td><a href='update_customer.php'> Update Customer</a></td>
        </tr>
    </table>
    <div align='right'>
        <?php echo $_SESSION['uname']; ?>, 
        <a href='logout.php'>Logout</a>
    </div>
    <hr>
    </body>
</html>