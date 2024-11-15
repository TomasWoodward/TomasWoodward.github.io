<?php

session_start();
$users = [
    "user1" => "pass1",
    "user2" => "pass2",
    "user3" => "pass3",
    "user4" => "pass4",
    "user5" => "pass5"
];
if($_COOKIE["password"] != $users[$_COOKIE["userName"]])
if(empty($_SESSION["userName"]) || !array_key_exists($_SESSION["userName"], $users) || $users[$_SESSION["userName"]] !== $_SESSION["password"]){
    header("Location: login.php");
}
    
$htmlTitle = 'Get album';
$cssDefault = "getAlbumStyle";
$cssOscuro = "getAlbumOscuro";
$cssContraste = "getAlbumContraste";
$cssGrande = "getAlbumGrande";
$cssGrandeContraste = "getAlbumHb";
$scripts1 = "<script src='script/tablaAlbum.js'></script>";
include 'inc/start.php';
include 'inc/header.php';
include 'inc/navAuth.php';
?>

<?php
// Variables iniciales
$headers = ["Num pags", "Num fotos", "B/N 150-300 dpi", "B/N 450-900 dpi", "Color 150-300 dpi", "Color 450-900 dpi"];
$minFee = 10;
$rows = [];

// Generar las filas de la tabla en base a las fórmulas ajustadas
for ($i = 1; $i <= 15; $i++) {
    $numPages = $i;
    $numPhotos = $i * 3;

    // Calcular el precio base de las páginas en función de la cantidad
    $pricePerPage = 0;
    if ($numPages <= 4) {
        $pricePerPage = $numPages * 2; // 2€ por página para las primeras 4
    } elseif ($numPages <= 10) {
        $pricePerPage = (4 * 2) + (($numPages - 4) * 1.8); // 2€ para las primeras 4 y 1.8€ para las páginas de 5 a 10
    } else {
        $pricePerPage = (4 * 2) + (6 * 1.8) + (($numPages - 10) * 1.6); // 2€ para las primeras 4, 1.8€ para las siguientes 6, y 1.6€ para el resto
    }

    // Cálculo del precio total por tipo de impresión y resolución
    $price1 = $minFee + $pricePerPage; // B/N, resolución <= 300 dpi
    $price2 = $price1 + $numPhotos * 0.2; // B/N, resolución >= 300 dpi
    $price3 = $price1 + $numPhotos * 0.5; // Color, resolución <= 300 dpi
    $price4 = $price3 + $numPhotos * 0.2; // Color, resolución >= 300 dpi

    // Agregar fila a la tabla
    $rows[] = [
        $numPages,
        $numPhotos,
        number_format($price1, 2) . " €",
        number_format($price2, 2) . " €",
        number_format($price3, 2) . " €",
        number_format($price4, 2) . " €"
    ];
}
?>

