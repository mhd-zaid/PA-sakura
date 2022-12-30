<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Mon site</title>
	<meta name="description" content="Ceci est ma page">
	<link rel="stylesheet" href="../Public/css/main.css">
</head>

<body class="sk-body-front body">
	<header class="header">
		<nav class="sk-navbar nav">
			<div class="container">
				<div class="row">
					<div>
						<a href="/site">Sakura CMS</a>
					</div>
					<!--- Catégories à afficher -->
					<div>
						<ul>
							<?php
							$content=explode( ",", $menu["Content"]);
							foreach ($content as $value) {
								echo('<li>');
								echo('<div class="col"><a href=/site/'. $page->getPageByTitle($value)['Slug'].'>'.$value.'</a></div>');
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