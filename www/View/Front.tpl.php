<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Mon titre</title>
	<meta name="description" content="Ceci est ma page">
	<link rel="stylesheet" type="text/css" href="Public/src/scss/main.css">
</head>
<body>
	<header id="site-header">
		<div class="container">
			<a href="" id="logo-image"><img src="Public/img/Front/Logo.svg" alt="Sakura"></a>
			<nav id="main-nav">
				<ul>
					<li><a href="#">Home</a></li>
					<li><a href="#">Qui sommes-nous ?</a></li>
					<li><a href="#">Fonctionnalités</a></li>
					<li><a href="#">Contact</a></li>
					<li><a href="#">Connexion</a></li>
				</ul>
			</nav>
		</div>
	</header>

	<main>

	<?php require $this->view; ?>

	</main>

	<footer>

	</footer>

</body>
</html>