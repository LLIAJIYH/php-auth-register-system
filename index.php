<?php
    session_start();
    require "config.php";
    if(isset($_SESSION['id'])){
        $id = $_SESSION['id'];
        header("Location:".$siteurl."/modules/user.php?id=".$id);
    }else{
        header("Location:".$siteurl."/modules/auth.php");
    }
?>
