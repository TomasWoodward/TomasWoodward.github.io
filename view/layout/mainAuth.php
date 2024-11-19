<main>
    <h2>Latest photos</h2>
    <?php
    if(isset($photos))
    foreach ($photos as $photo) {
        echo '<figure>';
        echo '<a href="index.php?action=photoDetails?id=4>';
        echo '<h3>' . $photo['titulo'] . '</h3>';
        echo '</a>';
        echo '<a href="index.php?action=photoDetails?id=4"> <img src="view/img/users/' . $photo['fichero'] . '" alt="' . $photo['alternativo'] . '"></a>';
        echo '<figcaption>';
        echo '<p>' . $photo['descripcion'] . '</p>';
        echo '<p>Country: ' . $photo['nombre'] . '</p>';
        echo '</figcaption>';
        echo '</figure>';
    }
    ?>
</main>