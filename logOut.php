<?php
    session_start();
    
    if(!empty($_SESSION["userName"])){
        
        session_unset();
        session_destroy();
        setcookie("userName", "", time() - 3600);
        setcookie("password", "", time() - 3600);
        setcookie("lastVisit", "", time() - 3600);
        setcookie("theme", "", time() - 3600);        
    }

    header("Location: index.php");
?>