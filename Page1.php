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
        $page1input1=$page1input2="NOTHING";
        if(isset($_SESSION))
        {
            if(isset($_SESSION["sessioninput1"]))
                $page1input1 = $_SESSION["sessioninput1"];
            if(isset($_SESSION["sessioninput2"]))
                $page1input2 = $_SESSION["sessioninput2"];
            
        }
    ?>
    <br>
    <h1>Page 1</h1>
    <hr>
    <a href="Home.php">Home</a>
    <hr>
    Input Received 1: <?php echo $page1input1; ?>
    <br><br>
    Input Received 2: <?php echo $page1input2; ?>
    <hr>

</body>
</html>