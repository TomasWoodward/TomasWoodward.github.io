<?php
if(!defined('FROM_ROUTER') ||  $_SESSION["AUTH"]==false ){
	header('Location: ../index.php');
}

if(isset($_POST['albumTitle']) && isset( $_POST['description']) ){
	$userId= $controllerUser->getUserId($_SESSION["userName"]);
	$album = $controllerPhotos->addAlbum( $_POST['albumTitle'], $_POST['description'],$userId);
	$album = $controllerPhotos->getAlbumByName($_POST['albumTitle']);
}
if(!$album){
	header('Location: index.php?action=errorPage&error=Error creating album');
}
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
var_dump($album);
?>
<main>
	<h2>Album <?php echo $album[0]["titulo"]; ?> created correctly</h2>
	<p>Description: <?php echo $album[0]["titulo"] ?></p>
	<a href="index.php?action=albumDetails&id=<?php echo $album[0]['idAlbum']; ?>"><p>See album</p></a>
</main>
<?php
include 'layout/footer.php';
include 'layout/end.php';
?>