<?php
$htmlTitle = 'Home';
$cssDefault = "indexEstilo";
$cssOscuro = "indexOscuro";
$cssContraste = "indexContraste";
$cssGrande = "indexGrande";
$cssGrandeContraste = "indexHighBig";
$scripts1 = "";
include 'inc/start.php';
include 'inc/header.php';

if(!empty($_COOKIE["userName"])){
    include 'inc/navAuth.php';
    include 'inc/mainAuth.php';
} else {
    include 'inc/nav.php';
    include 'inc/mainIndex.php';
}

?>


<?php
include 'inc/footer.php';
include 'inc/end.php';
?>