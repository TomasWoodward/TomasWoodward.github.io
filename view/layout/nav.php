<nav>
    <ul>
        <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="index.php?action=login"><i class="fa fa-sign-in-alt"></i> Log In</a></li>
        <li><a href="index.php?action=register"><i class="fa fa-user-plus"></i> Create account</a></li>
        <li><a href="index.php?action=search"><i class="fa fa-search"></i> Search</a></li>
        <form action="index.php?action=result" method="post">
            <label for="searchTitle">Title: </label>
            <input type="text" id="searchTitle" name="searchTitle">
            <input type="submit" value="Search">
        </form>
    </ul>
</nav>