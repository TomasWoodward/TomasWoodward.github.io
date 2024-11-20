<?php 
if (!defined('FROM_ROUTER') || !$_SESSION["AUTH"]) {
    header('Location: ../index.php');
}

// Variables para HTML y CSS
$htmlTitle = 'User Profile';
$cssDefault = "userStyle";
$cssOscuro = "userOscuro";
$cssContraste = "userContraste";
$cssGrande = "userGrande";
$cssGrandeContraste = "userProfileHb";
$scripts1 = "";

// Inclusión de archivos comunes
include 'layout/start.php';
include 'layout/header.php';
include 'layout/navAuth.php';

$estilos = $controllerUser->getEstilos();
echo "<h2>Estilos</h2>";
if ($estilos) {
	echo'<main>';
	echo "<ul>";
	foreach ($estilos as $estilo) {
		echo "<li>{$estilo['nombre']}</li>";
	}
	echo "</ul>";
	echo "</main>";
} else {
	echo "<p>No hay estilos disponibles</p>";
}

include 'layout/footer.php';
include 'layout/end.php';

