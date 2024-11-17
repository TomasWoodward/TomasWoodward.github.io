<?php
session_start();
/*Controlador de la aplicación*/
/*Este archivo se encarga de incluir la página solicitada por el usuario*/

//constante para evitar el acceso directo al archivo
define('FROM_ROUTER', true);

// Array de usuarios
$users = [
    "user1" => "pass1",
    "user2" => "pass2",
    "user3" => "pass3",
    "user4" => "pass4",
    "user5" => "pass5"
];

// Obtiene la acción solicitada por el usuario y la página correspondiente
$request = empty($_GET['action']) ? 'index' : $_GET['action'];
$parts = explode("?", $request);    
$page = explode("/", $parts[0])[0]; 

// Procesa los parámetros adicionales en el query string (ej. ?id=5&name=photo)
$queryString = isset($parts[1]) ? $parts[1] : '';
parse_str($queryString, $params);
// Incluye la página correspondiente, pasando los parámetros como variables
extract($params); // Convierte los parámetros en variables

// Verifica que el archivo exista en la carpeta "view"
if (!file_exists(__DIR__ . "/view/$page.php")) {
    $page = 'errorPage'; // Si no existe, muestra la página de error
    $error = '404 Not Found';
}

// Verifica si el usuario ya ha iniciado sesión previamente
if (!empty($_COOKIE["userName"])  && 
    !empty($_COOKIE["password"])  && 
    !empty($_COOKIE["theme"])     &&
    !empty($_COOKIE["lastVisit"]) &&  $_COOKIE["password"] == $users[$_COOKIE["userName"]]  ) {

    $_SESSION["userName"]  = $_COOKIE["userName"];
    $_SESSION["password"]  = $_COOKIE["password"];
    $_SESSION["theme"]     = $_COOKIE["theme"];
    $_SESSION["lastVisit"] = $_COOKIE["lastVisit"];
    // Establece la autenticación en verdadero
   $_SESSION["AUTH"] = true;
} else {
    $_SESSION["AUTH"] = false;
}
// parametros para photoDetails
if (!empty($params ["id"])) {
    $id = $params ["id"];
}
// Mostrar la página solicitada
include(__DIR__ . "/view/$page.php");