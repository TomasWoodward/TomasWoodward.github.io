<?php
session_start();
include("inc/comprobarSesion.php");
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

    }
?>

<main>

<?php
    if (!empty($errors)) {
        $errorParams = http_build_query($errors);
        echo '<h3>Register Failed</h3>
              <form id="autoSubmitForm" action="register.php?' . $errorParams . '" method="POST">
                  <input type="hidden" name="userName" value="' . htmlspecialchars($userName) . '">
                  <input type="hidden" name="email" value="' . htmlspecialchars($email) . '">
                  <input type="hidden" name="birth" value="' . htmlspecialchars($birth) . '">
                  <input type="hidden" name="sex" value="' . htmlspecialchars($sex) . '">
                  <input type="hidden" name="city" value="' . htmlspecialchars($city) . '">
                  <input type="hidden" name="country" value="' . htmlspecialchars($country) . '">
                  <input type="submit" value="Go back">
              </form>';
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
