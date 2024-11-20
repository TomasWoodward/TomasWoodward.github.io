<?php
if (!defined('FROM_ROUTER') || !$_SESSION["AUTH"]) {
    header('Location: ../index.php');
}


$htmlTitle = 'User Details';
$cssDefault = "albumResult";
$cssOscuro = "albumResultOscuro";
$cssContraste = "albumResultContraste";
$cssGrande = "albumResultGrande";
$cssGrandeContraste = "albumResultHb";
$scripts1 ="";
include 'layout/start.php';
include 'layout/header.php';
include 'layout/navAuth.php';

$queryString = $_SERVER['QUERY_STRING'];
$params = explode("&", $queryString);
if($params[1]){
    $idUsuario = $params[1];
}else{
    echo `<p>There was an error with the user id</p>`;
}


$username = $controllerUser->getUserName($idUsuario);
$user = $controllerUser->getUser($username['nomUsuario']);  
$userId = $user['idUsuario']; 
$albums = $controllerUser->getAlbums($username["nomUsuario"]);
?>


<main>
    <h2><?=$htmlTitle?></h2>
    <h3><?=$user['nomUsuario']?></h3>
    <p>Profile pic: <?=$user['foto']?></p>
    <p>Been active since: <?=$user['fRegistro']?></p>
    <h3><?=$user['nomUsuario']?>'s albums</h3>
<?php
    if ($albums) {

        foreach ($albums as $album) {
            // $country = $controllerCountry->getCountryById($album['FotoPais']);
            echo '<figure>';
            echo '<h3>' . htmlspecialchars($album['titulo'], ENT_QUOTES, 'UTF-8') . '</h3>';
            // echo '<a href="index.php?action=photoDetails&id=' . urlencode($album['idFoto']) . '">';
            // echo '<img src="view/img/users/' . htmlspecialchars($album['FotoFichero'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($album['FotoAlternativo'], ENT_QUOTES, 'UTF-8') . '">';
            // echo '</a>';
            // echo '<figcaption>';
            // echo '<p>' . htmlspecialchars($album['FotoDescripcion'], ENT_QUOTES, 'UTF-8') . '</p>';
            // echo '<p>Country: ' . htmlspecialchars($album['nombre'] ?? 'Unknown', ENT_QUOTES, 'UTF-8') . '</p>';
            // echo '<p>Fecha: ' . htmlspecialchars($album['FotoFRegistro'], ENT_QUOTES, 'UTF-8') . '</p>';
            // echo '</figcaption>';
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