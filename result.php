<?php
$htmlTitle = 'Search results';
$cssDefault = "indexEstilo";
$cssOscuro = "indexOscuro";
$cssContraste = "indexContraste";
$cssGrande = "indexGrande";
$cssGrandeContraste = "indexHighBig";
$scripts1 = "";
include 'inc/start.php';
include 'inc/header.php';
include 'inc/navAuth.php';
?>

<main data-url="https://dawua.free.nf/">
    <h2>Search results</h2>
    <aside>
        <h3>Search parameters</h3>
        <?php if (!empty($_POST["searchTitle"])) { ?>
            <p>Title = <?php echo htmlspecialchars($_POST["searchTitle"]); ?></p>
            <p>Date = <?php echo htmlspecialchars($_POST["searchDate"] ?? ''); ?></p>
            <p>Country = <?php echo htmlspecialchars($_POST["searchCountry"] ?? ''); ?></p>
        <?php } else { ?>
            <p>Title = <?php echo htmlspecialchars($_POST["search"] ?? ''); ?></p>
        <?php } ?>
    </aside>
    <figure>
        <a href="photoDetails.php?id=1">
            <h3>Photo title</h3>
        </a>
        <a href="photoDetails.php?id=1"><img src="img/users/photo1.png" alt="Photo1"></a>
        <figcaption>
            <p>Aqui en la playa pasandolo bien con los colegas</p>
            <p>Photo by: <a href="userDetails.php">User</a></p>
        </figcaption>
    </figure>

    <figure>
        <a href="errorPage.php">
            <h3>Photo title</h3>
        </a>
        <a href="errorPage.php"><img src="img/users/photo2.png" alt="Photo2"></a>
        <figcaption>
            <p>Mi nuevo porche caiman de 300cv y 1000kg de peso</p>
            <p>Photo by: <a href="userDetails.php">User</a></p>
        </figcaption>
    </figure>

    <figure>
        <a href="photoDetails.php?id=2">
            <h3>Photo title</h3>
        </a>
        <a href="photoDetails.php?id=2"><img src="img/users/photo3.png" alt="Photo3"></a>
        <figcaption>
            <p>Mi nuevo porche caiman de 300cv y 1000kg de peso</p>
            <p>Photo by: <a href="userDetails.php">User</a></p>
        </figcaption>
    </figure>

    <figure>
        <a href="photoDetails.php?id=3">
            <h3>Photo title</h3>
        </a>
        <a href="photoDetails.php?id=3"><img src="img/users/photo4.png" alt="Photo4"></a>
        <figcaption>
            <p>Prueba de descripcion para la practica 1 de diseño de aplicaciones web</p>
            <p>Photo by: <a href="userDetails.php">User</a></p>
        </figcaption>
    </figure>

    <figure>
        <a href="photoDetails.php?id=4">
            <h3>Photo title</h3>
        </a>
        <a href="photoDetails.php?id=4"><img src="img/users/photo5.png" alt="Photo5"></a>
        <figcaption>
            <p>Ultima descripcion para verificar que todo se ve correctamente </p>
            <p>Photo by: <a href="userDetails.php">User</a></p>
        </figcaption>
    </figure>
</main>

<?php
include 'inc/footer.php';
include 'inc/end.php';
?>