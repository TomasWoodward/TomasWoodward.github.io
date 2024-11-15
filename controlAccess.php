<?php
session_start();

$users = [
    "user1" => "pass1",
    "user2" => "pass2",
    "user3" => "pass3",
    "user4" => "pass4",
    "user5" => "pass5"
];


if ($_COOKIE["userName"] && $users[$userName] == $_COOKIE["password"] && !empty($error)) {
    $userName = $_COOKIE["userName"];
    $password = $_COOKIE["password"];
    $_SESSION["userName"] = $userName;
    $_SESSION["password"] = $password;
    header("Location: userProfile.php");
} else {
    $userName = !empty($_POST["userName"]) ? $_POST["userName"] : '';
    $password = !empty($_POST["pass"]) ? $_POST["pass"] : '';
    $remember = !empty($_POST["remember"]) ? true : false;

    if (!empty($users[$userName]) && $users[$userName] == $password) {
        $_SESSION["userName"] = $userName;
        $_SESSION["password"] = $password;

        if ($remember) {
            setcookie("userName", $userName, time() + 90 * 24 * 60 * 60);
            setcookie("password", $password, time() + 90 * 24 * 60 * 60);
        }
        header("Location: userProfile.php?userName=" . urlencode($userName));

    } else {
        $error = "Invalid user or password";
        //BORRAR COOKIES
        setcookie("userName", "", time() - 3600);
        setcookie("password", "", time() - 3600);
        $_SESSION= [];
        header("Location: login.php?error=" . urlEncode($error));
    }
}



?>