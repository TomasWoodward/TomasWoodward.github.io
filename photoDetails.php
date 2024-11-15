<?php
    session_start();
    $users = [
        "user1" => "pass1",
        "user2" => "pass2",
        "user3" => "pass3",
        "user4" => "pass4",
        "user5" => "pass5"
    ];

    if(empty($_SESSION["userName"]) || !array_key_exists($_SESSION["userName"], $users) || $users[$_SESSION["userName"]] !== $_SESSION["password"]){
        header("Location: login.php");
    }
        
$htmlTitle = 'Photo title';
$cssDefault = "photoDetails";
$cssOscuro = "photoDetailsOscuro";
$cssContraste = "photoContraste";
$cssGrande = "photoDetailsGrande";
$cssGrandeContraste = "photoDetailsHb";
$scripts1 = "";
include 'inc/start.php';
include 'inc/header.php';
include 'inc/navAuth.php';

if ($_GET['id'] % 2 == 0) {
    ?>
    <main>
        <h2>Photo title 1 </h2>
        <figure>
            <img src="img/users/photo1.png" alt="Photo1">
            <figcaption>
                <time datetime="2024-01-01">January 1, 2024</time>
                <p>Country: Namibia</p>
                <p>Album: Cars</p>
                <a href="userDetails.php">User1</a>
            </figcaption>
        </figure>
    </main>
    <?php
} else {
    ?>
    <main>
        <h2>Photo title 2</h2>
        <figure>
            <img src="img/users/photo2.png" alt="Photo2">
            <figcaption>
                <time datetime="2024-01-01">February 27, 2016</time>
                <p>Country: Albania</p>
                <p>Album: Roses</p>
                <a href="userDetails.php">User2</a>
        </figure>
    </main>
    <?php
}
?>
?>
<?php
include 'inc/footer.php';
include 'inc/end.php';
?>