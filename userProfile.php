<?php
session_start();
$users = [
    "user1" => "pass1",
    "user2" => "pass2",
    "user3" => "pass3",
    "user4" => "pass4",
    "user5" => "pass5"
];
if($_COOKIE["password"] != $users[$_COOKIE["userName"]])
if (empty($_SESSION["userName"]) || 
    !array_key_exists($_SESSION["userName"], $users) ||
     $users[$_SESSION["userName"]] !== $_SESSION["password"] 
     ) {
    header("Location: login.php");
}


$htmlTitle = 'User profile';
$cssDefault = "userStyle";
$cssOscuro = "userOscuro";
$cssContraste = "userContraste";
$cssGrande = "userGrande";
$cssGrandeContraste = "userProfileHb";
$scripts1 = "";
include 'inc/start.php';
include 'inc/header.php';
include 'inc/navAuth.php';


if (!empty($_COOKIE["userName"])) {
    $userName = $_COOKIE["userName"];
    echo "<h2>Welcome $userName</h2>";
} else {
    echo "<h2>Welcome you're not logged in</h2>";
}

?>

<main>
    <ul>
        <li>My data</li>
        <li>Unsubscribe</li>
        <li>My Albums</li>
        <li><a href="createAlbum.php">Create albulm</a></li>
        <li><a href="getAlbum.php">Request Album</a></li>
        <li><a href="index.php">Log out</a></li>
    </ul>
</main>
<?php
include 'inc/footer.php';
include 'inc/end.php';
?>