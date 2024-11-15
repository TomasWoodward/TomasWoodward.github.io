
<?php
	if(!empty($_COOKIE["userName"])){
		$userName = $_COOKIE["userName"];
	} else {
		$userName = "User";

	}
	?>

<nav>
	<ul>
		<li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
		<li><a href="userProfile.php"><i class="fa-solid fa-user"></i><?=$userName?></a></li>
		<li><a href="userProfile.php"><i class="fa-solid fa-book"></i>My albums</a></li>
		<li><a href="logOut.php"><i class="fa-solid fa-right-from-bracket"></i>Log out</a></li>
		<li><a href="search.php"><i class="fa fa-search"></i> Search</a></li>
		<form action="result.php" method="post">
			<input type="text" id="search" name="search">
			<input type="submit" value="Search">
		</form>
	</ul>
</nav>