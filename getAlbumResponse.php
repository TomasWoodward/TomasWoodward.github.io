<?php
$htmlTitle = 'Get album response';
$cssDefault = "albumResult";
$cssOscuro = "albumResultOscuro";
$cssContraste = "albumResultContraste";
$cssGrande = "albumResultGrande";
$cssGrandeContraste = "albumResultHb";
include 'inc/start.php';
include 'inc/header.php';
include 'inc/navAuth.php';
?>
<main>
    <h2>Correct Album Print Request!!!</h2>
    <h3>Application details: </h3>
    <p>Name: <?= $_POST["name"] ?></p>
    <p>Album title: <?= $_POST["title"] ?></p>
    <p>Additional text: <?= $_POST["addText"] ?></p>
    <p>Email: <?= $_POST["email"] ?></p>
    <p>Adress: <?= $_POST["direc"] ?> <?= $_POST["number"] ?></p>
    <p>Phone: <?= $_POST["phone"] ?></p>
    <p>Color: <input type="color" id="color" name="color" value="#FF0000" disabled></p>
    <p>Copy number: <?= $_POST["cNumber"] ?></p>
    <p>Resolution: <?= $_POST["resolution"] ?></p>
    <p>User Album: <?= $_POST["userAlbum"] ?></p>
    <p>Date: <?= $_POST["aproxDate"] ?></p>
    <p>Price: 15$</p>
</main>

<?php
include 'inc/footer.php';
include 'inc/end.php';
?>