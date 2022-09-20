<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Mon titre</title>
	<meta name="description" content="Ceci est ma page">
	<link rel="stylesheet" type="text/css" href="Public/css/main.css">
	<script type="text/javascript" src="Public/js/jquery-3.6.0.min.js"></script>
	<script type="text/javascript" src="Public/js/main.js"></script>
        
</head>
<body>
<nav id="main-nav-back">
	<img src="Public/img/Back/mini-logo.png" alt="logo-site">
	<div class="container">
		<ul>
			<li><img src="Public/img/Back/dashboard-1.svg" alt="Dashboard">Dashboard</li>
			<li><img src="Public/img/Back/page-1.svg" alt="Pages">Pages</li>
			<li><img src="Public/img/Back/article-1.svg" alt="Articles">Articles</li>
			<li><img src="Public/img/Back/media1.svg" alt="Medias">Medias</li>
			<li><img src="Public/img/Back/comments1.svg" alt="Commentaires">Commentaires</li>
			<li><img src="Public/img/Back/navigation-1.svg" alt="Navigation">Navigation</li>
			<li><img src="Public/img/Back/appearance-1.svg" alt="Apparence">Apparence</li>
			<li><img src="Public/img/Back/analytics-1.svg" alt="Statistiques">Statistiques</li>
			<li><img src="Public/img/Back/extension-1.svg" alt="Extension">Extension</li>
            <li><img src="Public/img/Back/settings-1.svg" alt="Paramètres">Paramètres</li>
		</ul>
		<ul>
			<li><img src="Public/img/Back/logout1.svg" alt="Se déconnecter">Se déconnecter</li>
		</ul>
	</div>
</nav>
<!-- <header>
	<div class="container">
		<div>
			<select name="" id=""></select>
			<a href=""></a>
			<button></button>
		</div>
		<div>
			<img src="" alt="">
			<img src="" alt="">
			<select name="" id=""></select>
		</div>
	
	</div>
</header> -->

	

	<main class="container-fluid">

	<?php require $this->view; ?>

	</main>



</body>
</html>