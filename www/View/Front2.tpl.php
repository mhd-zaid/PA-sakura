<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<?php if (isset($the_page)):?>
		<title><?= $the_page['Title']?></title>
		<meta name="description" content="<?= $the_page['Description']?>">
	<?php else:?>
		<title><?= $site[0]['Name']?></title>
		<meta name="description" content="Ceci est ma page">
	<?php endif;?>
	<link rel="stylesheet" href="../Public/css/main.css">
	<?php

		$theme=new App\Model\Apparence();
		$theme=$theme->select();
		switch($theme["Css"]){
			case "electro" :
				echo('<link rel="stylesheet" href="../Public/css/site-theme-electro.css">');
				break;
			case "music" :
				echo('<link rel="stylesheet" href="../Public/css/site-theme-music.css">');
				break;
			case "sakura" :
				echo('<link rel="stylesheet" href="../Public/css/site-theme-sakura.css">');
				break;
			default :
				echo('<link rel="stylesheet" href="../Public/css/site-theme-x.css">');
				break;
		};
	?>
</head>

<body class="sk-body-front body">
	<header class="header">
		<nav class="sk-navbar nav">
			<div class="container">
				<div class="row">
					<div>
						<a href="/site"><?= $site[0]['Name']?></a>
					</div>
					<!--- Catégories à afficher -->
					<div>
						<ul>
							<?php
							$content=explode( ",", $menu["Content"]);
							foreach ($content as $value) {
								echo('<li>');
								echo('<div class="col"><a href=/page/'. $page->getPageByTitle($value)['Slug'].'>'.$value.'</a></div>');
								echo('</li>');
						}
						?>
						</ul>
					</div>
				</div>
			</div>
		</nav>
	</header>
	
	<?php require $this->view; ?>

	<footer class="footer">

	</footer>

</body>

</html>