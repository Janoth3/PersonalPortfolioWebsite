<?php
session_start();
    if(isset($_SESSION['UserID'])){
        session_unset();
        session_destroy();
        header("LOCATION: Login.php");
    }
    else{
        header("LOCATION: Index.html");
    }
?>
