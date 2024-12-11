<?php
if (!defined('FROM_ROUTER')) {
    header('Location: ../index.php');
}

$htmlTitle = 'Register response';
$cssDefault = "albumResult";
$cssOscuro = "albumResultOscuro";
$cssContraste = "albumResultContraste";
$cssGrande = "albumResultGrande";
$cssGrandeContraste = "albumResultHb";
$scripts1 = "";
include 'layout/start.php';
include 'layout/header.php';
include 'layout/nav.php';

$msgError = array(
    0 => "No hay error, el photo se subió con éxito",
    1 => "El tamaño del photo supera la directiva upload_max_filesize el php.ini",
    2 => "El tamaño del photo supera la directiva MAX_FILE_SIZE especificada en el formulario HTML",
    3 => "El photo fue parcialmente subido",
    4 => "No se ha subido un photo",
    6 => "No existe un directorio temporal",
    7 => "Fallo al escribir el photo al disco",
    8 => "La subida del photo fue detenida por la extensión"
);

$_SESSION["userNameReg"] = $_POST["userNameReg"] ?? "";
$_SESSION["pass"] = $_POST["pass"] ?? "";
$_SESSION["pass2"] = $_POST["pass2"] ?? "";
$_SESSION["email"] = $_POST["email"] ?? "";
$_SESSION["birth"] = $_POST["birth"] ?? "";
$_SESSION["city"] = $_POST["city"] ?? "";
$_SESSION["country"] = $_POST["country"] ?? "";
$_SESSION["sex"] = $_POST["sex"] ?? "";

// Sanitización de entradas
$_SESSION["userNameReg"] = htmlspecialchars(trim($_SESSION["userNameReg"]), ENT_QUOTES, 'UTF-8');
$_SESSION["pass"] = htmlspecialchars(trim($_SESSION["pass"]), ENT_QUOTES, 'UTF-8');
$_SESSION["pass2"] = htmlspecialchars(trim($_SESSION["pass2"]), ENT_QUOTES, 'UTF-8');
$_SESSION["email"] = filter_var(trim($_SESSION["email"]), FILTER_SANITIZE_EMAIL);
$_SESSION["birth"] = htmlspecialchars(trim($_SESSION["birth"]), ENT_QUOTES, 'UTF-8');
$_SESSION["city"] = htmlspecialchars(trim($_SESSION["city"]), ENT_QUOTES, 'UTF-8');
$_SESSION["country"] = htmlspecialchars(trim($_SESSION["country"]), ENT_QUOTES, 'UTF-8');

// Validación de datos
if (empty($_SESSION["userNameReg"]) || !preg_match('/^[a-zA-Z][a-zA-Z0-9]{2,14}$/', $_SESSION["userNameReg"])) {
    $_SESSION["error_userNameReg"] = "El nombre de usuario debe empezar con una letra, contener sólo letras y números, y tener entre 3 y 15 caracteres.";
}

if (empty($_SESSION["pass"]) || !preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d_-]{6,15}$/', $_SESSION["pass"])) {
    $_SESSION["error_pass"] = "La contraseña debe tener entre 6 y 15 caracteres, incluir al menos una letra mayúscula, una minúscula y un número, y puede contener guiones y guiones bajos.";
}

if (empty($_SESSION["pass2"]) || $_SESSION["pass"] !== $_SESSION["pass2"]) {
    $_SESSION["error_pass2"] = "Las contraseñas no coinciden.";
}

if (empty($_SESSION["email"]) || !filter_var($_SESSION["email"], FILTER_VALIDATE_EMAIL)) {
    $_SESSION["error_email"] = "La dirección de correo electrónico no es válida.";
} elseif (strlen($_SESSION["email"]) > 254) {
    $_SESSION["error_email"] = "El correo electrónico no puede exceder los 254 caracteres.";
}

if (empty($_SESSION["sex"])) {
    $_SESSION["error_sex"] = "Debe seleccionar un género.";
}

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

if (empty($_SESSION["city"])) {
    $_SESSION["error_city"] = "La ciudad no puede estar vacía.";
}

if (empty($_SESSION["country"])) {
    $_SESSION["error_country"] = "El país no puede estar vacío.";
}

if (
    !empty($_SESSION["error_userNameReg"]) || !empty($_SESSION["error_pass"]) ||
    !empty($_SESSION["error_pass2"]) || !empty($_SESSION["error_email"]) ||
    !empty($_SESSION["error_sex"]) || !empty($_SESSION["error_birth"]) ||
    !empty($_SESSION["error_city"]) || !empty($_SESSION["error_country"])
) {
    header("Location: index.php?action=register");
    exit;
}

// Registro del usuario si todo es válido
$user = $controllerUser->register(
    $_SESSION["userNameReg"],
    $_SESSION["pass"],
    $_SESSION["email"],
    $_SESSION["sex"],
    $_SESSION["birth"],
    $_SESSION["city"],
    $_SESSION["country"],
    "user.jpg",
    1
);
if (!$user) {
    $_SESSION["error"] = "Error al registrar el usuario";
    header('Location: index.php?action=errorPage');
    exit;
} else {
    if ($_FILES["photo"]["error"] > 0) {
        echo "Error: " . $msgError[$_FILES["photo"]["error"]] . "<br />";
    } else {
        echo "Nombre original: " . $_FILES["photo"]["name"] . "<br />";
        echo "Tipo: " . $_FILES["photo"]["type"] . "<br />";
        echo "Tamaño: " . ceil($_FILES["photo"]["size"] / 1024) . " Kb<br />";
        echo "Nombre temporal: " . $_FILES["photo"]["tmp_name"] . "<br />";

        
        $userDir = "img/users/" . $_SESSION["userNameReg"];
        if (!is_dir($userDir)) {
            mkdir($userDir, 0777, true);
        }
        if (file_exists("img/users/" . $_SESSION["userNameReg"] . "/" . $_FILES["photo"]["name"])) {
            echo $_FILES["photo"]["name"] . " ya existe";
        } else {
            move_uploaded_file(
                $_FILES["photo"]["tmp_name"],
                $userDir . "/" . $_FILES["photo"]["name"]
            );
        }
        echo "Almacenado en: " . $userDir . "/" . $_FILES["photo"]["name"];
    }
}
?>

<main>
    <h2 style="color:green;">REGISTER SUCCEEDED</h2>
    <h3>Application details:</h3>
    <p>User name: <?php echo $_SESSION["userNameReg"]; ?></p>
    <p>Email: <?php echo $_SESSION["email"]; ?></p>
    <p>Birth date: <?php echo $_SESSION["birth"] ?></p>
    <p>Sex: <?php echo $_SESSION["sex"]; ?></p>
    <p>City: <?php echo $_SESSION["city"]; ?></p>
    <p>Country: <?php echo $_SESSION["country"]; ?></p>
</main>

<?php
unset($_SESSION["userNameReg"], $_SESSION["pass"], $_SESSION["pass2"], $_SESSION["email"], $_SESSION["sex"], $_SESSION["birth"], $_SESSION["city"], $_SESSION["country"]);
unset($_SESSION["error_userNameReg"], $_SESSION["error_pass"], $_SESSION["error_pass2"], $_SESSION["error_email"], $_SESSION["error_sex"], $_SESSION["error_birth"], $_SESSION["error_city"], $_SESSION["error_country"]);

include 'layout/footer.php';
include 'layout/end.php';
?>