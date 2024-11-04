<?php
$htmlTitle = 'Accesibility';
$cssDefault = "accesibility";
$cssOscuro = "accesibilityOscuro";
$cssContraste = "accesibilityContraste";
$cssGrande = "accesibilityGrande";
$cssGrandeContraste = "accesibilityHB";
$scripts1 = "";
include 'inc/start.php';
include 'inc/header.php';
include 'inc/nav.php';
?>
<main>
    <h2>Accesibility statement</h2>
    <p>Using Mozilla Firefox browser you can have acces to our accesibility pages pressing "Alt":</p>
    <table>
        <tr>
            <th>Type</th>
            <th>Key function</th>
        </tr>

        <tr>
            <td>Default</td>
            <td>Alt + Upper-toolbar > view > page style > Default</td>
        </tr>

        <tr>
            <td>Dark Theme</td>
            <td>Alt + Upper-toolbar > view > page style > Dark Theme</td>
        </tr>

        <tr>
            <td>High Contrast</td>
            <td>Alt + Upper-toolbar > view > page style > High Contrast</td>
        </tr>

        <tr>
            <td>Big Font</td>
            <td>Alt + Upper-toolbar > view > page style > Big Font</td>
        </tr>

        <tr>
            <td>Big Font + High Contrast</td>
            <td>Alt + Upper-toolbar > view > page style > Big Font + High Contrast</td>
        </tr>
    </table>
</main>

<?php
include 'inc/footer.php';
include 'inc/end.php';
?>