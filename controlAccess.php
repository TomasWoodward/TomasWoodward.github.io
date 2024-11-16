<?php
session_start();

$users = [
    "user1" => "pass1",
    "user2" => "pass2",
    "user3" => "pass3",
    "user4" => "pass4",
    "user5" => "pass5"
];

// Verificar si las cookies están configuradas correctamente
if (!empty($_COOKIE["userName"]) && isset($users[$_COOKIE["userName"]]) && $users[$_COOKIE["userName"]] == $_COOKIE["password"] && empty($error)) {    
    // Guardar las credenciales en la sesión
    $_SESSION["userName"] = $_COOKIE["userName"];
    $_SESSION["password"] = $_COOKIE["password"];
    $_SESSION["lastVisit"] = $_COOKIE["lastVisit"];
    setcookie("lastVisit",date("F j, Y, g:i a"), time() + 90 * 24 * 60 * 60);
    // Redirigir al perfil de usuario
    header("Location: userProfile.php");
    exit();
}

// Obtener datos del formulario
$userName = !empty($_POST["userName"]) ? $_POST["userName"] : '';
$password = !empty($_POST["pass"]) ? $_POST["pass"] : '';
$remember = !empty($_POST["remember"]);

// Verificar credenciales
if (!empty($users[$userName]) && $users[$userName] == $password) {
    // Guardar las credenciales en la sesión
    $_SESSION["userName"] = $userName;
    $_SESSION["password"] = $password;
    $_SESSION["lastVisit"] = date(" F j, Y, g:i a");
    // Configurar cookies si el usuario selecciona "Recordar"
    if ($remember) {
        setcookie("userName", $userName, time() + 90 * 24 * 60 * 60);
        setcookie("password", $password, time() + 90 * 24 * 60 * 60);
        setcookie("lastVisit",date("F j, Y, g:i a"), time() + 90 * 24 * 60 * 60);
    }

    // Redirigir al perfil de usuario con el nombre codificado en la URL
    header("Location: userProfile.php");
    exit();
}

// Manejo de error: credenciales inválidas
$error = "Invalid user or password";

// Eliminar cookies existentes
setcookie("userName", "", time() - 3600);
setcookie("password", "", time() - 3600);
setcookie("lastVisit", "", time() - 3600);
// Limpiar la sesión
session_unset();
$_SESSION["error"] = $error;
// Redirigir a la página de login con el mensaje de error codificado en la URL
header("Location: login.php");
exit();
?>