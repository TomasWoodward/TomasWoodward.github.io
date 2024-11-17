<?php
if(!defined('FROM_ROUTER') ||  $_SESSION["AUTH"]==false ){
	header('Location: ../index.php');
}

    $htmlTitle = 'Register response';
    $cssDefault = "albumResult";
    $cssOscuro = "albumResultOscuro";
    $cssContraste = "albumResultContraste";
    $cssGrande = "albumResultGrande";
    $cssGrandeContraste = "albumResultHb";
    $scripts1 ="";
    include 'layout/start.php';
    include 'layout/header.php';
    include 'layout/nav.php';

    $userName = !empty($_POST["userName"]) ? $_POST["userName"] : '';
    $password = !empty($_POST["pass"]) ? $_POST["pass"] : '';
    $password2 = !empty($_POST["pass2"]) ? $_POST["pass2"] : '';
    $email = !empty($_POST["email"]) ? $_POST["email"] : '';
    $sex = !empty($_POST["sex"]) ? $_POST["sex"] : '';
    $birth = !empty($_POST["birth"]) ? $_POST["birth"] : '';    
    $city = !empty($_POST["city"]) ? $_POST["city"] : '';
    $country = !empty($_POST["country"]) ? $_POST["country"] : '';

    if($_SERVER['REQUEST_METHOD'] == "POST") {
        // Validaciones
        if(empty($userName)){
            $_SESSION["error_userNameReg"] = "User name is required";
        }else {
            $_SESSION["userNameReg"] = $userName;
        }

        if(empty($password)){
            $_SESSION["error_pass"] = "Password is required";
        }   else {
            $_SESSION["pass"] = $password;
        }

        if(empty($password2)){
            $_SESSION["error_pass2"] = "Repeat your password";
        } elseif($password != $password2){
            $_SESSION["error_pass2"] = "Passwords do not match";
        } else {
            $_SESSION["pass2"] = $password2;
        }

        if(empty($email)){
            $_SESSION["error_email"] = "Email is required";
        } else {
            $_SESSION["email"] = $email;
        }

        if(empty($sex)){
            $_SESSION["error_sex"] = "Sex is required";
        } else {
            $_SESSION["sex"] = $sex;
        }

        if(empty($birth)){
            $_SESSION["error_birth"] = "Birth date is required";
        } else {
            $_SESSION["birth"] = $birth;
        }

        if(empty($city)){
            $_SESSION["error_city"] = "City is required";
        } else {
            $_SESSION["city"] = $city;
        }

        if(empty($country)){
            $_SESSION["error_country"] = "Country is required";
        } else {
            $_SESSION["country"] = $country;
        }
    }
?>

<main>

<?php
    if (!empty($_SESSION["error_userNameReg"]) || !empty($_SESSION["error_pass"]) || !empty($_SESSION["error_pass2"]) || !empty($_SESSION["error_email"]) || !empty($_SESSION["error_sex"]) || !empty($_SESSION["error_birth"]) || !empty($_SESSION["error_city"]) || !empty($_SESSION["error_country"])) {
        header("Location: index.php?action=register");
    } else {
?>

        <h2 style="color:green;">REGISTER SUCCEEDED</h2>
        <h3>Application details:</h3>
        <p>User name: <?php echo $userName; ?></p>
        <p>Email: <?php echo $email ?></p>
        <p>Birth date: <?php echo $birth ?></p>
        <p>Sex: <?php echo $sex; ?></p>
        <p>City: <?php echo $city ?></p>
        <p>Country: <?php echo $country ?></p>
<?php
    }
?>

</main>

<?php
    include 'layout/footer.php';
    include 'layout/end.php';
?>
