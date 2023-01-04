<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<?php if (isset($the_page)) : ?>
		<title><?= $the_page['Title'] ?></title>
		<meta name="description" content="<?= $the_page['Description'] ?>">
	<?php else : ?>
		<?php if (!empty($site)) : ?>
			<title><?= $site[0]['Name'] ?></title>
		<?php else : ?>
			<meta name="description" content="Ceci est ma page">
		<?php endif; ?>
	<?php endif; ?>
	<link rel="stylesheet" href="../Public/css/main.css">
	<?php
	if (
		$_SERVER['REQUEST_URI'] != "/installation" || $_SERVER['REQUEST_URI'] != "/se-connecter" || $_SERVER['REQUEST_URI'] != "/s-inscrire" ||
		$_SERVER['REQUEST_URI'] != "/mot-de-passe-oublie" || $_SERVER['REQUEST_URI'] != "/reinitialisation-mot-de-passe"
	) {
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
	}
	?>
	<script type="text/javascript" src="../Public/js/jquery-3.6.0.min.js"></script>
	<script type="text/javascript" src="../Public/js/site.js"></script>
</head>

<body class="sk-body-front body">
	<?php if (
		$_SERVER['REQUEST_URI'] != "/installation" || $_SERVER['REQUEST_URI'] != "/se-connecter" || $_SERVER['REQUEST_URI'] != "/s-inscrire" ||
		$_SERVER['REQUEST_URI'] != "/mot-de-passe-oublie" || $_SERVER['REQUEST_URI'] != "/reinitialisation-mot-de-passe"
	) : ?>
		<header id="site-header-site" class="header">
			<div class="container">
				<div class="logo-site">
					<?php if (!empty($site)) : ?>
						<a class="site-name nav" href="/"><?= $site[0]['Name'] ?></a>
					<?php endif; ?>
				</div>
				<button id="menu-button-site"></button>
				<nav id="main-nav-site" class="sk-navbar nav">
					<ul>
						<?php
						if (isset($_COOKIE['JWT'])) {
							$userData = $User->getUser($_COOKIE['JWT']);
						}
						if (!empty($menu)) {
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
						}
						echo "<li><div class='col'><a href='/post-list' class='nav'>Blog</a></div></li>";
						if (isset($userData) && ($userData['Role'] == 1 || $userData['Role'] == 0 || $userData['Role'] == 2)) {
							echo "<li><div class='col'><a href='/tableau-de-bord' class='nav'>Admin</a></div></li>";
						}
						?>

					</ul>
				</nav>
			</div>
		</header>
	<?php endif ?>
	<main id="site-main">
		<?php require $this->view; ?>
	</main>
	<div id="flash-section">
		<?php if (isset($_SESSION["flash-success"]) || isset($_SESSION["flash-error"])) {
			if (isset($_SESSION["flash-success"])) {
				$msg = $_SESSION["flash-success"];
				unset($_SESSION["flash-success"]);
				echo ("<div id='flash-msg' class='row flash flash-success' style='width : 100%; position : fixed; bottom : 35px'>");
				echo ("<iconify-icon id='close-flash' icon='system-uicons:cross' style='color: black;' width='20'></iconify-icon>");
				echo ("<p class='center-text plain'>{$msg}</p>");
				echo ("</div>");
			} else {
				$msg = $_SESSION["flash-error"];
				unset($_SESSION["flash-error"]);
				echo ("<div id='flash-msg' class='row flash flash-error' style='width : 100%; position : fixed; bottom : 35px'>");
				echo ("<iconify-icon id='close-flash' icon='system-uicons:cross' style='color: black;' width='20'></iconify-icon>");
				echo ("<p class='center-text plain'>{$msg}</p>");
				echo ("</div>");
			}
		} ?>
	</div>
	<footer class="footer">
		<?php if (!empty($site)) : ?>
			<p class="paragraph copyright"><?= $site[0]['Name'] ?> &copy; <?= date_format(new \DateTime($site[0]['Date_created']), "Y") ?></p>
		<?php endif; ?>
	</footer>

</body>

</html>