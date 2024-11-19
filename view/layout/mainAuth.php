<main>
    <h2>Latest photos</h2>
    <?php
    $photos = $controllerPhotos->listLastPhotos();
    $countrys = $controllerCountry->getCountries();
    if(isset($photos))
    foreach ($photos as $photo) {
        echo '<figure>';
        echo '<h3>' . $photo['titulo'] . '</h3>';
        echo '<a href="index.php?action=photoDetails&id=' . $photo["idFoto"] . '"> <img src="view/img/users/' . $photo['fichero'] . '" alt="' . $photo['alternativo'] . '"></a>';
        echo '<figcaption>';
        echo '<p>' . $photo['descripcion'] . '</p>';
        echo '<p>Country: ' . $photo['nombre'] . '</p>';
        echo '<p>Fecha: '. $photo['fecha'] . '</p>';
        echo '</figcaption>';
        echo '</figure>';
    }
    ?>
</main>