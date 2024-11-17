<?php
if(!defined('FROM_ROUTER') ||  !$_SESSION["AUTH"]){
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

// Mostrar saludo si hay un usuario activo
$userName = htmlspecialchars(!empty($_SESSION["userName"]) ? $_SESSION["userName"] : $_COOKIE["userName"]);
$lastVisit = !empty($_SESSION["lastVisit"]) ? $_SESSION["lastVisit"] : "This is your first visit";

$horaActual = intval(date("H"));

// Determinar el mensaje según la franja horaria
if ($horaActual >= 6 && $horaActual < 12) {
    $mensaje = "Good morning";
} elseif ($horaActual >= 12 && $horaActual < 16) {
    $mensaje = "Welcome";
} elseif ($horaActual >= 16 && $horaActual < 20) {
    $mensaje = "Good afternoon";
} else {
    $mensaje = "Good evening";
}
echo "<h2>$mensaje, $userName</h2>";
echo "<p>Your last visit was: $lastVisit </p>";
echo "<P>Theme: {$_SESSION["theme"] } </p>";
?>

<main>
    <ul>
        <li>My data</li>
        <li>Unsubscribe</li>
        <li>My Albums</li>
        <li><a href="index.php?action=createAlbum">Create album</a></li>
        <li><a href="index.php?action=getAlbum">Request Album</a></li>
        <li><a href="index.php?action=logOutç">Log out</a></li>
    </ul>
</main>

<?php
// Inclusión de pie de página y cierre
include 'layout/footer.php';
include 'layout/end.php';
?>
