<?php
session_start();

// Usuarios registrados
$users = [
    "user1" => "pass1",
    "user2" => "pass2",
    "user3" => "pass3",
    "user4" => "pass4",
    "user5" => "pass5"
];

$_SESSION["userName"] = $_COOKIE["userName"];
$_SESSION["password"] = $_COOKIE["password"];
$_SESSION["lastVisit"] = $_COOKIE["lastVisit"];
$_SESSION["lastVisit"] = $_COOKIE["theme"];
// Verificar si hay una sesión activa
if (empty($_SESSION["userName"]) || 
    !array_key_exists($_SESSION["userName"], $users) || 
    $users[$_SESSION["userName"]] !== $_SESSION["password"]
) {
    // Si no hay sesión, verificar las cookies
    if (!empty($_COOKIE["userName"]) && 
        !empty($_COOKIE["password"]) && 
        array_key_exists($_COOKIE["userName"], $users) && 
        $users[$_COOKIE["userName"]] === $_COOKIE["password"]
    ) {

        setcookie("lastVisit",date("F j, Y, g:i a"), time() + 90 * 24 * 60 * 60);
        header("Location: controlAccess.php");
        exit();
    } else {
        // Redirigir al login si no hay sesión válida ni cookies válidas
        setcookie("userName", "", time() - 3600,"", "",  false ,true);
        setcookie("password", "", time() - 3600, "", "",  false ,true);
        setcookie("theme", "", time() - 3600, "", "",  false ,true);
        setcookie("lastVisit", "", time() - 3600, "", "",  false ,true);
        session_unset();
        session_destroy();
        header("Location: login.php");
        exit();
    }
} 

?>