<?php
if(!defined('FROM_ROUTER') ){
	header('Location: ../index.php');
}
session_unset();
session_destroy();
setcookie("userName", "", time() - 3600);
setcookie("password", "", time() - 3600);
setcookie("lastVisit", "", time() - 3600);
setcookie("theme", "", time() - 3600);
$_SESSION["AUTH"] = false;
define("FROM_ROUTER",false);
header("Location: index.php");
?>