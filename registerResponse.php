<?php
session_start();

    $htmlTitle = 'Register response';
    $cssDefault = "albumResult";
    $cssOscuro = "albumResultOscuro";
    $cssContraste = "albumResultContraste";
    $cssGrande = "albumResultGrande";
    $cssGrandeContraste = "albumResultHb";
    $scripts1 ="";
    include 'inc/start.php';
    include 'inc/header.php';
    include 'inc/nav.php';

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
            $_SESSION["userNameReg"] = "User name is required";
        }

        if(empty($password)){
            $_SESSION["pass"] = "Password is required";
        }

        if(empty($password2)){
            $_SESSION["pass2"] = "Repeat your password";
        } elseif($password != $password2){
            $_SESSION["pass2"] = "Passwords do not match";
        }

        if(empty($email)){
            $_SESSION["email"] = "Email is required";
        }

        if(empty($sex)){
            $_SESSION["sex"] = "Sex is required";
        }

        if(empty($birth)){
            $_SESSION["birth"] = "Birth date is required";
        }

        if(empty($city)){
            $_SESSION["city"] = "City is required";
        }

    }
?>

<main>

<?php
    if (!empty($_SESSION)) {
        
        header("Location: register.php");
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
    include 'inc/footer.php';
    include 'inc/end.php';
?>
