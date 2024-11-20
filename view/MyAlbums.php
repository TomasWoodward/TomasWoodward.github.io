<?php
if (!defined('FROM_ROUTER') || !$_SESSION["AUTH"]) {
    header('Location: ../index.php');
}


$htmlTitle = 'MyAlbums';
$cssDefault = "indexEstilo";
$cssOscuro = "indexOscuro";
$cssContraste = "indexContraste";
$cssGrande = "indexGrande";
$cssGrandeContraste = "indexHighBig";
$scripts1 = "";
include 'layout/start.php';
include 'layout/header.php';
include 'layout/navAuth.php';

$result = $controllerUser->getAlbums($_SESSION["userName"]);
?>

<main>
    <h2>My Albums</h2>
    <?php if (!empty($result)): ?>
        <ul>
            <?php foreach ($result as $album): ?>
                
                    <?php
                    echo '<figure>';
                    echo '<h3>' . $album['titulo'] .'['.$album['idAlbum'].']' . '</h3>';
                    echo '<figcaption>';
                    echo '<p>' . $album['descripcion'] . '</p>';
                    echo '</figcaption>';
                    echo '</figure>';
                    ?>
            
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Do not found albums for this user.</p>
    <?php endif; ?>
</main>


<?php
include 'layout/footer.php';
include 'layout/end.php';
?>