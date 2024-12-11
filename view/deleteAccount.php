<?php
if (!defined('FROM_ROUTER') || !$_SESSION["AUTH"]) {
	header('Location: ../index.php');
}

// Variables para HTML y CSS
$htmlTitle = 'Delete Account';
$cssDefault = "searchStyle";
$cssOscuro = "searchOscuro";
$cssContraste = "searchContraste";
$cssGrande = "searchGrande";
$cssGrandeContraste = "searchHb";
$scripts1 = "";

// Inclusión de archivos comunes
include 'layout/start.php';
include 'layout/header.php';
include 'layout/navAuth.php';


$userId = $controllerUser->getUserId($_SESSION["userName"]);
$dataUser = $controllerPhotos->getAllData($userId);
?>
<main>
	<h2>Are you sure?</h2>
	<?php
	if(isset($dataUser) && !empty($dataUser)) {
		foreach ($dataUser as $data) {
			echo "<h3>" . $data["AlbumTitulo"] . "</h3>";
			echo "<p>Description: " . $data["AlbumDescripcion"] . "</p>";
			echo "<p>Total photos in this album: " . $data["NumeroFotosAlbum"] . "</p>";
		}
		echo "User total photos: " . $dataUser[0]["NumeroTotalFotosUsuario"];
	}
	?>

	<form action="index.php?action=deleteConfirmed" method="post">
		<?php
		if (isset($_SESSION["error"]))
			echo "<p>" . $_SESSION["error"] . "</p>";
		?>
		<label for="pass">Introduce tu contraseña</label>
		<input type="password" name="pass" id="pass">
		<input type="submit">
	</form>
</main>

<?php
// Inclusión de pie de página y cierre
include 'layout/footer.php';
include 'layout/end.php';
?>