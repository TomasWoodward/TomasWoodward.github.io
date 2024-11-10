<?php
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
$userName = isset($_POST["userName"]) ? $_POST["userName"] : '';
$password = isset($_POST["pass"]) ? $_POST["pass"] : '';
$password2 = isset($_POST["pass2"]) ? $_POST["pass2"] : '';
$email = isset($_POST["email"]) ? $_POST["email"] : '';
$sex = isset($_POST["sex"]) ? $_POST["sex"] : '';
$birth = isset($_POST["birth"]) ? $_POST["birth"] : '';    
$city = isset($_POST["city"]) ? $_POST["city"] : '';
$country = isset($_POST["country"]) ? $_POST["country"] : '';

if($_SERVER['REQUEST_METHOD'] == "POST") {
    $errors = [];   

    // Validaciones
    if(empty($userName)){
        $errors["name"] = "User name is required";
    }

    if(empty($password)){
        $errors["pass"] = "Password is required";
    }

    if(empty($password2)){
        $errors["pass2"] = "Repeat your password";
    } elseif($password != $password2){
        $errors["pass2"] = "Passwords do not match";
    }

    if(empty($email)){
        $errors["email"] = "Email is required";
    }

    if(empty($sex)){
        $errors["sex"] = "Sex is required";
    }

    if(empty($birth)){
        $errors["birth"] = "Birth date is required";
    }

    if(empty($city)){
        $errors["city"] = "City is required";
    }

    // Si no hay errores, puedes proceder con el siguiente paso (por ejemplo, guardar en la base de datos)
    if(empty($errors)){
        header("Location: registerResponse.php?userName=" . urlencode($userName) . "&email=" . urlencode($email) . "&birth=" . urlencode($birth) . "&sex=" . urlencode($sex) . "&city=" . urlencode($city) . "&country=" . urlencode($country));

    }
}
?>

<main>
    <h2>Register</h2>
    <form action="register.php" method="post" id="formRegister" enctype="multipart/form-data">

        <label for="userName">User name: </label>
        <input type="text" id="userName" name="userName" value="<?php echo $userName; ?>">
        <span style="color:red;"><?php echo $errors["name"] ?? ""; ?></span>

        <label for="pass">Password: </label>
        <input type="password" id="pass" name="pass">
        <span style="color:red;"><?php echo $errors["pass"] ?? ""; ?></span>

        <label for="pass2">Repeat password: </label>
        <input type="password" id="pass2" name="pass2">
        <span style="color:red;"><?php echo $errors["pass2"] ?? ""; ?></span>

        <label for="email">Email: </label>
        <input type="text" id="email" name="email" value="<?php echo $email; ?>">
        <span style="color:red;"><?php echo $errors["email"] ?? ""; ?></span>

        <label for="sex">Sex: </label>
        <input type="text" id="sex" name="sex" value="<?php echo $sex; ?>">
        <span style="color:red;"><?php echo $errors["sex"] ?? ""; ?></span>

        <label for="birth">Birth date (dd/mm/AAAA): </label>
        <input type="text" id="birth" name="birth" value="<?php echo $birth; ?>">
        <span style="color:red;"><?php echo $errors["birth"] ?? ""; ?></span>

        <label for="city">City: </label>
        <input type="text" id="city" name="city" value="<?php echo $city; ?>">
        <span style="color:red;"><?php echo $errors["city"] ?? ""; ?></span>

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
        <span style="color:red;"><?php echo $errors["country"] ?? ""; ?></span>

        <label for="photo">Photo: </label>
        <input type="file" id="photo" name="photo">

        <input type="submit" value="Register">

    </form>
</main>

<?php
include 'inc/footer.php';
include 'inc/end.php';
?>
