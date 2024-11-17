<aside class="parametrosBusqueda">
	<h3>Search parameters</h3>
	<?php if (!empty($_POST["searchTitle"])) { ?>
		<p>Title = <?php echo htmlspecialchars($_POST["searchTitle"]); ?></p>
		<p>Date = <?php echo htmlspecialchars($_POST["searchDate"] ?? ''); ?></p>
		<p>Country = <?php echo htmlspecialchars($_POST["searchCountry"] ?? ''); ?></p>
	<?php } else { ?>
		<p>Title = <?php echo htmlspecialchars($_POST["search"] ?? ''); ?></p>
	<?php } ?>
</aside>