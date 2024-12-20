<?php

if(!defined('FROM_ROUTER') ||  $_SESSION["AUTH"] == true){
	header('Location: ../index.php');
}

$htmlTitle = 'Log in';
$cssDefault = "searchStyle";
$cssOscuro = "searchOscuro";
$cssContraste = "searchContraste";
$cssGrande = "searchGrande";
$cssGrandeContraste = "searchHb";
$scripts1 = "";
include 'layout/start.php';
include 'layout/header.php';
include 'layout/nav.php';

$error = $_SESSION["error"] ?? "";
?>
<main>
    <h2>Log in</h2>
    <form id="formLogin" action="index.php?action=controlAccess" method="post">
        <span style="color:red;"><?php echo $error ?></span>

        <label for="userName">User name:</label>
        <input type="text" id="userName" name="userName">

        <label for="pass">Password:</label>
        <input type="password" id="pass" name="pass">


        <label>
            <input type="checkbox" id="remember" name="remember" value="1">
            Remember me in this device for 90 days
        </label>
        <input type="submit" id="botonSubmit" value="Log-in">
    </form>
</main>

<?php
unset($_SESSION["error"]);
include 'layout/footer.php';
include 'layout/end.php';
?>