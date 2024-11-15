<?php
include("inc/comprobarSesion.php");
	
$htmlTitle = 'Create Album';
$cssDefault = "searchStyle";
$cssOscuro = "searchOscuro";
$cssContraste = "searchContraste";
$cssGrande = "searchGrande";
$cssGrandeContraste = "searchHb";
$scripts1 = "";
include 'inc/start.php';
include 'inc/header.php';
include 'inc/navAuth.php';
?>

<main>
	<h2>Create Album</h2>
	<form action="post">
		<label for="search">Title name: </label>
		<input type="text" name="albumTitle">
		
		<label for="search">Description: </label>
		<input type="text" name="description">

		<input type="submit" id="botonSubmit" value="Create">
	</form>
</main>
<?php
include 'inc/footer.php';
include 'inc/end.php';
?>