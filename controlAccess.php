<?php
    $users = [
        "user1" => "pass1",
        "user2" => "pass2",
        "user3" => "pass3",
        "user4" => "pass4",
        "user5" => "pass5"
    ];

    $userName = isset($_POST["userName"]) ? $_POST["userName"] : '';
    $password = isset($_POST["pass"]) ? $_POST["pass"] : '';
    $error = "Invalid user or password";
    
    if(isset($users[$userName]) && $users[$userName] == $password){
        header("Location: auth.php?userName=" . urlencode($userName));
    } else {
        header("Location: login.php?error=".urlEncode($error));
    }


?>