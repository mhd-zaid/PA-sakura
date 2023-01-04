<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<?php if (isset($the_page)) : ?>
		<title><?= $the_page['Title'] ?></title>
		<meta name="description" content="<?= $the_page['Description'] ?>">
	<?php else : ?>
		<title><?= $site[0]['Name'] ?></title>
		<meta name="description" content="Ceci est ma page">
	<?php endif; ?>
	<link rel="stylesheet" href="../Public/css/main.css">
	<?php

	$theme = new App\Model\Apparence();
	$theme = $theme->select();
	switch ($theme["Css"]) {
		case "electro":
			echo ('<link rel="stylesheet" href="../Public/css/site-theme-electro.css">');
			break;
		case "music":
			echo ('<link rel="stylesheet" href="../Public/css/site-theme-music.css">');
			break;
		case "sakura":
			echo ('<link rel="stylesheet" href="../Public/css/site-theme-sakura.css">');
			break;
		default:
			echo ('<link rel="stylesheet" href="../Public/css/site-theme-x.css">');
			break;
	};
	?>
	<script type="text/javascript" src="../Public/js/jquery-3.6.0.min.js"></script>
	<script type="text/javascript" src="../Public/js/site.js"></script>
</head>

<body class="sk-body-front body">
	<header id="site-header-site" class="header">
		<div class="container">
			<div class="logo-site">
				<a class="site-name nav" href="/site"><?= $site[0]['Name'] ?></a>
			</div>
			<!--- Catégories à afficher -->
			<div>
				<ul>
					<?php
					$content = explode(",", $menu["Content"]);
					foreach ($content as $value) {
						echo ('<li>');
						echo ('<div class="col"><a href=/page/');
						if ($page->findRewriteUrl() > 0) {
							echo $page->getPageByTitle($value)['Id'];
						} else {
							echo $page->getPageByTitle($value)['Slug'];
						}
						echo ('>' . $value . '</a></div>');
						echo ('</li>');
					}
					?>
				</ul>
			</div>
		</div>
		</div>
		<button id="menu-button-site"></button>
		<nav id="main-nav-site" class="sk-navbar nav">
			<ul>
				<?php
				$content = explode(",", $menu["Content"]);
				foreach ($content as $value) {
					echo ('<li>');
					echo ('<div class="col"><a href=/page/' . $page->getPageByTitle($value)['Slug'] . '>' . $value . '</a></div>');
					echo ('</li>');
				}
				?>
			</ul>
		</nav>
		</div>
	</header>

	<main>
		<?php require $this->view; ?>
		<!-- TODO : Régler affichage session flash
	-->
		<?php if (isset($_SESSION["flash-success"]) || isset($_SESSION["flash-error"])) {
			if (isset($_SESSION["flash-success"])) {
				$msg = $_SESSION["flash-success"];
				unset($_SESSION["flash-success"]);
				echo ("<div id='flash-msg' class='row flash flash-success'>");
				echo ("<iconify-icon id='close-flash' icon='system-uicons:cross' style='color: black;' width='20'></iconify-icon>");
				echo ("<p class='center-text plain'>{$msg}</p>");
				echo ("</div>");
			} else {
				$msg = $_SESSION["flash-error"];
				unset($_SESSION["flash-error"]);
				echo ("<div id='flash-msg' class='row flash flash-error'>");
				echo ("<iconify-icon id='close-flash' icon='system-uicons:cross' style='color: black;' width='20'></iconify-icon>");
				echo ("<p class='center-text plain'>{$msg}</p>");
				echo ("</div>");
			}
		} ?>
	</main>
	<footer class="footer">
		<p class="paragraph copyright"><?= $site[0]['Name'] ?> &copy; <?= date_format(new \DateTime($site[0]['Date_created']), "Y") ?></p>
	</footer>

</body>

</html>