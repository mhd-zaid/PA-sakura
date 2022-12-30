<div class="container relative">

	<div class="row flex-row-center">
		<!-- Blog Entries Column (REPEAT THAT) -->
		<?php
		foreach ($posts as $post) {
			$post['Content'] = substr($post['Content'], 0, 150);
			echo "<div class='col-md-8 '>
			<div class='item-article row'> 
			<img class='col col-3' src='/uploads/{$post['Image_Name']}' alt='' style='padding: 0'>
			<div class='content-box col col-9'> 
			<h2 class='title'>
				<a href='/post/{$post['Id']}' class='titre'>{$post['Slug']}</a>
			</h2>
			<p class='paragraph'><span></span> Posted on {$post['Date_Created']}</p>
			<p class='paragraph'>" . strip_tags($post['Content']) . "</p>
			<a href='#' class='paragraph'>Read More</a>
			</div>
			</div>
			<hr>
		</div>
		";
		}
		?>

	</div>
</div>