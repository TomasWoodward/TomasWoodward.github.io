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
    $remember = !empty($_POST["remember"]) ? true : false;
    $error = "Invalid user or password";
    
    if(!empty($users[$userName]) && $users[$userName] == $password){
        if($remember){
            setcookie("userName", $userName, time() + 90 * 24 * 60 * 60);
        }
        header("Location: userProfile.php?userName=" . urlencode($userName));

    } else {
        header("Location: login.php?error=".urlEncode($error));
    }


?>