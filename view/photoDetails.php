<?php
if(!defined('FROM_ROUTER') || $_SESSION["AUTH"] == false){
	header('Location: ./index.php');
}

$htmlTitle = 'Photo title';
$cssDefault = "photoDetails";
$cssOscuro = "photoDetailsOscuro";
$cssContraste = "photoContraste";
$cssGrande = "photoDetailsGrande";
$cssGrandeContraste = "photoDetailsHb";
$scripts1 = "";
include 'layout/start.php';
include 'layout/header.php';
include 'layout/navAuth.php';

if ($id % 2 == 0) {
    ?>
    <main>
        <h2>Photo title 1 </h2>
        <figure>
            <img src="view/img/users/photo1.png" alt="Photo1">
            <figcaption>
                <time datetime="2024-01-01">January 1, 2024</time>
                <p>Country: Namibia</p>
                <p>Album: Cars</p>
                <a href="index.php?action=userDetails">User1</a>
            </figcaption>
        </figure>
    </main>
    <?php
} else {
    ?>
    <main>
        <h2>Photo title 2</h2>
        <figure>
            <img src="view/img/users/photo2.png" alt="Photo2">
            <figcaption>
                <time datetime="2024-01-01">February 27, 2016</time>
                <p>Country: Albania</p>
                <p>Album: Roses</p>
                <a href="index.php?action=userDetails">User2</a>
        </figure>
    </main>
    <?php
}
?>
?>
<?php
include 'layout/footer.php';
include 'layout/end.php';
?>