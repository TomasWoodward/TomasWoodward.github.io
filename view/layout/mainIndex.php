<main>
    <h2>Latest photos</h2>
    <?php 
    $photos = $controllerPhotos->listLastPhotos();

    if(isset($photos))
    foreach ($photos as $photo) {
        echo '<figure>';
        echo '<h3>' . $photo['titulo'] . '</h3>';
        echo  "<img src='".$photo['fichero']."' alt='" . $photo['alternativo'] . "'>";
        echo '<figcaption>';
        echo '<p>' . $photo['descripcion'] . '</p>';
        echo '<p>Country: ' . $photo['nombre'] . '</p>';
        echo '</figcaption>';
        echo '</figure>';
    }
    ?>
</main>