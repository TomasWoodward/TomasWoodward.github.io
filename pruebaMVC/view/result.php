<?php
if(!defined('FROM_ROUTER') ){
	header('Location: ../index.php');
}

$htmlTitle = 'Search results';
$cssDefault = "indexEstilo";
$cssOscuro = "indexOscuro";
$cssContraste = "indexContraste";
$cssGrande = "indexGrande";
$cssGrandeContraste = "indexHighBig";
$scripts1 = "";
include 'layout/start.php';
include 'layout/header.php';

if ( $_SESSION["AUTH"]) {
    include 'layout/navAuth.php';
    include 'layout/mainAuth.php';
} else {
    include 'layout/nav.php';
    include 'layout/mainIndex.php';
}


include 'layout/parametrosBusqueda.php';
include 'layout/footer.php';
include 'layout/end.php';