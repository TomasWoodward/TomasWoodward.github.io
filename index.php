<?php
/*Este archivo se encarga de incluir la página solicitada por el usuario*/
ini_set('display_errors', 1);
error_reporting(E_ALL);
/*Establece la zona horaria de España*/
date_default_timezone_set('Europe/Madrid');
ini_set('date.timezone', 'Europe/Madrid');

//constante para evitar el acceso directo al archivo
define('FROM_ROUTER', true);
session_start();

/*Controladores de la aplicación*/
require_once 'controller/photoController.php';
require_once 'controller/countryController.php';
require_once 'controller/userController.php';
require_once 'controller/themeController.php';

$controllerPhotos = new PhotoController();
$controllerUser = new UserController();
$controllerCountry = new CountryController();
$controllerTheme = new ThemeController();


// Obtiene la acción solicitada por el usuario y la página correspondiente
$request = empty($_GET['action']) ? 'index' : $_GET['action'];
$parts = explode("?", $request);
$page = explode("/", $parts[0])[0];

// Procesa los parámetros adicionales en el query string (ej. ?id=5&name=photo)
$queryString = isset($parts[1]) ? $parts[1] : '';
parse_str($queryString, $params);

// Incluye la página correspondiente, pasando los parámetros como variables
extract($params);

// Verifica que el archivo exista en la carpeta "view"
if (!file_exists(__DIR__ . "/view/$page.php")) {
    $page = 'errorPage'; // Si no existe, muestra la página de error
    $error = '404 Not Found';
}

// Verifica si el usuario ya ha iniciado sesión previamente
if (
    !empty($_COOKIE["userName"]) &&
    !empty($_COOKIE["password"]) &&
    !empty($_COOKIE["theme"]) &&
    !empty($_COOKIE["lastVisit"]) && isset($controllerUser->getUser($_COOKIE["userName"])["clave"]) &&
    hash_equals($_COOKIE["password"], $controllerUser->getUser($_COOKIE["userName"])["clave"])
) {

    if (empty($_SESSION["lastVisit"])) {
        $_SESSION["lastVisit"] = $_COOKIE["lastVisit"];
    }
    $_SESSION["userName"] = $_COOKIE["userName"];
    $_SESSION["password"] = $_COOKIE["password"];
    $_SESSION["theme"] = $_COOKIE["theme"];
    setcookie("lastVisit", "", time() + 90 * 24 * 60 * 60, "/", "", false, true);
    setcookie("lastVisit", date("F j, Y, g:i a"), time() + 90 * 24 * 60 * 60, "/", "", false, true);

    $_SESSION["AUTH"] = true;
} else if (empty($_SESSION["AUTH"])) {
    $_SESSION["AUTH"] = false;
}

/*if (!empty($_COOKIE["userName"]) &&
    !empty($_COOKIE["password"]) && (!isset($controllerUser->getUser($_COOKIE["userName"])["clave"]) ||
    !hash_equals($_COOKIE["password"], $controllerUser->getUser($_COOKIE["userName"])["clave"]))
) {

    $_SESSION = array();
    setcookie(session_name(), '', time() - 42000, '/');
    session_unset();
    session_destroy();
    setcookie("userName", "", time() - 3600);
    setcookie("password", "", time() - 3600);
    setcookie("lastVisit", "", time() - 3600);
    setcookie("theme", "", time() - 3600);
    define("FROM_ROUTER", false);
    header("Location: ./index.php");
}*/

// Mostrar la página solicitada
include(__DIR__ . "/view/$page.php");
