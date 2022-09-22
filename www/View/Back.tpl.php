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

<header id="header-back">

	<div class="row">
        <div class="dropdownSite col col-2">
            <button class="dropbtnSite"> Mes sites
            </button>
            <div class="dropdownSite-content" id="myDropdownSite">
                <a href="#">Site 1</a>
                <a href="#">Site 2</a>
            </div>
        </div>
        <div class="helpLink col col-1">
            <a href="#">Aide</a>
        </div>
        <div class="newSiteLink col col-6">
        <a href="#" class="cta-button-back  btn-pink">Nouveau site</a>
        </div>
        <div class="notificationLink col col-1">
            <a href="">
                <img class="icon" src="Public/img/Back/notification1.svg" alt="">
            </a>
        </div>
        <div class="dropdownMenu col col-2">
            <img id="photo-profil" class="icon" src="Public\img\Back\avatar.svg" alt="">
            <button class="dropbtnMenu"> Daniel Casanova
            </button>
            <div class="dropdownMenu-content" id="myDropdownMenu">
                <a href="#">Paramètre du compte</a>
                <a href="#">Assistance</a>
                <a href="#">Centre de messagerie</a>
                <a href="#">Créer un nouveau site</a>
                <a href="#">Se déconnecter</a>
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