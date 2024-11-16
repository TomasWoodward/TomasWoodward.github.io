<?php
include("inc/comprobarSesion.php");

// Variables para HTML y CSS
$htmlTitle = 'User Profile';
$cssDefault = "userStyle";
$cssOscuro = "userOscuro";
$cssContraste = "userContraste";
$cssGrande = "userGrande";
$cssGrandeContraste = "userProfileHb";
$scripts1 = "";

// Inclusión de archivos comunes
include 'inc/start.php';
include 'inc/header.php';
include 'inc/navAuth.php';

// Mostrar saludo si hay un usuario activo
$userName = htmlspecialchars(!empty($_SESSION["userName"]) ? $_SESSION["userName"] : $_COOKIE["userName"]);
$lastVisit = !empty($_SESSION["lastVisit"]) ? $_SESSION["lastVisit"] : "This is your first visit";
echo "<h2>Welcome, $userName</h2>
      <p>Your last visit was: $lastVisit </p>";
?>

<main>
    <ul>
        <li>My data</li>
        <li>Unsubscribe</li>
        <li>My Albums</li>
        <li><a href="createAlbum.php">Create album</a></li>
        <li><a href="getAlbum.php">Request Album</a></li>
        <li><a href="logOut.php">Log out</a></li>
    </ul>
</main>

<?php
// Inclusión de pie de página y cierre
include 'inc/footer.php';
include 'inc/end.php';
?>
