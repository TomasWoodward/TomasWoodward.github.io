<?php
if (!defined('FROM_ROUTER') || $_SESSION["AUTH"] === false) {
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

$id = $_GET['id'];
if (!isset($id)) {
    header('Location: ../index.php');
    exit;
}
$photos = $controllerPhotos->getAlbumPhotos($id);
$userid = $controllerUser->getUserId($_SESSION["userName"]);

if (!empty($userid) && !empty($photos)) {
    if ($userid != $photos[0]["usuario_album"]) {
        echo '<main>';
        include 'layout/albumDetail.php';
        echo '</main>';
    } else {
        echo '<main>';
        include 'layout/albumDetail.php';
        echo '<a href="index.php?action=createPhoto&id=' . $photos[0]["albumId"] . '"><p>Agregar Foto</p></a>';
        echo '</main>';

    }
}else{
    $_SESSION["error"] = "No se ha encontrado el album";
    header('Location: index.php?action=errorPage');
}