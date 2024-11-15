<?php
    session_start();
    
    if(!empty($_COOKIE["userName"])){
        setcookie("userName", "", time() - 3600);
        setcookie("password", "", time() - 3600);
        $_SESSION = [];
    }

    header("Location: index.php");
?>