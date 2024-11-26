<?php
if (!defined('FROM_ROUTER') || !$_SESSION["AUTH"]) {
    header('Location: ../index.php');
}

$htmlTitle = 'Theme configuration';
$cssDefault = "searchStyle";
$cssOscuro = "searchOscuro";
$cssContraste = "searchContraste";
$cssGrande = "searchGrande";
$cssGrandeContraste = "searchHb";
$scripts1 = "";
include 'layout/start.php';
include 'layout/header.php';
include 'layout/navAuth.php';

$themes = $controllerTheme->listThemes();
?>
<main>

    <form action="index.php?action=changeTheme" method="POST">
        <h2><?=$htmlTitle?></h2>
        <h3>Choose a Theme</h3>
        <label for="themeSelect">Select Theme:</label>
        <select name="themeSelect" id="themeSelect" required>

            <?php
            if ($themes) {
                foreach ($themes as $theme) {
                    echo '<option value="' . htmlspecialchars($theme['idEstilo'], ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($theme['nombre'], ENT_QUOTES, 'UTF-8') . '</option>';
                }
            } else {
                echo '<option disabled>No themes available</option>';
            }
            ?>
        </select>
        <input type="submit" value="Change Theme"></input>
    </form>
</main>

<?php
include 'layout/footer.php';
include 'layout/end.php';
?>