<main>
    <aside>
        <h2>Album Print Request</h2>
        <p>Using this option......</p>
        <h3>Rates</h3>
        <table>
            <tr>
                <th>Concept</th>
                <th>Rate</th>
            </tr>

            <tr>
                <td>Processing and shipping cost</td>
                <td>10$</td>
            </tr>

            <tr>
                <td>&lt;5 Pages</td>
                <td>2$ per pages</td>
            </tr>


            <tr>
                <td>between 5 and 10 pages</td>
                <td>1.8$ per page</td>
            </tr>

            <tr>
                <td>>11 pages</td>
                <td>1.6$ per page</td>
            </tr>

            <tr>
                <td>Black & white</td>
                <td>0</td>
            </tr>

            <tr>
                <td>Color</td>
                <td>0.5$ per photo</td>
            </tr>

            <tr>
                <td>Resolution &lt;=300dpi </td>
                <td>0$ per photo</td>
            </tr>

            <tr>
                <td>Resolution >=300dpi </td>
                <td>0.2$ per photo</td>
            </tr>

        </table>
    </aside>


    <form action="getAlbumResponse.php" method="post">

        <h3>Application form</h3>
        <p>LOREM IPSUM</p>
        <p>Fiels with (*) are required</p>


        <p><label for="name">Name: </label>
            <input type="text" id="name" name="name" maxlength="200" required>*
        </p>

        <p><label for="title">Album title: </label>
            <input type="text" id="title" name="title" maxlength="200" required>*
        </p>

        <p><label for="addText">Additional text: </label>
            <textarea id="addText" name="addText" maxlength="4000"></textarea>
        </p>

        <p><label for="email">Email: </label>
            <input type="email" id="email" name="email" maxlength="200" required>*
        </p>

        <p><label for="direc">Direction: </label>
            <input type="text" id="direc" name="direc" maxlength="300" required>

            <label for="number">Nº: </label>
            <input type="number" id="number" name="number" required>

            <label for="PostalCode">CP: </label>
            <input type="text" id="PostalCode" name="PostalCode" pattern="\d{1,5}" maxlength="5" required>

            <label for="city">City: </label>
            <input type="text" id="city" name="city" maxlength="25" required>

            <label for="provinces">Seleccione su provincia:</label>
            <select id="provinces" class="provinces" name="provinces" required>
                <option value="">-- Select a province --</option>
                <option value="alava">Alava</option>
                <option value="albacete">Albacete</option>
                <option value="alicante">Alicante</option>
                <option value="almeria">Almeria</option>
                <option value="asturias">Asturias</option>
                <option value="avila">Avila</option>
                <option value="badajoz">Badajoz</option>
                <option value="barcelona">Barcelona</option>
                <option value="burgos">Burgos</option>
                <option value="caceres">Caceres</option>
                <option value="cadiz">Cadiz</option>
                <option value="cantabria">Cantabria</option>
                <option value="castellon">Castellon</option>
                <option value="ciudad_real">Ciudad Real</option>
                <option value="cordoba">Cordoba</option>
                <option value="cuenca">Cuenca</option>
                <option value="girona">Girona</option>
                <option value="granada">Granada</option>
                <option value="guadalajara">Guadalajara</option>
                <option value="guipuzcoa">Guipúzcoa</option>
                <option value="huelva">Huelva</option>
                <option value="huesca">Huesca</option>
                <option value="illes_balears">Illes Balears</option>
                <option value="jaen">Jaen</option>
                <option value="la_coruna">La Coruña</option>
                <option value="la_rioja">La Rioja</option>
                <option value="las_palmas">Las Palmas</option>
                <option value="leon">Leon</option>
                <option value="lleida">Lleida</option>
                <option value="lugo">Lugo</option>
                <option value="madrid">Madrid</option>
                <option value="malaga">Málaga</option>
                <option value="murcia">Murcia</option>
                <option value="navarra">Navarra</option>
                <option value="ourense">Ourense</option>
                <option value="palencia">Palencia</option>
                <option value="pontevedra">Pontevedra</option>
                <option value="salamanca">Salamanca</option>
                <option value="santa_cruz_de_tenerife">Santa Cruz de Tenerife</option>
                <option value="segovia">Segovia</option>
                <option value="sevilla">Sevilla</option>
                <option value="soria">Soria</option>
                <option value="tarragona">Tarragona</option>
                <option value="teruel">Teruel</option>
                <option value="toledo">Toledo</option>
                <option value="valencia">Valencia</option>
                <option value="valladolid">Valladolid</option>
                <option value="vizcaya">Vizcaya</option>
                <option value="zamora">Zamora</option>
                <option value="zaragoza">Zaragoza</option>
            </select>
            *
        </p>

        <p><label for="phone">Phone: </label>
            <input type="tel" id="phone" name="phone">
        </p>

        <p><label for="color">Color: </label>
            <input type="color" id="color" name="color">
        </p>

        <p><label for="cNumber">Copy number: </label>
            <input type="number" id="cNumber" class="cNumber" name="cNumber" min="1" max="99" value="1">
        </p>

        <p><label for="resolution">Resolution: </label>
            <input type="range" id="resolution" name="resolution" min="150" max="900" step="150" value="150"
                onchange="getValue()">
            <output id="rangeValue">150 DPI</output>
        </p>

        <p><label for="userAlbum">User Album: </label>
            <input type="text" id="userAlbum" name="userAlbum">
        </p>

        <p><label for="aproxDate">Date: </label>
            <input type="date" id="aproxDate" class="aproxDate" name="aproxDate">
        </p>

        <p>
            <input type="radio" name="colorOption" value="color"> Color
            <input type="radio" name="colorOption" value="bn" checked> B/N
        </p>

        <button type="button"
            onclick="document.getElementById('priceTable').style.display = document.getElementById('priceTable').style.display === 'none' ? 'table' : 'none';">
            Show/Hide price table
        </button>

        <table id="priceTable" class="tablaDesplegable" style="display: none;">
            <?php
           
            echo "<tr>";
            foreach ($headers as $header) {
                echo "<th>$header</th>";
            }
            echo "</tr>";
            foreach ($rows as $row) {
                echo "<tr>";
                foreach ($row as $cell) {
                    echo "<td>$cell</td>";
                }
                echo "</tr>";
            }
            
            ?>
        </table>

        <input type="button" id="show" value="Show price table">
        <table id="hiddenBoard">

        </table>

        <input type="submit" value="Request!">
    </form>

</main>

<script>
    function getValue() {
        document.getElementById("rangeValue").value = document.getElementById("resolution").value + " DPI";
    }
</script>

<?php
include 'inc/footer.php';
include 'inc/end.php';
?>