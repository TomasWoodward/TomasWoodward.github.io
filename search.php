<?php
session_start();
$users = [
    "user1" => "pass1",
    "user2" => "pass2",
    "user3" => "pass3",
    "user4" => "pass4",
    "user5" => "pass5"
];

$htmlTitle = 'Search';
$cssDefault = "searchStyle";
$cssOscuro = "searchOscuro";
$cssContraste = "searchContraste";
$cssGrande = "searchGrande";
$cssGrandeContraste = "searchHb";
$scripts1 = "";
include 'inc/start.php';
include 'inc/header.php';

if(empty($_SESSION["userName"]) || !array_key_exists($_SESSION["userName"], $users) || $users[$_SESSION["userName"]] !== $_SESSION["password"] ){
    include 'inc/nav.php';
} else {
    include 'inc/navAuth.php';
}
?>
<main>
    <h2>Search</h2>
    <form action="result.php" method="post">

        <label for="searchTitle">Title: </label>
        <input type="text" id="searchTitle" name="searchTitle">

        <label for="searchDate">Date: </label>
        <input type="date" id="searchDate" name="searchDate">

        <label for="searchCountry">Country: </label>
        <input type="text" id="searchCountry" name="searchCountry">

        <input type="submit" value="Search">
    </form>
</main>

<?php
include 'inc/footer.php';
include 'inc/end.php';
?>