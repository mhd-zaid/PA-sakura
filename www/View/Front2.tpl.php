<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Mon site</title>
	<meta name="description" content="Ceci est ma page">
	<link rel="stylesheet" href="../Public/dist/main.css">
</head>

<body class="sk-body-front">
	<nav class="sk-navbar">
		<div class="container">
			<div class="row">
				<div>
					<a href="">Sakura CMS</a>
				</div>
				<!--- Catégories à afficher -->
				<div>
					<ul>

						<li><a href="/tableau-de-bord">Admin</a></li> 
					</ul>
				</div>
			</div>
		</div>
	</nav>
	<?php require $this->view; ?>

	<footer>

	</footer>

</body>

</html>