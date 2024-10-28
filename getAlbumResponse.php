<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get albulm response</title>
    <link rel="stylesheet" href="css/default/global.css" media="screen">
    <link rel="stylesheet" href="css/default/albumResult.css">
    <link rel="alternate stylesheet" href="css/darkTheme/albumResultOscuro.css" title="dark theme">
    <link rel="alternate stylesheet" href="css/highContrast/albumResultContraste.css" title="high Contrast">
    <link rel="alternate stylesheet" href="css/textoGrande/albumResultGrande.css" title="big font">
    <link rel="alternate stylesheet" title="big Font + high contrast" href="css/highBig/albumResultHb.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>

<body>

<?php
    $htmlTitle = 'Get Album Response';
    include 'inc/start.php';
    include 'inc/header.php';
    include 'inc/nav.php';
?>
    <!-- <header>
        <a href="index.html"><img src="img/system/Logo.png" alt="">
        <h1>PI-Pictures &amp; Images</h1></a>
    </header>

    <nav>
        <ul>
			<li><a href="index.html"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="userProfile.html"><i class="fa-solid fa-user"></i>User Name</a></li>
            <li><a href="userProfile.html"><i class="fa-solid fa-book"></i>My albums</a></li>
			<li><a href="index.html"><i class="fa-solid fa-right-from-bracket"></i>Log out</a></li>
            <li><a href="search.html"><i class="fa fa-search"></i> Search</a></li>
            <form action="result.html" method="get">
                <input type="text" id="search" name="search">
               <input type="submit" value="Search">
           </form>
        </ul>
    </nav> -->

    <main >
        <h2>Correct Album Print Request!!!</h2>
		<h3>Application details: </h3>
		<p>Name: <?=$_POST["name"]?></p>
		<p>Album title: <?=$_POST["title"]?></p>
		<p>Additional text:<?=$_POST["addText"]?></p>
		<p>Email: ev@gmail.com</p>
		<p>Adress: C/ Salamanca n4 3z 03610 Alicante España</p>
		<p>Phone: 98383413</p>
		<p>Color: <input type="color" id="color" name="color" value="#FF0000" disabled></p>
		<p>Copy number: 23</p>
		<p>Resolution: 150 DPI</p>
		<p>User Album: Evaristo</p>
		<p>Date: 07/10/2024</p>
		<p>Price: 15$</p>
    </main>

    <?php
    include 'inc/footer.php';
    include 'inc/end.php';
    ?>
    <!-- <footer  data-url="htpps://dawua.free.nf/">
        <p><a href="https://creativecommons.org/licenses/">&copy;</a> Develop by Tomas Woodward Marin y Alex Valdelvira Muñoz 2024. All rights reserved </p>
        <p><a href="accesibility.html">Accesibility statements</a></p>
    </footer>
</body>
</html> -->