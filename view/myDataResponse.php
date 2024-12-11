<?php
if (!defined('FROM_ROUTER')) {
    header('Location: ../index.php');
}

$htmlTitle = 'Update response';
$cssDefault = "albumResult";
$cssOscuro = "albumResultOscuro";
$cssContraste = "albumResultContraste";
$cssGrande = "albumResultGrande";
$cssGrandeContraste = "albumResultHb";
$scripts1 = "";
include 'layout/start.php';
include 'layout/header.php';
include 'layout/navAuth.php';

// Obtener los datos enviados por el formulario
$_SESSION["userNameReg"] = $_POST["userNameReg"]??"";
$_SESSION["pass"]        = $_POST["pass"]??"";
$_SESSION["pass2"]       = $_POST["pass2"]??"";
$_SESSION["email"]       = $_POST["email"]??"";
$_SESSION["birth"]       = $_POST["birth"]??"";
$_SESSION["city"]        = $_POST["city"]??"";
$_SESSION["country"]     = $_POST["country"]??"";
$_SESSION["sex"]         = $_POST["sex"]??"";

// Limpieza de datos
if(!empty($_SESSION["userNameReg"])) {
    $_SESSION["userNameReg"] = htmlspecialchars(trim($_SESSION["userNameReg"]), ENT_QUOTES, 'UTF-8'); 
    if (!preg_match('/^[a-zA-Z][a-zA-Z0-9]{2,14}$/', $_SESSION["userNameReg"])) {
        $_SESSION["error_userNameReg"] = "El nombre de usuario debe empezar con una letra, contener sólo letras y números, y tener entre 3 y 15 caracteres.";
    }

}

if(!empty($_SESSION["pass"])) {
    $_SESSION["pass"]        = htmlspecialchars(trim($_SESSION["pass"]), ENT_QUOTES, 'UTF-8');
    if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d_-]{6,15}$/', $_SESSION["pass"])) {
        $_SESSION["error_pass"] = "La contraseña debe tener entre 6 y 15 caracteres, incluir al menos una letra mayúscula, una minúscula y un número, y puede contener guiones y guiones bajos.";
    }
}

if(!empty($_SESSION["pass2"])) {
    $_SESSION["pass2"]       = htmlspecialchars(trim($_SESSION["pass2"]), ENT_QUOTES, 'UTF-8');
    if ($_SESSION["pass"] !== $_SESSION["pass2"]) {
        $_SESSION["error_pass2"] = "Las contraseñas no coinciden.";
    }
}

if(!empty($_SESSION["email"])) {
    $_SESSION["email"]       = filter_var(trim($_SESSION["email"]), FILTER_SANITIZE_EMAIL);
    if (!filter_var($_SESSION["email"], FILTER_VALIDATE_EMAIL)) {
        $_SESSION["error_email"] = "La dirección de correo electrónico no es válida.";
    } elseif (strlen($_SESSION["email"]) > 254) {
        $_SESSION["error_email"] = "El correo electrónico no puede exceder los 254 caracteres.";
    }
}

if(!empty($_SESSION["birth"])) {
    $_SESSION["birth"]       = htmlspecialchars(trim($_SESSION["birth"]), ENT_QUOTES, 'UTF-8');
    try {
        $birthDate = DateTime::createFromFormat('Y-m-d', $_SESSION["birth"]);
        $today = new DateTime();
        $age = $today->diff($birthDate)->y;
    } catch (\Throwable $th) {
        $age = 0;
    }
    
    if (!$birthDate || $age < 18) {
        $_SESSION["error_birth"] = "Debe ingresar una fecha válida y ser mayor de 18 años.";
    }
    
}

if(!empty($_SESSION["city"])) {
    $_SESSION["city"]        = htmlspecialchars(trim($_SESSION["city"]), ENT_QUOTES, 'UTF-8');
    if (empty($_SESSION["city"])) {
        $_SESSION["error_city"] = "La ciudad no puede estar vacía.";
    }
}

if(!empty($_SESSION["country"])) {
    $_SESSION["country"]     = htmlspecialchars(trim($_SESSION["country"]), ENT_QUOTES, 'UTF-8');
    if (empty($_SESSION["country"])) {
        $_SESSION["error_country"] = "El país no puede estar vacío.";
    }
    $idCountry = $controllerCountry->getCountryIdByName($_SESSION["country"]);
    if (!$idCountry) {
        $_SESSION["error_country"] = "The selected country is not valid.";
    }
}

if(!empty($_SESSION["sex"])) {   
    $_SESSION["sex"]= htmlspecialchars(trim($_SESSION["sex"]), ENT_QUOTES, 'UTF-8');
    if (empty($_SESSION["sex"])) {
        $_SESSION["error_sex"] = "Debe seleccionar un género.";
    }
}

$userId = $controllerUser->getUserId($_SESSION["userName"]);
if (!$userId) {
    $_SESSION["error"] = "The user does not exist.";
 }

// Redirección si hay errores
if (
    !empty($_SESSION["error_userNameReg"]) || !empty($_SESSION["error_pass"]) ||
    !empty($_SESSION["error_pass2"]) || !empty($_SESSION["error_email"]) ||
    !empty($_SESSION["error_sex"]) || !empty($_SESSION["error_birth"]) ||
    !empty($_SESSION["error_city"]) || !empty($_SESSION["error_country"])
) {
    $_SESSION["error"] = "There were errors in your submission. Please correct them and try again.";
    header("Location: index.php?action=myData");
    exit;
}


// Actualización del usuario si todo es válido
$controllerUser->updateUser(
    $userId,
    $_SESSION["userNameReg"],
    $_SESSION["email"],
    $_SESSION["sex"],
    $_SESSION["birth"],
    $_SESSION["city"],
    $idCountry,
    null,
    $_SESSION["pass"],
);

?>

<main>
    <h2 style="color:green;">UPDATE SUCCEEDED</h2>
    <h3>Updated details:</h3>
    <p>User name: <?php echo $_SESSION["userNameReg"]; ?></p>
    <p>Email: <?php echo $_SESSION["email"]; ?></p>
    <p>Birth date: <?php echo $_SESSION["birth"] ?></p>
    <p>Sex: <?php echo $_SESSION["sex"]; ?></p>
    <p>City: <?php echo $_SESSION["city"]; ?></p>
    <p>Country: <?php echo $_SESSION["country"]; ?></p>
</main>

<?php

unset($_SESSION["userNameReg"], $_SESSION["pass"], $_SESSION["pass2"], $_SESSION["email"], $_SESSION["sex"], $_SESSION["birth"], $_SESSION["city"], $_SESSION["country"]);

include 'layout/footer.php';
include 'layout/end.php';
?>
