<?php
if(!defined('FROM_ROUTER')){
	header('Location: ./index.php');
}
$themes = [
    "user1" => "default",
    "user2" => "dark theme",
    "user3" => "high contrast",
    "user4" => "big Font",
    "user5" => "big Font + high contrast"
];


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
    $_SESSION["theme"] = $themes[$userName];
    $_SESSION["AUTH"] = true;

    // Configurar cookies si el usuario selecciona "Recordar"
    if ($remember) {
        setcookie("userName", $userName, time() + 90 * 24 * 60 * 60, "", "", false, true);
        setcookie("password", $password, time() + 90 * 24 * 60 * 60, "", "", false, true);
        setcookie("lastVisit", date("F j, Y, g:i a"), time() + 90 * 24 * 60 * 60, "", "", false, true);


        if (isset($themes[$userName])) {
            setcookie("theme", "", time() - 3600, "", "", false, true);
            setcookie("theme", $themes[$userName], time() + 90 * 24 * 60 * 60, "", "", false, true);
        }
    }

    // Redirigir al perfil de usuario con el nombre codificado en la URL
    header("Location: index.php?action=userProfile");

} else {

    // Manejo de error: credenciales inválidas
    $error = "Invalid user or password";

    // Eliminar cookies existentes
    setcookie("userName", "", time() - 3600, "", "", false, true);
    setcookie("password", "", time() - 3600, "", "", false, true);
    setcookie("lastVisit", "", time() - 3600, "", "", false, true);
    setcookie("theme", "", time() - 3600, "", "", false, true);
    // Limpiar la sesión
    session_unset();
    session_destroy();
    $_SESSION["error"] = $error;
    $_SESSION["AUTH"] = false;
    // Redirigir a la página de login con el mensaje de error codificado en la URL
    header("Location: index.php?action=login");

}
?>