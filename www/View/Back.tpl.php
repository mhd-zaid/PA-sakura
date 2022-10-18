<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" href="Public/css/main.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <script type="text/javascript" src="../Public/js/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="../Public/js/main.js"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.0/iconify-icon.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="../Public/js/dataTable.js"></script>
</head>
<body>
<nav id="main-nav-back">
	<img src="Public/img/Back/mini-logo.png" alt="logo-site">
	<div class="container">
		<ul>
			<li><a href="/home"><img src="Public/img/Back/dashboard-1.svg" alt="Dashboard">Dashboard</a></li>
			<li><a href="/page"><img src="Public/img/Back/page-1.svg" alt="Pages">Pages</a></li>
			<li><a href="/article"><img src="Public/img/Back/article-1.svg" alt="Articles">Articles</a></li>
			<li><a href="/media"><img src="Public/img/Back/media1.svg" alt="Medias">Medias</a></li>
			<li><a href="/commentaire"><img src="Public/img/Back/comments1.svg" alt="Commentaires">Commentaires</a></li>
			<li><a href="/home"><img src="Public/img/Back/navigation-1.svg" alt="Navigation">Navigation</a></li>
			<li><a href="/home"><img src="Public/img/Back/appearance-1.svg" alt="Apparence">Apparence</a></li>
			<li><a href="/home"><img src="Public/img/Back/analytics-1.svg" alt="Statistiques">Statistiques</a></li>
			<li><a href="/home"><img src="Public/img/Back/extension-1.svg" alt="Extension">Extension</a></li>
            <li><a href="/parametres"><img src="Public/img/Back/settings-1.svg" alt="Paramètres">Paramètres</a></li>
		</ul>
		<ul>
			<li><img src="Public/img/Back/logout1.svg" alt="Se déconnecter">Se déconnecter</li>
		</ul>
	</div>
</nav>

<header id="header-back">
    <?php $userData = $User->getUser(null,$_COOKIE['Email']); ?>
    <div class="row">
        <div class="col col-2">
            <a href="#" id="visit" class="cta-button-back  btn-pink"> Visiter le site</a>
        </div>
        <div class="helpLink col col-1">
            <a href="#">Aide</a>
        </div>
        <div class="dropdownMenu col col-3 col-offset-6">
            <img class="photo-profil icon" src="Public\img\Back\avatar.svg" alt="">
            <button class="dropbtnMenu">
                <?= ucfirst($userData['Firstname'])." ".strtoupper($userData['Lastname']); ?>
            </button>
            <div class="dropdownMenu-content" id="myDropdownMenu">
                <a href="#">Paramètre du compte</a>
                <a href="#">Gérer les utilisateurs</a>
                <a href="#">Assistance</a>
                <a href="#">Se déconnecter</a>
            </div>
        </div>
    </div>

</header>

<div id="main-component">

<main class="container-fluid">

<?php require $this->view; ?>

</main>

</div>

<footer></footer>
</body>
</html>