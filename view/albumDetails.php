<?php
if(!defined('FROM_ROUTER')||$_SESSION["AUTH"] === false ){
	header('Location: ../index.php');
}
$htmlTitle = 'Home';
$cssDefault = "indexEstilo";
$cssOscuro = "indexOscuro";
$cssContraste = "indexContraste";
$cssGrande = "indexGrande";
$cssGrandeContraste = "indexHighBig";
$scripts1 = "";
include 'layout/start.php';
include 'layout/header.php';
include 'layout/navAuth.php';

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if ($id === false) {
    // Handle the error, e.g., redirect to an error page or show an error message
    header('Location: ../index.php');
    exit;
}
$photos = $controllerPhotos->getAlbumPhotos($id);
$userid=  $controllerUser->getUserId( $_SESSION["userName"]);

if ( $userid != $photos[0]["usuario_album"]) {
    echo'<main>';
    include 'layout/albumDetail.php';
    echo '</main>';
} else {
    echo'<main>';
    include 'layout/albumDetail.php';
    echo '<a href=""><p>Agregar Foto</p></a>';
    echo '</main>';

}