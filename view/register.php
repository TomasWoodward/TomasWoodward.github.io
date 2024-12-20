<?php
if(!defined('FROM_ROUTER') ||  $_SESSION["AUTH"]==true ){
	header('Location: ../index.php');
}
$countrys = $controllerCountry->getCountries();
$htmlTitle = 'Register';
$cssDefault = "searchStyle";
$cssOscuro = "searchOscuro";
$cssContraste = "searchContraste";
$cssGrande = "searchGrande";
$cssGrandeContraste = "searchHb";
$scripts1 = "";
include "layout/start.php";
include 'layout/header.php';
include 'layout/nav.php';

// Inicializamos las variables
$userName = !empty($_SESSION["userNameReg"]) ? $_SESSION["userNameReg"] : '';
$password = !empty($_SESSION["pass"]) ? $_SESSION["pass"] : '';
$password2 = !empty($_SESSION["pass2"]) ? $_SESSION["pass2"] : '';
$email = !empty($_SESSION["email"]) ? $_SESSION["email"] : '';
$sex = !empty($_SESSION["sex"]) ? $_SESSION["sex"] : '';
$birth = !empty($_SESSION["birth"]) ? $_SESSION["birth"] : '';    
$city = !empty($_SESSION["city"]) ? $_SESSION["city"] : '';
$country = !empty($_SESSION["country"]) ? $_SESSION["country"] : '';

?>
<main>
<h2><?=$htmlTitle?></h2>
<form action="index.php?action=registerResponse" method="post" id="formRegister" enctype="multipart/form-data">
<?php

include 'layout/registerForm.php';
?>

<input type="submit" value="Register">

</form>
</main>

<?php
unset($_SESSION["userNameReg"], $_SESSION["pass"], $_SESSION["pass2"], $_SESSION["email"], $_SESSION["sex"], $_SESSION["birth"], $_SESSION["city"], $_SESSION["country"]);
unset($_SESSION["error_userNameReg"], $_SESSION["error_pass"], $_SESSION["error_pass2"], $_SESSION["error_email"], $_SESSION["error_sex"], $_SESSION["error_birth"], $_SESSION["error_city"], $_SESSION["error_country"]);

include 'layout/footer.php';
include 'layout/end.php';
?>
