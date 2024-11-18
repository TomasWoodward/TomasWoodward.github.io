<?php
if (!defined('FROM_ROUTER')) {
    header('Location: ../index.php');
}

$htmlTitle = 'Search';
$cssDefault = "searchStyle";
$cssOscuro = "searchOscuro";
$cssContraste = "searchContraste";
$cssGrande = "searchGrande";
$cssGrandeContraste = "searchHb";
$scripts1 = "";
include 'layout/start.php';
include 'layout/header.php';


if (!$_SESSION["AUTH"]) {
    include 'layout/nav.php';
} else {
    include 'layout/navAuth.php';
}

?>

<main>
    <h2>Search</h2>
    <form action="index.php?action=result" method="post">

        <label for="searchTitle">Title: </label>
        <input type="text" id="searchTitle" name="searchTitle">

        <label for="searchDate">Date: </label>
        <input type="date" id="searchDate" name="searchDate">

        <label for="searchCountry">Country: </label>
        <select id="country" name="country">

            <?php
            foreach ($countrys as $countrysql) {
                echo '<option value="' . $countrysql["nombre"] . '" ' . ($country == $countrysql["nombre"] ? "selected" : "") . '>' . $countrysql["nombre"] . '</option>';
            }
            ?>
        </select>

        <input type="submit" value="Search">
    </form>
</main>

<?php
include 'layout/footer.php';
include 'layout/end.php';
?>