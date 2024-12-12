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

// Mostrar saludo si hay un usuario activo
$userName = htmlspecialchars(!empty($_SESSION["userName"]) ? $_SESSION["userName"] : $_COOKIE["userName"]);
$lastVisit = !empty($_SESSION["lastVisit"]) ? $_SESSION["lastVisit"] : "This is your first visit";
$profilePic = $controllerUser->getUserPhoto($userName);
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
if ($lastVisit == "This is your first visit") {
    echo "<p>" . $lastVisit . "</p>";
} else {
    echo "<p>Your last visit was: $lastVisit </p>";
}
echo "<P>Theme: {$_SESSION["theme"]} </p>";
?>

<main>
    <img src="<?php echo file_exists($profilePic) ? $profilePic : 'img/profileStandard.jpg'; ?>" alt="Profile Picture" style="width: 250px; height: 250px; border-radius: 50%; border: solid .2em black; margin-right: 4em;">
    <ul>
        <li><a href="index.php?action=themeConfig">Theme configuration</a></li>
        <li><a href="index.php?action=myData">My data</a></li>
        <li><a href="index.php?action=createAlbum">Create album</a></li>
        <li><a href="index.php?action=createPhoto">Upload photo</a></li>
        <li><a href="index.php?action=getAlbum">Request Album</a></li>
        <li><a href="index.php?action=myPhotos">My photos</a></li>
        <li><a href="index.php?action=deleteAccount">Delete my Account</a></li>
    </ul>
</main>

<?php
// Inclusión de pie de página y cierre
include 'layout/footer.php';
include 'layout/end.php';
?>