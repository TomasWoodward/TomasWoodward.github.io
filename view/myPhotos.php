<?php
if (!defined('FROM_ROUTER') || !$_SESSION["AUTH"]) {
    header('Location: ../index.php');
}


$htmlTitle = 'My Photos';
$cssDefault = "albumResult";
$cssOscuro = "albumResultOscuro";
$cssContraste = "albumResultContraste";
$cssGrande = "albumResultGrande";
$cssGrandeContraste = "albumResultHb";
$scripts1 ="";
include 'layout/start.php';
include 'layout/header.php';
include 'layout/navAuth.php';



$user = $controllerUser->getUser($_SESSION["userName"]);  
$userId = $user['idUsuario']; 
$album = $controllerPhotos->getAllAlbums_PhotosByUser($userId);
?>


<main>
    <h2><?=$htmlTitle?></h2>
    <h3><?=$user['nomUsuario']?>'s albums</h3>
<?php
    if ($album) {
        foreach ($album as $photo) {
            $country = $controllerCountry->getCountryById($photo['FotoPais']);

            echo '<figure>';
            echo '<h3>Album: ' . htmlspecialchars($photo['AlbumTitulo'], ENT_QUOTES, 'UTF-8') . '</h3>';
            echo '<a href="index.php?action=photoDetails&id=' . urlencode($photo['idFoto']) . '">';
            echo '<img src="view/img/users/' . htmlspecialchars($photo['FotoFichero'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($photo['FotoAlternativo'], ENT_QUOTES, 'UTF-8') . '">';
            echo '</a>';
            echo '<figcaption>';
            echo '<p>' . htmlspecialchars($photo['FotoDescripcion'], ENT_QUOTES, 'UTF-8') . '</p>';
            echo '<p>Country: ' . htmlspecialchars($country['nombre'] ?? 'Unknown', ENT_QUOTES, 'UTF-8') . '</p>';
            echo '<p>Fecha: ' . htmlspecialchars($photo['FotoFRegistro'], ENT_QUOTES, 'UTF-8') . '</p>';
            echo '</figcaption>';
            echo '</figure>';
        }
    }else{
        echo '<p>No albums found for this user</p>';
    }

?>


    


</main>

<?php
include 'layout/footer.php';
include 'layout/end.php';
?>