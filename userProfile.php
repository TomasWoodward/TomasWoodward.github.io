<?php
$htmlTitle = 'User profile';
$cssDefault = "userStyle";
$cssOscuro = "userOscuro";
$cssContraste = "userContraste";
$cssGrande = "userGrande";
$cssGrandeContraste = "userProfileHb";
include 'inc/start.php';
include 'inc/header.php';
include 'inc/navAuth.php';
?>
<main>
    <ul>
        <li>My data</li>
        <li>Unsubscribe</li>
        <li>My Albums</li>
        <li>Create albulm</li>
        <li><a href="./getAlbum.php">Request Album</a></li>
        <li><a href="auth.php">Log out</a></li>
    </ul>
</main>
<?php
include 'inc/footer.php';
include 'inc/end.php';
?>