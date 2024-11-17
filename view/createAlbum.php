<?php
if(!defined('FROM_ROUTER') ||  $_SESSION["AUTH"]==false ){
	header('Location: ../index.php');
}

$htmlTitle = 'Create Album';
$cssDefault = "searchStyle";
$cssOscuro = "searchOscuro";
$cssContraste = "searchContraste";
$cssGrande = "searchGrande";
$cssGrandeContraste = "searchHb";
$scripts1 = "";
include 'layout/start.php';
include 'layout/header.php';
include 'layout/navAuth.php';
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
include 'layout/footer.php';
include 'layout/end.php';
?>