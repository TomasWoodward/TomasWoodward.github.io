<?php
    session_start();
    
    if(!empty($_COOKIE["userName"])){
        setcookie("userName", "", time() - 3600);
        setcookie("password", "", time() - 3600);
        session_unset();
    }

    header("Location: index.php");
?>