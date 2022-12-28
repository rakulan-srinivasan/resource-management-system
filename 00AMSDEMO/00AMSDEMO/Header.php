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
        session_start();
        if(!isset($_SESSION["uname"]))
        {
            header("Location: Login.php");
        }
    ?>
    <div>
        <center><img src="images/sastra.png"></center>
   </div>
   <div>
    <a href="Home.php">Home</a> |
    <a href="AddAccount.php">Add Account</a> |
    <a href="ViewAccount.php">View Account</a> |
    <a href="UpdateCustomer.php">Update Customer</a> |
    <a href="ViewEditDelete.php">View, Edit & Delete Customer</a> |
    
    <p>
        Welcome <?php echo $_SESSION["uname"]; ?>
        <a href="Logout.php">Logout</a>
    </p>
</div>
    <hr>
</body>
</html>