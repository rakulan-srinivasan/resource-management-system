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
        $result="";
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $phpinput1=$phpinput2="";
            if(isset($_POST["input1"]))
                $phpinput1 = $_POST["input1"];
            if(isset($_POST["input2"]))
                $phpinput2 = $_POST["input2"];
            
            session_start();
            if($phpinput1!="")
                $_SESSION["sessioninput1"] = $phpinput1;
            if($phpinput2!="")
                $_SESSION["sessioninput2"] = $phpinput2;
            
            $result = "Input Saved in Session Variables...";
        }
    ?>
    <br>
    <h1>Home Page</h1>
    <hr>
    <a href="Page1.php">Page 1 </a>
    <a href="Page2.php">Page 2 </a>
    <a href="Page3.php">Page 3 </a>
    <a href="Page4.php">Page 4 </a>
    <hr>
    <form method="post">
    Input 1: <input type="text" name="input1"></input>
    <br><br>
    Input 2: <input type="text" name="input2"></input>
    <hr>
    <input type="submit" name="submit" value="Submit"></input>
    <br><br>
    <label><?php echo $result; ?></label>
    <hr>
    </form>
    
</body>
</html>