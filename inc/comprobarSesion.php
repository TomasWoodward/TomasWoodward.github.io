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
        // Usuario válido mediante cookies, no restaurar sesión
        // Continuar con la ejecución
    } else {
        // Redirigir al login si no hay sesión válida ni cookies válidas
        header("Location: login.php");
        exit();
    }
}
?>