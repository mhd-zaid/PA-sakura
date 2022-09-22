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
<body id="body-back">
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

<div id="main-component">

<header id="header-back1">

	<div class="row">
        <div class="col col-4">
            <ul>
				<li class="menu-deroulant">  <a href=""> Mes sites </a> <img id="icon-profil" class="icon" src="Public\img\Back\arrowDown1.svg" alt=""></li>
					<ul>
						<li class="sous-menu"> <a href=""> Site numéro 1 </a></li>
						<li class="sous-menu"> <a href=""> Site numéro 2 </a></li>
					</ul>
			</ul>
        </div>
        <div class="col col-5">
            <p>Aide</p>
            <a href="#" class="cta-button-back  btn-pink">Nouveau site</a>
        </div>
        <div class="col col-1">
            <img class="icon" src="Public/img/Back/notification1.svg" alt="">
        </div>
        <div class="dropdown" class="col col-2">
            <div class="dropdownMenu">
                <img id="photo-profil" class="icon" src="Public\img\Back\avatar.svg" alt="">
                <button class="dropbtn">Toto Tutu
                    <img id="icon-profil" class="icon" src="Public\img\Back\arrowDown1.svg" alt="">
                </button>
                <div class="dropdownMenu-content" id="myDropdownMenu">
                    <a href="#">Link 1</a>
                    <a href="#">Link 2</a>
                    <a href="#">Link 3</a>
                </div>
            </div>
        </div>
	</div>

</header>

<main class="container-fluid">

<?php require $this->view; ?>

</main>

</div>
</body>
</html>