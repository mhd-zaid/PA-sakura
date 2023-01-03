<div class="container relative">

	<div class="row flex-row-center body-item">
		<!-- Blog Entries Column (REPEAT THAT) -->
		<?php
		foreach ($posts as $post) {
			$post['Content'] = substr($post['Content'], 0, 150);
			echo "<div class='col-md-8 '>
			<div class='item-article row'> 
			<div class='col col-3'>
				<img class='article-thumbnails' src='/uploads/{$post['Image_Name']}' alt=''>
			</div>
			<div class='content-box col col-9'> 
			<h2 class='title'>
				<a href='/post/{$post['Id']}' class='titre'>{$post['Slug']}</a>
			</h2>
			<p class='paragraph'><span></span> Posted on {$post['Date_Created']}</p>
			<p class='paragraph'>" . strip_tags($post['Content']) . "</p>
			<a href='/post/{$post['Id']}' class='paragraph'>Read More</a>
			</div>
			</div>
			<hr>
		</div>
		";
		}
		?>

	</div>
</div>