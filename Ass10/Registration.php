<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include("dbconfig.php");
      if($_SERVER["REQUEST_METHOD"]=="POST")
      {
        $myusername = $_POST['uname'];
        $mypassword = $_POST['pwd']; 
        echo "ENTERED";
        $sql = "INSERT INTO loig VALUES ('$myusername','$mypassword')";
        $res = mysqli_query($db,$sql);
        echo "ADDED SUCCESSFULLY !!";
        header("location: reslogin.php");

      }

    ?>
    <center>
    <form style="width:350px" action="" method="POST">
        <br>
       
        <fieldset>
            <legend><strong>NEW USER</strong></legend>
            <table>
        <tr>
            <td><p> Name</td>
            <td><input type="text" id="uname" name="uname"/></td>
    </tr>
    <tr>

       <td><p> Password</td>
       <td><input type="text" id="pwd" name="pwd"/></td>
    </tr>
    <table>
        <br>
        <input type="submit" value="submit">
    </fieldset>
    </form>
    </center>
    
</body>
</html>


