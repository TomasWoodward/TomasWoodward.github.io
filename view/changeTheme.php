<?php
if (!defined('FROM_ROUTER') || $_SESSION["AUTH"] === false) {
    header('Location: ../index.php');
}
$themes = $controllerTheme->getTheme($_POST["themeSelect"]);
$userId = $controllerUser->getUserId($_SESSION["userName"]);

$afectadas = $controllerUser->updateStyle($userId,$_POST["themeSelect"]);
$_SESSION["theme"] = $themes["nombre"];
setcookie("theme"    , $themes["nombre"], time() + 90 * 24 * 60 * 60, "/", "", false, true);
header('Location: index.php?action=userProfile');