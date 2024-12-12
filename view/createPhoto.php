<?php
if (!defined('FROM_ROUTER') || $_SESSION["AUTH"] == false) {
    header('Location: ../index.php');
}

$countrys = $controllerCountry->getCountries();
$htmlTitle = 'Add Photo';
$cssDefault = "searchStyle";
$cssOscuro = "searchOscuro";
$cssContraste = "searchContraste";
$cssGrande = "searchGrande";
$cssGrandeContraste = "searchHb";
$scripts1 = "";
include "layout/start.php";
include 'layout/header.php';
include 'layout/navAuth.php';

$countrys = $controllerCountry->getCountries();
$albums =  $controllerUser->getAlbums($_SESSION["userName"]);
?>

<main>
    <h2><?= $htmlTitle ?></h2>
    <form action="index.php?action=createPhotoResponse" method="post" enctype="multipart/form-data">
        <label for="title">Title</label>
        <input type="text" id="title" name="title" required>

        <label for="description">Description</label>
        <textarea id="description" name="description" required></textarea>

        <label for="date">Date</label>
        <input type="date" id="date" name="date" required>

        <label for="country">Country: </label>
        <select id="country" name="country">
            <?php
            foreach ($countrys as $countrysql) {
                echo '<option value="' . $countrysql["nombre"] . '">' . $countrysql["nombre"] . '</option>';
            }
            ?>
        </select>

        <label for="photo">Image</label>
        <input type="file" id="photo" name="photo" required>

        <label for="alt">Alt</label>
        <input type="text" id="alt" name="alt" required minlength="10">

        <label for="album">Album</label>
        <select id="album" name="album" required>
            <option value="">Select an album</option>
            <?php
            $selected_album_name = isset($_GET["id"]) ? $_GET["id"] : null;
            foreach ($albums as $album) {
                $selected = ($album["titulo"] == $selected_album_name) ? "selected" : "";
                echo "<option value='" . $album['titulo'] . "' $selected>" . $album['titulo'] . "</option>";
            }
            ?>
        </select>
        <input type="submit" value="Add">
    </form>
</main>

<?php
include 'layout/footer.php';
include 'layout/end.php';
?>
