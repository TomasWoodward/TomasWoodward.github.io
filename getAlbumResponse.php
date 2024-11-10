
<?php
$htmlTitle = 'Get album response';
$cssDefault = "albumResult";
$cssOscuro = "albumResultOscuro";
$cssContraste = "albumResultContraste";
$cssGrande = "albumResultGrande";
$cssGrandeContraste = "albumResultHb";
$scripts1 ="";
include 'inc/start.php';
include 'inc/header.php';
include 'inc/navAuth.php';
function calcularPrecioAlbum($numPaginas, $numFotos, $esColor, $resolucion) {
    $costoProcesamiento = 10; // Costo fijo de procesamiento y envío.
    $costoPaginas = 0;

    // Calcular el costo de las páginas en tramos
    if ($numPaginas <= 4) {
        $costoPaginas = $numPaginas * 2.0;
    } elseif ($numPaginas <= 10) {
        $costoPaginas = (4 * 2.0) + (($numPaginas - 4) * 1.8);
    } else {
        $costoPaginas = (4 * 2.0) + (6 * 1.8) + (($numPaginas - 10) * 1.6);
    }

    // Determinamos el costo por foto según si es a color o en blanco y negro.
    $costoPorFoto = $esColor ? 0.5 : 0;

    // Calculamos el costo de las fotos.
    $costoFotos = $numFotos * $costoPorFoto;

    // Determinamos el costo adicional por resolución si es mayor o igual a 300 DPI.
    $costoResolucion = ($resolucion > 300) ? 0.2 * $numFotos : 0;

    // Calculamos el precio total sumando todos los costos.
    $precioTotal = $costoProcesamiento + $costoPaginas + $costoFotos + $costoResolucion;

    return $precioTotal;
}
$color = $_POST['colorOption'] == "color";
$numPages = 4;
$numFotos = 12;
$resolution = intval($_POST['resolution']);
$precioTotal = calcularPrecioAlbum($numPages, $numFotos, $color,$resolution);
?>


<main>
    <h2>Correct Album Print Request!!!</h2>
    <h3>Application details: </h3>
    <p>Name: <?= $_POST["name"] ?></p>
    <p>Album title: <?= $_POST["title"] ?></p>
    <p>Additional text: <?= $_POST["addText"] ?></p>
    <p>Email: <?= $_POST["email"] ?></p>
    <p>Adress: <?= $_POST["direc"] ?> <?= $_POST["number"] ?></p>
    <p>Phone: <?= $_POST["phone"] ?></p>
    <p>Color: <input type="color" id="color" name="color" value="#FF0000" disabled></p>
    <p>Copy number: <?= $_POST["cNumber"] ?></p>
    <p>Resolution: <?= $_POST["resolution"] ?></p>
    <p>User Album: <?= $_POST["userAlbum"] ?></p>
    <p>Date: <?= $_POST["aproxDate"] ?></p>
    <p>Price: <?= $precioTotal?> </p>
</main>

<?php
include 'inc/footer.php';
include 'inc/end.php';
?>