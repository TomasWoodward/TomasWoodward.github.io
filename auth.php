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

if(isset($_GET["userName"])){
    $userAuth = $_GET["userName"];
} else {
    $userAuth = "User Name";
}

include 'inc/navAuth.php';


?>

<main>
    <h2>Latest photos</h2>

    <figure>
        <a href="photoDetails.php">
            <h3>Photo title</h3>
        </a>
        <a href="photoDetails.php"><img src="img/users/photo1.png" alt="Photo1"></a>
        <figcaption>
            <p>Photo desc</p>
            <p>Photo by: <a href="userDetails.php">User</a></p>
        </figcaption>
    </figure>

    <figure>
        <a href="photoDetails.php">
            <h3>Photo title</h3>
        </a>
        <a href="photoDetails.php"><img src="img/users/photo2.png" alt="Photo2"></a>
        <figcaption>
            <p>Photo desc</p>
            <p>Photo by: <a href="userDetails.php">User</a></p>
        </figcaption>
    </figure>

    <figure>
        <a href="photoDetails.php">
            <h3>Photo title</h3>
        </a>
        <a href="photoDetails.php"><img src="img/users/photo3.png" alt="Photo3"></a>
        <figcaption>
            <p>Photo desc</p>
            <p>Photo by: <a href="userDetails.php">User</a></p>
        </figcaption>
    </figure>

    <figure>
        <a href="photoDetails.php">
            <h3>Photo title</h3>
        </a>
        <a href="photoDetails.php"><img src="img/users/photo4.png" alt="Photo4"></a>
        <figcaption>
            <p>Photo desc</p>
            <p>Photo by: <a href="userDetails.php">User</a></p>
        </figcaption>
    </figure>

    <figure>
        <a href="photoDetails.php">
            <h3>Photo title</h3>
        </a>
        <a href="photoDetails.php"><img src="img/users/photo5.png" alt="Photo5"></a>
        <figcaption>
            <p>Photo desc</p>
            <p>Photo by: <a href="userDetails.php">User</a></p>
        </figcaption>
    </figure>

</main>
<?php
include 'inc/footer.php';
include 'inc/end.php';
?>