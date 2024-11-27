<?php
if(!defined('FROM_ROUTER') ||  $_SESSION["AUTH"]==false ){
	header('Location: ../index.php');
}

if(isset($_POST['albumTitle']) && isset( $_POST['description']) ){
	$userId= $controllerUser->getUserId($_SESSION["userName"]);
	$album = $controllerPhotos->addAlbum( $_POST['albumTitle'], $_POST['description'],$userId) ;
	header("Location: index.php?action=albumDetails&id={$album['idAlbum']}");
}
?>
