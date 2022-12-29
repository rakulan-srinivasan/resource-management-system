<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AMS Login</title>
</head>
<body>
    <?php
        include 'dbconfig.php';
        session_start();
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(isset($_POST['login'])){
                $uname = $_POST['uname'];
                $pwd = $_POST['pwd'];
                $query = "SELECT * FROM users WHERE uname = '$uname' AND pwd = '$pwd'";
                $res = mysqli_query($db, $query);
                if (mysqli_num_rows($res) == 1){
                    $_SESSION['uname'] = $uname;
                    header('Location:home.php');
                }
            }
        }
    ?>
    <center>
    <fieldset style='width:400px'>
        <legend>AMS Login</legend>
        <form action='' method='post'>
            <table>
                <tr>
                    <td>Username:</td>
                    <td><input type='text' name='uname'></td>
                <tr>
                <tr>
                    <td>Password:</td>
                    <td><input type='password' name='pwd'></td>
                <tr>
        </table>
        <p><input type='submit' name='login' value='Login'></p>
        <p>New User?<a href='#'> Register</a></p>    
    </form>
    </fieldset>
</center>
</body>
</html>