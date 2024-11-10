<?php
    $htmlTitle = 'Register response';
    $cssDefault = "albumResult";
    $cssOscuro = "albumResultOscuro";
    $cssContraste = "albumResultContraste";
    $cssGrande = "albumResultGrande";
    $cssGrandeContraste = "albumResultHb";
    $scripts1 ="";
    include 'inc/start.php';
    include 'inc/header.php';
    include 'inc/nav.php';

?>


<main>
    <h2 style="color:green;">REGISTER SUCCEDED</h2>
    <h3>Application details:</h3>
    <p>User name: <?php echo $_GET["userName"]?></p>
    <p>Email: <?php echo $_GET["email"]?></p>
    <p>Birht date: <?php echo $_GET["birth"]?></p>
    <p>Sex: <?php echo $_GET["sex"]?></p>
    <p>City: <?php echo $_GET["city"]?></p>
    <p>Country: <?php echo $_GET["country"]?></p> 
</main>



<?php
    include 'inc/footer.php';
    include 'inc/end.php';
?>  