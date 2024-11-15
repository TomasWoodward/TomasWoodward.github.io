<?php
session_start();
 if (!empty($_SESSION["userName"]) && !empty($_SESSION["password"])) {
    header("Location: userProfile.php");
} else if (!empty($_COOKIE["userName"]) && !empty($_COOKIE["password"])) {
    header("Location: ControlAccess.php");
} else {
    $userName = "";
    $password = "";
}

$htmlTitle = 'Log in';
$cssDefault = "searchStyle";
$cssOscuro = "searchOscuro";
$cssContraste = "searchContraste";
$cssGrande = "searchGrande";
$cssGrandeContraste = "searchHb";
$scripts1 = "";
include 'inc/start.php';
include 'inc/header.php';
include 'inc/nav.php';

if (!empty($_GET["error"])) {
    $error = $_GET["error"];
} else {
    $error = "";
}
?>
<main>
    <h2>Log in</h2>
    <form id="formLogin" action="controlAccess.php" method="post">
        <span style="color:red;"><?php echo $error ?></span>

        <label for="userName">User name:</label>
        <input type="text" id="userName" name="userName">

        <label for="pass">Password:</label>
        <input type="password" id="pass" name="pass">


        <label>
            <input type="checkbox" id="remember" name="remember">
            Remember me in this device for 90 days
        </label>


        <input type="submit" id="botonSubmit" value="Log-in">
    </form>
</main>
<?php
include 'inc/footer.php';
include 'inc/end.php';
?>