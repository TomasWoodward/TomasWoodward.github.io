
<?php
	if(!empty($_SESSION["userName"])){
		$userName = $_SESSION["userName"];
	} else if(!empty($_COOKIE["userName"])){
		$userName = $_COOKIE["userName"];
	}
	?>

<nav>
	<ul>
		<li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
		<li><a href="index.php?action=userProfile"><i class="fa-solid fa-user"></i><?=$userName?></a></li>
		<li><a href="index.php?action=myAlbums"><i class="fa-solid fa-book"></i>My albums</a></li>
		<li><a href="index.php?action=logOut"><i class="fa-solid fa-right-from-bracket"></i>Log out</a></li>
		<li><a href="index.php?action=search"><i class="fa fa-search"></i> Search</a></li>
		<form action="index.php?action=result" method="post">
			<input type="text" id="search" name="search">
			<input type="submit" value="Search">
		</form>
	</ul>
</nav>