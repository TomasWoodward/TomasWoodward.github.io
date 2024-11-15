<?php
session_start();
$users = [
    "user1" => "pass1",
    "user2" => "pass2",
    "user3" => "pass3",
    "user4" => "pass4",
    "user5" => "pass5"
];
$htmlTitle = 'Accesibility';
$cssDefault = "accesibility";
$cssOscuro = "accesibilityOscuro";
$cssContraste = "accesibilityContraste";
$cssGrande = "accesibilityGrande";
$cssGrandeContraste = "accesibilityHB";
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