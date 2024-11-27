<?php 
if(isset($_POST["pass"]))
{
	$user = $controllerUser->login($_SESSION["userName"],$_POST["pass"]);
	if($user){
		$userid = $controllerUser->getUserId($_SESSION["userName"]) ;
		$controllerUser->deleteAccount($userid);
		header("Location: index.php?action=logOut");
	}else{
		$_SESSION["error"] = "Incorrect Password";
		header("Location: index.php?action=deleteAccount");
	}
}