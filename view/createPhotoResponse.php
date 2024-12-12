<?php
if (!defined('FROM_ROUTER') || $_SESSION["AUTH"] == false) {
    header('Location: ../index.php');
    exit;
}
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

$title = htmlspecialchars(trim($_POST['title']), ENT_QUOTES, 'UTF-8');
$description = htmlspecialchars(trim($_POST['description']), ENT_QUOTES, 'UTF-8');
$date = htmlspecialchars(trim($_POST['date']), ENT_QUOTES, 'UTF-8');
$alt = htmlspecialchars(trim($_POST['alt']), ENT_QUOTES, 'UTF-8');

$userId = $controllerUser->getUserId($_SESSION["userName"]);
$country = $controllerCountry->getCountryIdByName($_POST['country']);
$albumId = $controllerPhotos->getAlbumIdByName($_POST['album']);
echo $albumId;
$forbiddenWords = ['foto', 'imagen'];

if (strlen($alt) < 10) {
    $_SESSION["error"] = "El texto alternativo debe tener al menos 10 caracteres.";
    header("Location: index.php?action=addPhotoForm");
    exit;
}

foreach ($forbiddenWords as $word) {
    if (stripos($alt, $word) === 0) {
        $_SESSION["error"] = "El texto alternativo no puede comenzar con palabras como 'foto' o 'imagen'.";
        header("Location: index.php?action=errorPage");
        exit;
    }
}

// Registro del usuario si todo es válido
if ($_FILES["photo"]["error"] > 0) {
    echo "Error: " . $msgError[$_FILES["photo"]["error"]] . "<br />";
    $_SESSION["error"] = "Error al subir la foto";
    header('Location: index.php?action=errorPage');
    exit;
} else {
    echo "Nombre original: " . $_FILES["photo"]["name"] . "<br />";
    echo "Tipo: " . $_FILES["photo"]["type"] . "<br />";
    $extension = pathinfo($_FILES["photo"]["name"], PATHINFO_EXTENSION);
    echo "Tamaño: " . ceil($_FILES["photo"]["size"] / 1024) . " Kb<br />";
    echo "Nombre temporal: " . $_FILES["photo"]["tmp_name"] . "<br />";
    
    $userDir = "img/users/" . $_SESSION["userName"];
    if (!is_dir($userDir)) {
        mkdir($userDir, 0777, true);
    }

    $filePath = $userDir ."/". $_FILES["photo"]["name"];
    //agregar fechayhora para que no se repitan los nombres
    $filePath .= date("YmdHis") . "." . $extension;
    
    if (file_exists($filePath)) {
        echo "El archivo ya existe y será reemplazado.";
    }
    echo "Nuevo nombre: " . $filePath ;
    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $filePath)) {
        echo "Archivo subido y renombrado correctamente como: " . $filePath;
        
        $photo = $controllerPhotos->createPhoto($title, $description, $date, $country, $albumId, $filePath, $alt);
        if (!$photo) {
            $_SESSION["error"] = "Error al registrar el usuario";
            header('Location: index.php?action=errorPage');
            exit;
        }

    } else {
        echo "Error al mover el archivo a la carpeta del usuario.";
        $_SESSION["error"] = "Error al mover el archivo a la carpeta del usuario";
        header('Location: index.php?action=errorPage');
        exit;
    }
}



// Configuración de la vista de éxito
$htmlTitle = 'Photo Added';
$cssDefault = "albumResult";
$cssOscuro = "albumResultOscuro";
$cssContraste = "albumResultContraste";
$cssGrande = "albumResultGrande";
$cssGrandeContraste = "albumResultHb";
$scripts1 = "";
include 'layout/start.php';
include 'layout/header.php';
include 'layout/navAuth.php';

?>
<main>
    <h2>Photo "<?php echo htmlspecialchars($title); ?>" Added Correctly!!</h2>
    <p>Description: Added to Album "<?php echo htmlspecialchars($_POST['album']); ?>"</p>
    <a href="index.php?action=albumDetails&id=<?php echo $albumId; ?>"><p>See Album</p></a>
</main>
<?php
include 'layout/footer.php';
include 'layout/end.php';
?>
