<?php
session_start();
if (!empty($_SESSION["userName"]) && !empty($_SESSION["password"])) {
   header("Location: userProfile.php");
}
$htmlTitle = 'Register';
$cssDefault = "searchStyle";
$cssOscuro = "searchOscuro";
$cssContraste = "searchContraste";
$cssGrande = "searchGrande";
$cssGrandeContraste = "searchHb";
$scripts1 = "";
include "inc/start.php";
include 'inc/header.php';
include 'inc/nav.php';

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
    <form action="registerResponse.php" method="post" id="formRegister" enctype="multipart/form-data">

        <label for="userName">User name: </label>
        <input type="text" id="userName" name="userName" value="<?php echo $userName; ?>">
        <span style="color:red;"><?php echo $_SESSION["userNameReg"] ?? ""; ?></span>

        <label for="pass">Password: </label>
        <input type="password" id="pass" name="pass">
        <span style="color:red;"><?php echo $_SESSION["pass"] ?? ""; ?></span>

        <label for="pass2">Repeat password: </label>
        <input type="password" id="pass2" name="pass2">
        <span style="color:red;"><?php echo $_SESSION["pass2"] ?? ""; ?></span>

        <label for="email">Email: </label>
        <input type="text" id="email" name="email" value="<?php echo $email; ?>">
        <span style="color:red;"><?php echo $_SESSION["email"] ?? ""; ?></span>

        <label for="sex">Sex: </label>
        <input type="text" id="sex" name="sex" value="<?php echo $sex; ?>">
        <span style="color:red;"><?php echo $_SESSION["sex"] ?? ""; ?></span>

        <label for="birth">Birth date (dd/mm/AAAA): </label>
        <input type="text" id="birth" name="birth" value="<?php echo $birth; ?>">
        <span style="color:red;"><?php echo $_SESSION["birth"] ?? ""; ?></span>

        <label for="city">City: </label>
        <input type="text" id="city" name="city" value="<?php echo $city; ?>">
        <span style="color:red;"><?php echo $_SESSION["city"] ?? ""; ?></span>

        <label for="country">Country: </label>
        <select id="country" name="country">
            <option value="usa" <?php echo $country == "usa" ? "selected" : ""; ?>>United States</option>
            <option value="canada" <?php echo $country == "canada" ? "selected" : ""; ?>>Canada</option>
            <option value="mexico" <?php echo $country == "mexico" ? "selected" : ""; ?>>Mexico</option>
            <option value="uk" <?php echo $country == "uk" ? "selected" : ""; ?>>United Kingdom</option>
            <option value="germany" <?php echo $country == "germany" ? "selected" : ""; ?>>Germany</option>
            <option value="australia" <?php echo $country == "australia" ? "selected" : ""; ?>>Australia</option>
            <option value="brazil" <?php echo $country == "brazil" ? "selected" : ""; ?>>Brazil</option>
            <option value="china" <?php echo $country == "china" ? "selected" : ""; ?>>China</option>
            <option value="india" <?php echo $country == "india" ? "selected" : ""; ?>>India</option>
            <option value="japan" <?php echo $country == "japan" ? "selected" : ""; ?>>Japan</option>
            <option value="spain" <?php echo $country == "spain" ? "selected" : ""; ?>>Spain</option>
        </select>
        <span style="color:red;"><?php echo $_SESSION["country"] ?? ""; ?></span>

        <label for="photo">Photo: </label>
        <input type="file" id="photo" name="photo">

        <input type="submit" value="Register">

    </form>
</main>

<?php
include 'inc/footer.php';
include 'inc/end.php';
?>
