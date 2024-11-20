<?php
if(!defined('FROM_ROUTER') ){
	header('Location: ../index.php');
}

$resultados = $controllerPhotos->busqueda();

$htmlTitle = 'Search results';
$cssDefault = "indexEstilo";
$cssOscuro = "indexOscuro";
$cssContraste = "indexContraste";
$cssGrande = "indexGrande";
$cssGrandeContraste = "indexHighBig";
$scripts1 = "";
include 'layout/start.php';
include 'layout/header.php';

if ( $_SESSION["AUTH"]) {
    include 'layout/navAuth.php';
    echo '<main>';
    foreach ($resultados as $resultado) {        
        echo '<figure>';
        echo '<h3>' . $resultado['titulo'] . '</h3>';
        echo '<a href="index.php?action=photoDetails&id=' . $resultado["idFoto"] . '"> <img src="view/img/users/' . $resultado['fichero'] . '" alt="' . $resultado['alternativo'] . '"></a>';
        echo '<figcaption>';
        echo '<p>' . $resultado['descripcion'] . '</p>';
        echo '<p>Country: ' . $resultado['nombre'] . '</p>';
        echo '<p>Fecha: ' . $resultado['fecha'] . '</p>';
        echo '</figcaption>';
        echo '</figure>';
    }
    echo '</main>';
} else {
    include 'layout/nav.php';
    echo '<main>';
    foreach ($resultados as $resultado) {        
        echo '<figure>';
        echo '<h3>' . $resultado['titulo'] . '</h3>';
        echo '<img src="view/img/users/' . $resultado['fichero'] . '" alt="' . $resultado['alternativo'] . '">';
        echo '<figcaption>';
        echo '<p>' . $resultado['descripcion'] . '</p>';
        echo '<p>Country: ' . $resultado['nombre'] . '</p>';
        echo '<p>Fecha: ' . $resultado['fecha'] . '</p>';
        echo '</figcaption>';
        echo '</figure>';
    }
    echo '</main>';
}


include 'layout/parametrosBusqueda.php';
include 'layout/footer.php';
include 'layout/end.php';