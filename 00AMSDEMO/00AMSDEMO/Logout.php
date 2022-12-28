<?php
    session_start();
    if( isset($_SESSION["uname"]) )
    {
        $_SESSION["uname"] = "";
        session_destroy();
        header("Location: Login.php");
    }
?>
