<?php
if(!defined('FROM_ROUTER') ||  $_SESSION["AUTH"]==false ){
	header('Location: ../index.php');
}

$userId= $controllerUser->getUserId($_SESSION["userName"]);


$title = htmlspecialchars(trim($_POST['title']), ENT_QUOTES, 'UTF-8');
$description = htmlspecialchars(trim($_POST['description']), ENT_QUOTES, 'UTF-8');
$date = htmlspecialchars(trim($_POST['date']), ENT_QUOTES, 'UTF-8');
$countryController = new CountryController();
$country = $countryController->getCountryByName($_POST['country']);
$alt = htmlspecialchars(trim($_POST['alt']), ENT_QUOTES, 'UTF-8');
$controllerPhotos = new PhotoController();
$album = $controllerPhotos->getAlbumByName($_POST['album']);
$imagePath = htmlspecialchars(trim($_POST['image']), ENT_QUOTES, 'UTF-8');

// Save the photo details to the database

$controllerPhotos->createPhoto($title, $description, $date, $country, $imagePath, $alt, $album, $userId);

$htmlTitle = 'Error';
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
	<h2>Photo <?php echo$_POST['title']; ?> Added correctly!!</h2>
	<p>Description: Been added to Album <?php echo $_POST['album'] ?></p>
	<a href="index.php?action=albumDetails&id=<?php echo $_POST['album']; ?>"><p>See album</p></a>
</main>
<?php
include 'layout/footer.php';
include 'layout/end.php';
?>