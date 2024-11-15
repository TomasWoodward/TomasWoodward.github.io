<?php
session_start();
$users = [
    "user1" => "pass1",
    "user2" => "pass2",
    "user3" => "pass3",
    "user4" => "pass4",
    "user5" => "pass5"
];
$htmlTitle = 'Home';
$cssDefault = "indexEstilo";
$cssOscuro = "indexOscuro";
$cssContraste = "indexContraste";
$cssGrande = "indexGrande";
$cssGrandeContraste = "indexHighBig";
$scripts1 = "";
include 'inc/start.php';
include 'inc/header.php';

if(empty($_SESSION["userName"]) || !array_key_exists($_SESSION["userName"], $users) || $users[$_SESSION["userName"]] !== $_SESSION["password"] ){
    include 'inc/nav.php';
    include 'inc/mainIndex.php';
} else {
    include 'inc/navAuth.php';
    include 'inc/mainAuth.php';
}

?>


<?php
include 'inc/footer.php';
include 'inc/end.php';
?>