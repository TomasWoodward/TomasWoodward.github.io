<?php
$htmlTitle = 'Log in';
$cssDefault = "searchStyle";
$cssOscuro = "searchOscuro";
$cssContraste = "searchContraste";
$cssGrande = "searchGrande";
$cssGrandeContraste = "searchHb";
include 'inc/start.php';
include 'inc/header.php';
include 'inc/nav.php';
?>
<main>
    <form id="formLogin" action="auth.php" method="post">

        <label for="search">User name:</label>
        <input type="text" id="userName" name="userName">

        <label for="search">Password:</label>
        <input type="password" id="pass" name="pass">

        <input type="submit" id="botonSubmit" value="Log-in">
    </form>
</main>
<?php
include 'inc/footer.php';
include 'inc/end.php';
?>