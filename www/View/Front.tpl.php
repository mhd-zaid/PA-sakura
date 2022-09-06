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
			<a href="/" id="logo-image"><img src="Public/img/Front/Logo.svg" alt="Sakura"></a>
			<nav id="main-nav">
				<ul>
					<li><a href="/#hero">Home</a></li>
					<li><a href="/#about-us">Qui sommes-nous ?</a></li>
					<li><a href="/#features">Fonctionnalités</a></li>
					<li><a href="/#form-contact">Contact</a></li>
					<li><button><a href="/#se-connecter">Connexion</a></button></li>
				</ul>
			</nav>
			<button id="menu-button"></button>
		</div>
	</header>

	<main>

	<?php require $this->view; ?>

	</main>

	<footer id="site-footer">
		<div class="container">
		</div>
	</footer>

</body>
</html>