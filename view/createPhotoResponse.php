<?php
if (!defined('FROM_ROUTER') || $_SESSION["AUTH"] == false) {
    header('Location: ../index.php');
    exit;
}

// Obtener el ID del usuario
$userId = $controllerUser->getUserId($_SESSION["userName"]);

// Sanitizar y validar datos del formulario
$title = htmlspecialchars(trim($_POST['title']), ENT_QUOTES, 'UTF-8');
$description = htmlspecialchars(trim($_POST['description']), ENT_QUOTES, 'UTF-8');
$date = htmlspecialchars(trim($_POST['date']), ENT_QUOTES, 'UTF-8');

// Validar y obtener el ID del país
$countryController = new CountryController();
$country = $countryController->getCountryIdByName($_POST['country']);

// Validar texto alternativo (alt)
$alt = htmlspecialchars(trim($_POST['alt']), ENT_QUOTES, 'UTF-8');
$forbiddenWords = ['foto', 'imagen'];
if (strlen($alt) < 10) {
    $_SESSION["error"] = "El texto alternativo debe tener al menos 10 caracteres.";
    header("Location: index.php?action=addPhotoForm");
    exit;
}
foreach ($forbiddenWords as $word) {
    if (stripos($alt, $word) === 0) { // Si empieza con una palabra prohibida
        $_SESSION["error"] = "El texto alternativo no puede comenzar con palabras como 'foto' o 'imagen'.";
        header("Location: index.php?action=addPhotoForm");
        exit;
    }
}

// Validar y obtener el ID del álbum
$album = $controllerPhotos->getAlbumIdByName($_POST['album']);
if (!$album) {
    $_SESSION["error"] = "El álbum seleccionado no existe.";
    header("Location: index.php?action=addPhotoForm");
    exit;
}

// Validar la ruta de la imagen
$imagePath = htmlspecialchars(trim($_POST['image']), ENT_QUOTES, 'UTF-8');
if (empty($imagePath)) {
    $_SESSION["error"] = "Debe seleccionar una imagen válida.";
    header("Location: index.php?action=addPhotoForm");
    exit;
}

// Crear la foto en la base de datos
$controllerPhotos->createPhoto($title, $description, $date, $country, $album, $imagePath, $alt);

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
    <a href="index.php?action=albumDetails&id=<?php echo $album; ?>"><p>See Album</p></a>
</main>
<?php
include 'layout/footer.php';
include 'layout/end.php';
?>
