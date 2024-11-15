<?php

session_start();
$users = [
	"user1" => "pass1",
	"user2" => "pass2",
	"user3" => "pass3",
	"user4" => "pass4",
	"user5" => "pass5"
];

if(empty($_SESSION["userName"]) || !array_key_exists($_SESSION["userName"], $users) || $users[$_SESSION["userName"]] !== $_SESSION["password"]){
	header("Location: login.php");
}
	
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