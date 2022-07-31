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
					<li><a href="/">Home</a></li>
					<li><a href="/#about-us">Qui sommes-nous ?</a></li>
					<li><a href="/#features">Fonctionnalités</a></li>
					<li><a href="/#contact">Contact</a></li>
					<li><a href="/se-connecter">Connexion</a></li>
				</ul>
			</nav>
		</div>
	</header>

	<main>

	<?php require $this->view; ?>

	</main>

	<footer id="site-footer">
		<div class="container">
			<div>
				<div>
					<a href="#"><img src="/Public/img/Front/icon_facebook.svg" alt="icon facebook"></a>
				</div>
				<div>
					<a href="#"><img src="/Public/img/Front/icon_instagram.svg" alt="icon instagram"></a>
				</div>
				<div>
					<a href="#"><img src="/Public/img/Front/icon_twitter.svg" alt="ucin twitter"></a>
				</div>
			</div>
		</div>
	</footer>

</body>
</html>