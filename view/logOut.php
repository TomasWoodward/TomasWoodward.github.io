<?php
if(!defined('FROM_ROUTER') ){
	header('Location: ./index.php');
}

$_SESSION = array();

setcookie(session_name(), '', time() - 42000, '/');
session_unset();
session_destroy();
setcookie("userName" , "", time() + 90 * 24 * 60 * 60, "/", "", false, true);
setcookie("password" , "", time() + 90 * 24 * 60 * 60, "/", "", false, true);
setcookie("lastVisit", "", time() + 90 * 24 * 60 * 60, "/", "", false, true);
setcookie("theme"    , "", time() + 90 * 24 * 60 * 60, "/", "", false, true);
header("Location: ./index.php?action=login");
?>