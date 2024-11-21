<?php

if (!defined('FROM_ROUTER') || !isset($_SESSION["AUTH"]) || $_SESSION["AUTH"] == false) {
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

        <?php foreach ($result as $album): ?>

            
            <figure>
                <h3><?= $album['titulo'] ?></h3>
                <figcaption>
                    <p><?= $album['descripcion'] ?></p>
                </figcaption>
            </figure>
            

        <?php endforeach; ?>

    <?php else: ?>
        <figure>
            <p>Could not find any albums for this user</p>
        </figure>
    <?php endif; ?>
</main>


<?php
include 'layout/footer.php';
include 'layout/end.php';
?>