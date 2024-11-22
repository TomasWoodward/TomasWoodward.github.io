<?php
if(!defined('FROM_ROUTER')){
	header('Location: ../index.php');
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

$error = $_GET["error"] ?? $_SESSION["error"];

if($_SESSION["AUTH"]==false ){
    include 'layout/nav.php';
}else{
    include 'layout/navAuth.php';
}
?>

<main>
    <h2>Error</h2>
    <p><?php echo $error; ?></p>
</main>

<?php
unset($_SESSION["error"]);
include 'layout/footer.php';
include 'layout/end.php';
?>