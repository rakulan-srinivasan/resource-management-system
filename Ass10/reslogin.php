<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resource Management System</title>
    <link rel="stylesheet" href="style2.css">

</head>
<body>
<?php
    if(isset($_GET['res']) && $_GET['res']=="0")
    {
        echo '<script>alert("...Incorrect Username or Password...")</script>';

    }
?>
<?php
   include("dbconfig.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      $myusername = mysqli_real_escape_string($db,$_POST['uname']);
      $mypassword = mysqli_real_escape_string($db,$_POST['pwd']); 
      $sql = "SELECT uname FROM loig WHERE uname = '$myusername' and pwd = '$mypassword'";
      $result = mysqli_query($db,$sql);      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 2) {
         //session_register("myusername");
         $_SESSION['uname'] = $myusername;
         $_SESSION['pwd'] = $mypassword;

         
         header("location: Home.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
<?php include "Header.php"; ?>
<div class="greenbox subhead1 loginbody">
    <p class="subhead1 column2 bold">        
        ...Login User...
    </p>
    <form action="" id="taxform" method="post" >
    <table>
        <tr>
            <td class="subhead1 column1 orangebox bold">
                User Name: 
            </td>
            <td class="column2 greenbox">
                <input type="text" id="uname" name="uname" onfocusout="validatename1()"/>
            </td>
        </tr>
        <tr>
            <td class="subhead1 column1 orangebox bold">
                Password:
            </td>
            <td class="column2 greenbox">
                <input type="password" id="pwd" name="pwd" value="30-06-1983" onchange="UpdateAge()"/>
            </td>
        </tr>
    </table>
    
    <p class="subhead1 column2 bold">
        <input type="submit" value="View & Submit">
    </p>
    <p class="subhead1 column2 bold">
        New User? 
        <a href="Registration.php">Register Here</a>
    </p>
</div>

</body>
</html>