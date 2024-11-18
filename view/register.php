<?php
if(!defined('FROM_ROUTER') ||  $_SESSION["AUTH"]==true ){
	header('Location: ../index.php');
}

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
    <h2>Register</h2>
    <form action="index.php?action=registerResponse" method="post" id="formRegister" enctype="multipart/form-data">

        <label for="userName">User name: </label>
        <input type="text" id="userName" name="userName" value="<?php echo $userName; ?>">
        <span style="color:red;"><?php echo $_SESSION["error_userNameReg"] ?? ""; ?></span>

        <label for="pass">Password: </label>
        <input type="password" id="pass" name="pass">
        <span style="color:red;"><?php echo $_SESSION["error_pass"] ?? ""; ?></span>

        <label for="pass2">Repeat password: </label>
        <input type="password" id="pass2" name="pass2">
        <span style="color:red;"><?php echo $_SESSION["error_pass2"] ?? ""; ?></span>

        <label for="email">Email: </label>
        <input type="text" id="email" name="email" value="<?php echo $email; ?>">
        <span style="color:red;"><?php echo $_SESSION["error_email"] ?? ""; ?></span>

        <label for="sex">Sex: </label>
        <input type="text" id="sex" name="sex" value="<?php echo $sex; ?>">
        <span style="color:red;"><?php echo $_SESSION["error_sex"] ?? ""; ?></span>

        <label for="birth">Birth date (dd/mm/AAAA): </label>
        <input type="text" id="birth" name="birth" value="<?php echo $birth; ?>">
        <span style="color:red;"><?php echo $_SESSION["error_birth"] ?? ""; ?></span>

        <label for="city">City: </label>
        <input type="text" id="city" name="city" value="<?php echo $city; ?>">
        <span style="color:red;"><?php echo $_SESSION["error_city"] ?? ""; ?></span>

        <label for="country">Country: </label>
        <select id="country" name="country">

        <?php
            foreach ($countrys as $countrysql) {
               echo '<option value="' . $countrysql["nombre"] . '" ' . ($country == $countrysql["nombre"] ? "selected" : "") . '>' . $countrysql["nombre"] . '</option>';
            }
        ?>
        </select>
        <span style="color:red;"><?php echo $_SESSION["error_country"] ?? ""; ?></span>


        <label for="photo">Photo: </label>
        <input type="file" id="photo" name="photo">

        <input type="submit" value="Register">

    </form>
</main>

<?php
unset($_SESSION["userNameReg"], $_SESSION["pass"], $_SESSION["pass2"], $_SESSION["email"], $_SESSION["sex"], $_SESSION["birth"], $_SESSION["city"], $_SESSION["country"]);
unset($_SESSION["error_userNameReg"], $_SESSION["error_pass"], $_SESSION["error_pass2"], $_SESSION["error_email"], $_SESSION["error_sex"], $_SESSION["error_birth"], $_SESSION["error_city"], $_SESSION["error_country"]);

include 'layout/footer.php';
include 'layout/end.php';
?>
