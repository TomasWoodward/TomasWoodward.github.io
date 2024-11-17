<?php
if(!defined('FROM_ROUTER') ){
	header('Location: ./index.php');
}

$_SESSION = array();
// Borra la cookie que almacena la sesión
if(isset($_COOKIE[session_name()])) {
	setcookie(session_name(), '', time() - 42000, '/');
}



session_unset();
session_destroy();
setcookie("userName", "", time() - 3600);
setcookie("password", "", time() - 3600);
setcookie("lastVisit", "", time() - 3600);
setcookie("theme", "", time() - 3600);
define("FROM_ROUTER",false);
header("Location: index.php");
?>