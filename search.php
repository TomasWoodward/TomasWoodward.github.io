<?php
$htmlTitle = 'Search';
$cssDefault = "searchStyle";
$cssOscuro = "searchOscuro";
$cssContraste = "searchContraste";
$cssGrande = "searchGrande";
$cssGrandeContraste = "searchHb";
$scripts1 = "";
include 'inc/start.php';
include 'inc/header.php';
include 'inc/navAuth.php';
?>
<main>
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