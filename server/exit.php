<?php
    session_start();
    require "../config.php";
    if(!isset($_SESSION['id'])){
        header("Location:".$siteurl);
    }else{
        unset($_SESSION['id']);
        header("Location:".$siteurl);
    }
?>
