<?php

    
    if(!empty($_COOKIE["userName"])){
        setcookie("userName", "", time() - 3600);
    }

    header("Location: index.php");
?>