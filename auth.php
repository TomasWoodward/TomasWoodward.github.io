<?php
$htmlTitle = 'Home';
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

<main>
    <h2>Latest photos</h2>

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
        <a href="photoDetails.php?id=5">
            <h3>Photo title</h3>
        </a>
        <a href="photoDetails.php?id=5"><img src="img/users/photo1.png" alt="Photo1"></a>
        <figcaption>
            <p>Aqui en la playa pasandolo bien con los colegas</p>
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