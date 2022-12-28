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
    <?php include "LoginHeader.php" ?>
    <?php
        include "dbconfig.php";
        session_start();
        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
            //echo '<script>alert("success");</script>';
            //echo $_POST["uname"];
            //echo $_POST["pwd"];
            $uname = $_POST["uname"];
            $pwd = $_POST["pwd"];

            $sql = "select * from users where uname='$uname' and pwd='$pwd'";
            $res = mysqli_query($db, $sql);
            $cnt = mysqli_num_rows($res);
           
            if($cnt==1)
            {
                $_SESSION["uname"] = $uname;
                header("Location: Home.php");
            }
            else
            {
                echo '<script>alert("Invalid Username or Password");</script>';
            }
        }
    ?>

    <div class="contentbody">
        <p class="title">        
            ...Login User...
        </p>
        <form action="" id="taxform" method="post" >
        <table>
            <tr>
                <td class="column1 orangebox">
                    User Name: 
                </td>
                <td class="column2 greenbox">
                    <input type="text" id="uname" name="uname" />
                </td>
            </tr>
            <tr>
                <td class="column1 orangebox">
                    Password:
                </td>
                <td class="column2 greenbox">
                    <input type="password" id="pwd" name="pwd" />
                </td>
            </tr>
        </table>
    
        <p class="column2">
            <input type="submit" value="View & Submit">
          
        </p>
        <p class="column2">
            New User? 
            <a href="#">Register Here</a>
        </p>
</div>
</body>
</html>