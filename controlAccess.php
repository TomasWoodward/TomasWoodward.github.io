<?php
    $users = [
        "user1" => "pass1",
        "user2" => "pass2",
        "user3" => "pass3",
        "user4" => "pass4",
        "user5" => "pass5"
    ];

    $userName = !empty($_POST["userName"]) ? $_POST["userName"] : '';
    $password = !empty($_POST["pass"]) ? $_POST["pass"] : '';
    $error = "Invalid user or password";
    
    if(!empty($users[$userName]) && $users[$userName] == $password){
        header("Location: userProfile.php?userName=" . urlencode($userName));
    } else {
        header("Location: login.php?error=".urlEncode($error));
    }


?>