<main>
    <h2>Latest photos</h2>
    <?php 
    if(isset($photos))
    foreach ($photos as $photo) {
        echo '<figure>';
        echo '<h3>' . $photo['titulo'] . '</h3>';
        echo '<img src="view/img/users/' . $photo['fichero'] . '" alt="' . $photo['alternativo'] . '">';
        echo '<figcaption>';
        echo '<p>' . $photo['descripcion'] . '</p>';
        echo '<p>Country: ' . $photo['nombre'] . '</p>';
        echo '</figcaption>';
        echo '</figure>';
    }
    ?>
    <!-- <figure>
    
            <h3>Photo title</h3>
       
        <img src="view/img/users/photo1.png" alt="Photo1">
        <figcaption>
            <p>Aqui en la playa pasandolo bien con los colegas</p>
            <p>Photo by: User</p>
        </figcaption>
    </figure>

    <figure>
       
            <h3>Photo title</h3>
   
        <img src="view/img/users/photo2.png" alt="Photo2">
        <figcaption>
            <p>Mi nuevo porche caiman de 300cv y 1000kg de peso</p>
            <p>Photo by: User</p>
        </figcaption>
    </figure>

    <figure>
       
            <h3>Photo title</h3>
     
       <img src="view/img/users/photo3.png" alt="Photo3">
        <figcaption>
            <p>Mi nuevo porche caiman de 300cv y 1000kg de peso</p>
            <p>Photo by: User</p>
        </figcaption>
    </figure>

    <figure>
       
            <h3>Photo title</h3>
       
       <img src="view/img/users/photo4.png" alt="Photo4">
        <figcaption>
            <p>Prueba de descripcion para la practica 1 de diseño de aplicaciones web</p>
            <p>Photo by: User</p>
        </figcaption>
    </figure>

    <figure>
       
            <h3>Photo title</h3>
      
      <img src="view/img/users/photo5.png" alt="Photo5">
        <figcaption>
            <p>Ultima descripcion para verificar que todo se ve correctamente </p>
            <p>Photo by: User</p>
        </figcaption>
    </figure> -->
</main>