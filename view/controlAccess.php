<?php
if(!defined('FROM_ROUTER')){
	header('Location: ../index.php');
}

// Obtener datos del formulario
$userName = !empty($_POST["userName"]) ? $_POST["userName"] : '';
$password = !empty($_POST["pass"]) ? $_POST["pass"] : '';
$remember = !empty($_POST["remember"]);

$usuario = $controllerUser->login($userName, $password);

// Verificar credenciales
if ($usuario) {
    // Guardar las credenciales en la sesión
    $_SESSION["userName"] = $usuario["nomUsuario"];
    $_SESSION["password"] = $usuario["clave"];
    $_SESSION["lastVisit"] = date(" F j, Y, g:i a");
    $estilo = $controllerUser->getStyle($usuario["idUsuario"]);
    $_SESSION["theme"] = $estilo["nombre"];
    $_SESSION["AUTH"] = true;

    // Configurar cookies si el usuario selecciona "Recordar"
    if ($remember) {
        setcookie("userName" , $usuario["nomUsuario"], time() + 90 * 24 * 60 * 60, "/", "", false, true);
        setcookie("password" , $usuario["clave"], time() + 90 * 24 * 60 * 60, "/", "", false, true);
        setcookie("lastVisit", date("F j, Y, g:i a"), time() + 90 * 24 * 60 * 60, "/", "", false, true);
        setcookie("theme"    , $estilo["nombre"], time() + 90 * 24 * 60 * 60, "/", "", false, true);
    }

    // Redirigir al perfil de usuario
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
    header("Location: index.php?action=errorPage&usuario=" . $usuario['nomUsuario'] . "&error=" . $error);

}
?>