<?php
    echo '<figure>';
    echo '<h2>Album: ' . htmlspecialchars($photos[0]['albumTitulo'], ENT_QUOTES, 'UTF-8') . '</h2>';
    echo '<p>'.htmlspecialchars($photos[0]["descripcion_album"]) .'</p>';
    echo '<p>Total: ' . (empty($photos[0]["total_fotos"]) ? "0" : $photos[0]["total_fotos"]) . '</p>';
    if (!empty($photos[0]['inicio_intervalo'])){
    echo '<p>From: ' . $photos[0]['inicio_intervalo'] . ' to ' . $photos[0]['fin_intervalo'] . '</p>';
    echo '</figure>';
    foreach($photos as $photo){
        echo '<figure>';
        echo '<h3>' . $photo['fotoTitulo'] . '</h3>';
        echo '<img src="view/img/users/' . $photo['fotoFichero'] . '" alt="' . $photo['fotoAlternativo'] . '">';
        echo '<figcaption>';
        echo '<p>' . $photo['fotoDescripcion'] . '</p>';
        echo '<p>Country: ' . $photo['fotoPais'] . '</p>';
        echo '<p>Fecha: ' . $photo['fotoFecha'] . '</p>';
        echo '</figcaption>';
        echo '</figure>';
    }
}
