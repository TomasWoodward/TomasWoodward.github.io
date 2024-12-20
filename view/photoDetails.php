<?php
if(!defined('FROM_ROUTER') || $_SESSION["AUTH"] == false){
	header('Location: ../index.php');
}

$id = $_GET["id"];
$foto = $controllerPhotos->viewPhoto($id);

$htmlTitle = 'Photo title';
$cssDefault = "photoDetails";
$cssOscuro = "photoDetailsOscuro";
$cssContraste = "photoContraste";
$cssGrande = "photoDetailsGrande";
$cssGrandeContraste = "photoDetailsHb";
$scripts1 = "";
include 'layout/start.php';
include 'layout/header.php';
include 'layout/navAuth.php';

if($foto){
echo'<main>';
echo '<h2>'.$foto['titulo_foto'].'</h2>';
    echo'<figure>';
        echo  "<img src='".$foto['fichero']."' alt='" . $foto['alternativo'] . "'>";
        echo '<figcaption>';
            echo '<p>Descripcion: '.$foto['descripcion'].'</p>';
            echo '<p>Country: '.$foto['nombre_pais'].'</p>';
            echo '<a href="index.php?action=albumDetails&id='.$foto["id_album"].'"><p>Album: '.$foto['titulo_album'].'</p></a>';
            echo '<P>Date: '.$foto['fecha'].'</p>';
            echo '<a href="index.php?action=userDetails&id='.$foto["id_usuario"].'"> <p>User: '.$foto['nombre_usuario'].'</p></a>';
        echo '</figcaption>';
    echo '</figure>';
echo'</main>';
}else{
    echo '<main>';
    echo '<figure>';
    echo '<h2>Photo not found</h2>';
    echo '</figure>';
    echo '</main>'; 
}
include 'layout/footer.php';
include 'layout/end.php';
?>