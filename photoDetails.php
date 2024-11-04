<?php
$htmlTitle = 'Photo title';
$cssDefault = "photoDetails";
$cssOscuro = "photoDetailsOscuro";
$cssContraste = "photoContraste";
$cssGrande = "photoDetailsGrande";
$cssGrandeContraste = "photoDetailsHb";
include 'inc/start.php';
include 'inc/header.php';
include 'inc/navAuth.php';

    if (isset($_GET['']) && $_GET['']   == 'photo1') {
        $photo = 'photo1';
    } else {
        $photo = 'photo2';
    }

?>

<main>
    <h2>Photo title</h2>
    <figure>
        <img src="img/users/photo1.png" alt="Photo1">
        <figcaption>
            <time datetime="2024-01-01">January 1, 2024</time>
            <p>Country</p>
            <p>Album</p>
            <a href="userDetails.php">User</a>
        </figcaption>
    </figure>
</main>
<?php
include 'inc/footer.php';
include 'inc/end.php';
?>