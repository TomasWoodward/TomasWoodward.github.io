<?php
if (!defined('FROM_ROUTER') || !$_SESSION["AUTH"]) {
    header('Location: ../index.php');
}


$countrys = $controllerCountry->getCountries();
$data = $controllerUser->getUser($_SESSION["userName"]);
$htmlTitle = 'My Data';
$cssDefault = "searchStyle";
$cssOscuro = "searchOscuro";
$cssContraste = "searchContraste";
$cssGrande = "searchGrande";
$cssGrandeContraste = "searchHb";
$scripts1 = "";
include "layout/start.php";
include 'layout/header.php';
include 'layout/navAuth.php';



// Inicializamos las variables
$userName = !empty($data) ? $data['nomUsuario'] : '';
$password = !empty($data) ? $data['clave'] : '';
$password2 = !empty($data) ? $data['clave'] : '';
$email = !empty($data) ? $data['email'] : '';
$sex = !empty($data) ? $data['sexo'] : '';
$birth = !empty($data) ? $data['fNacimiento'] : '';   
$city = !empty($data) ? $data['ciudad'] : '';
$country = !empty($data) ? $data['pais'] : '';


?>
<main>
<h2><?=$htmlTitle?></h2>
<form action="index.php" method="put" id="formEdit" enctype="multipart/form-data">

<?php
include 'layout/registerForm.php';
?>

<input type="submit" value="Edit">

</form>
</main>

<?php
unset($_SESSION["userNameReg"], $_SESSION["pass"], $_SESSION["pass2"], $_SESSION["email"], $_SESSION["sex"], $_SESSION["birth"], $_SESSION["city"], $_SESSION["country"]);
unset($_SESSION["error_userNameReg"], $_SESSION["error_pass"], $_SESSION["error_pass2"], $_SESSION["error_email"], $_SESSION["error_sex"], $_SESSION["error_birth"], $_SESSION["error_city"], $_SESSION["error_country"]);

include 'layout/footer.php';
include 'layout/end.php';
?>