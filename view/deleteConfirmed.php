<?php 
if(isset($_POST["pass"]))
{
	$user = $controllerUser->login($_SESSION["userName"],$_POST["pass"]);
	if($user){
		$userid = $controllerUser->getUserId($_SESSION["userName"]) ;
		$controllerUser->deleteAccount($userid);
		if(file_exists("img/users/".$_SESSION["userName"])){
			$files = glob("img/users/".$_SESSION["userName"]."/*");
			foreach($files as $file){
				unlink($file);
			}
			rmdir("img/users/".$_SESSION["userName"]);
		}
		header("Location: index.php?action=index");
		$_SESSION["AUTH"] = false;
		$_SESSION["userName"] = "";
	}else{
		$_SESSION["error"] = "Incorrect Password";
		header("Location: index.php?action=deleteAccount");
	}
}