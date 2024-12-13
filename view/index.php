<?php
if(!defined('FROM_ROUTER') ){
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

if($_SESSION["AUTH"]==false ){
    include 'layout/nav.php';
    include 'layout/mainIndex.php';
    
} else {
    include 'layout/navAuth.php';
    include 'layout/mainAuth.php';
}
?>

<?php

include 'layout/footer.php';
include 'layout/end.php';
?>