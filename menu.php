<nav class="menu" tabindex="0">
	<div class="smartphone-menu-trigger"></div>
	<header class="avatar">
		<img src="assets/user.png" />
		<h2><?php echo $_SESSION['login']; ?></h2>
	</header>
	<ul>
		<a style="text-decoration: none; color: white;" href="../Front"><li>Accueil</li></a>
		<?php if($_SESSION['role'] == 'admin')
			echo '<a style="text-decoration: none; color: white;" href="./liste_achat.php"><li>Achat</li></a>';
?>
	</ul>
</nav>