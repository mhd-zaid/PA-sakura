<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Mon titre</title>
	<meta name="description" content="Ceci est ma page">
	<link rel="stylesheet" type="text/css" href="Public/css/main.css">
</head>
<body>
	<header id="site-header">
		<div class="container">
			<a href="/" id="logo-image"><img src="Public/img/Front/Logo.svg" alt="Sakura"></a>
			<nav id="main-nav">
				<ul>
					<li><a href="/#hero">Home</a></li>
					<li><a href="#about-us">Qui sommes-nous ?</a></li>
					<li><a href="/#features">Fonctionnalités</a></li>
					<li><a href="/#section-contact">Contact</a></li>
					<li><button><a href="/se-connecter">Connexion</a></button></li>
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
				<div>
					<div>
						<a href="https://facebook.com" target="_blank"><img src="../Public/img/Front/icon_facebook.svg" alt=""></a>
					</div>
					<div>
						<a href="https://instagram.com" target="_blank"><img src="../Public/img/Front/icon_instagram.svg" alt=""></a>
					</div>
					<div>
						<a href="https://twitter.com" target="_blank"><img src="../Public/img/Front/icon_twitter.svg" alt=""></a>
					</div>
				</div>
				<nav>
						<p><a href="/#hero">Home</a></p>
						<p><a href="/#about-us">Qui sommes-nous ?</a></p>
						<p><a href="/#features">Fonctionnalités</a></p>
						<p><a href="/#form-contact">Contact</a></p>
						<p><a href="#">Mentions légales</a></p>
				</nav>
			<p class="copyright">Sakura © 2022</p>
			</div>
			
	</footer>

</body>
</html>