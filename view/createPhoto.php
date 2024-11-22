<?php
if(!defined('FROM_ROUTER') ||  $_SESSION["AUTH"]==false ){
	header('Location: ../index.php');
}
$countrys = $controllerCountry->getCountries();
$htmlTitle = 'Add Photo';
$cssDefault = "searchStyle";
$cssOscuro = "searchOscuro";
$cssContraste = "searchContraste";
$cssGrande = "searchGrande";
$cssGrandeContraste = "searchHb";
$scripts1 = "";
include "layout/start.php";
include 'layout/header.php';
include 'layout/navAuth.php';
$countrys = $controllerCountry->getCountries();
$albums =  $controllerUser->getAlbums($_SESSION["userName"]);
?>
<main>
	<h2><?=$htmlTitle?></h2>
	<form action="">
		<label for="title">Title</label>
		<input type="text" id="title" name="title" required>

		<label for="description">Description</label>
		<textarea id="description" name="description" required></textarea>

		<label for="date">Date</label>
		<input type="date" id="date" name="date" required>

		<label for="country">Country</label>
		<select id="country" name="country" required>

			<option value="">Select a country</option>
			<?php
			foreach ($countrys as $country) {
				echo "<option value='".$country['id']."'>".$country['name']."</option>";
			}
			?>
		</select>
		<label for="image">Image</label>
		<input type="file" id="image" name="image" required>

		<label for="alt">Alt</label>
		<input type="text" id="alt" name="alt" required>

		
		<label for="album">Album</label>
		<select id="album" name="album" required>
			<option value="">Select an album</option>
			<?php
			foreach ($albums as $album) {
				if ($album["idAlbum"] == $_GET["id"]) 
				echo "<option value='".$album['id']."' selected>".$album['titulo']."</option>";
				else
				echo "<option value='".$album['id']."'>".$album['titulo']."</option>";
			}
			?>
		</select>
		<input type="submit" value="Add">
	</form>
</main>


<?php
include 'layout/footer.php';
include 'layout/end.php';
?>
