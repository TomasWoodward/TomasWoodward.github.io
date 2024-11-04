<?php
$htmlTitle = 'Register';
$cssDefault = "searchStyle";
$cssOscuro = "searchOscuro";
$cssContraste = "searchContraste";
$cssGrande = "searchGrande";
$cssGrandeContraste = "searchHb";
$scripts1 = "<script src='script/formRegistro.js'></script>";
include "inc/start.php";
include 'inc/header.php';
include 'inc/nav.php';
?>

<main>
    <h2>Register</h2>
    <form action="auth.php" method="post" id="formRegister">

        <label for="userName">User name: </label>
        <input type="text" id="userName" name="userName">

        <label for="pass">Password: </label>
        <input type="password" id="pass" name="pass">

        <label for="pass2">Repeat password: </label>
        <input type="password" id="pass2" name="pass2">

        <label for="email">Email: </label>
        <input type="text" id="email" name="email">

        <label for="sex">Sex: </label>
        <input type="text" id="sex" name="sex">

        <label for="birth">Birth date (dd/mm/AAAA): </label>
        <input type="text" id="birth" name="birth">

        <label for="city">City: </label>
        <input type="text" id="city" name="city">


        <label for="country">Country: </label>
        <select id="country" name="country">
            <option value="usa">United States</option>
            <option value="canada">Canada</option>
            <option value="mexico">Mexico</option>
            <option value="uk">United Kingdom</option>
            <option value="germany">Germany</option>
            <option value="australia">Australia</option>
            <option value="brazil">Brazil</option>
            <option value="china">China</option>
            <option value="india">India</option>
            <option value="japan">Japan</option>
        </select>

        <label for="photo">Photo: </label>
        <input type="file" id="photo" name="photo">

        <input type="submit" value="Register">

    </form>
</main>

<?php
include 'inc/footer.php';
include 'inc/end.php';
?>