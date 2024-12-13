<main>
    <h2>Latest photos</h2>
    <?php 
    $photos = $controllerPhotos->listLastPhotos();

    if (isset($photos)) {
        foreach ($photos as $photo) {
            echo '<figure>';
            echo '<h3>' . $photo['titulo'] . '</h3>';
            echo  "<img src='" . $photo['fichero'] . "' alt='" . $photo['alternativo'] . "'>";
            echo '<figcaption>';
            echo '<p>' . $photo['descripcion'] . '</p>';
            echo '<p>Country: ' . $photo['nombre'] . '</p>';
            echo '</figcaption>';
            echo '</figure>';
        }
    }


    $txt = __DIR__ . '/recomendations/rec.txt';
    $recomendations = fopen($txt, "r");
    $processed = []; 

    if ($recomendations) {
        while (($line = fgets($recomendations)) !== false) {
            $line = trim($line);
            $values = explode("$", $line);

            if (count($values) === 3) {
                $processed[] = [
                    'id' => (int)$values[0],
                    'author' => $values[1],
                    'desc' => $values[2]
                ];
            }
        }
        fclose($recomendations);

        // Seleccionar una recomendación aleatoria
        if (!empty($processed)) {
            $randomIndex = array_rand($processed);
            $selectedRec = $processed[$randomIndex];

            // Obtener foto correspondiente
            $photo2 = $controllerPhotos->viewPhoto($selectedRec['id']);

            echo '<br>';
            echo '<h2>The photo of the day</h2>';
      

            if ($photo2) {
                echo '<figure>';
                echo '<h3>' . $photo2['titulo'] . '</h3>';
                echo  "<img src='" . $photo2['fichero'] . "' alt='" . $photo2['alternativo'] . "'>";
                echo '<figcaption>';
                echo '<p>Recommended by: ' . $selectedRec['author'] . '</p>';
                echo '<p>Election reason: ' . $selectedRec['desc'] . '</p>';
                echo '</figcaption>';
                echo '</figure>';
            } else {
                echo '<p>No photo available for the selected recommendation.</p>';
            }
        }
    } else {
        echo '<h2>No recommendations available</h2>';
    }



    $txt = __DIR__ . '/recomendations/rec2.txt';
    $recomendations = fopen($txt, "r");
    $processed = []; 

    if ($recomendations) {
        while (($line = fgets($recomendations)) !== false) {
            $line = trim($line);
            $values = explode("$", $line);

            if (count($values) === 3) {
                $processed[] = [
                    'Category' => (int)$values[0],
                    'Material' => $values[1],
                    'Description' => $values[2]
                ];
            }
        }
        fclose($recomendations);

        // Seleccionar una recomendación aleatoria
        if (!empty($processed)) {
            $randomIndex = array_rand($processed);
            $selectedRec = $processed[$randomIndex];


            echo '<br>';
            echo '<h2>Recommendation of the day</h2>';
      

            if ($photo2) {
                echo '<figure>';
                echo '<h3>' . $selectedRec['Category'] . '</h3>';
                echo '<figcaption>';
                echo '<p>Material: ' .$selectedRec['Material'] . '</p>';
                echo '<p>Description: ' . $selectedRec['Description'] . '</p>';
                echo '</figcaption>';
                echo '</figure>';
            } else {
                echo '<p>Error</p>';
            }
        }
    } else {
        echo '<h2>No Recommendation Of The Day available</h2>';
    }
    ?>
</main>
