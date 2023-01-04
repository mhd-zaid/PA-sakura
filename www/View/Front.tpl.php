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
	<header id="site-header">
		<div class="container">
			<div class="logo-site">
				<a href="/" id="logo-image"><img src="Public/img/Front/Logo.svg" alt="Sakura"></a>
			</div>
			<button id="menu-button"></button>
			<nav id="main-nav">
				<ul>
					<li><a href="/#hero">Home</a></li>
					<li><a href="#about-us">Qui sommes-nous ?</a></li>
					<li><a href="/#features">Fonctionnalités</a></li>
				</ul>
			</nav>
		</div>
	</header>

	<main id="main-front">

	<?php require $this->view; ?>

	</main>
	<?php if(isset($_SESSION["flash-success"]) || isset($_SESSION["flash-error"])){
            if(isset($_SESSION["flash-success"])){
                $msg=$_SESSION["flash-success"];
                unset($_SESSION["flash-success"]);
                echo("<div id='flash-msg' class='row flash flash-success'>");
                echo("<iconify-icon id='close-flash' icon='system-uicons:cross' style='color: black;' width='20'></iconify-icon>");
                echo("<p class='center-text plain'>{$msg}</p>");
                echo("</div>");
            }else{
                $msg=$_SESSION["flash-error"];
                unset($_SESSION["flash-error"]);
                echo("<div id='flash-msg' class='row flash flash-error'>");
                echo("<iconify-icon id='close-flash' icon='system-uicons:cross' style='color: black;' width='20'></iconify-icon>");
                echo("<p class='center-text plain'>{$msg}</p>");
                echo("</div>");
            }
        }?>
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
				</nav>
			<p class="copyright">Sakura © 2022</p>
			</div>
			
	</footer>

</body>
</html>