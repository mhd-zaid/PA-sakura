<div class="container relative">

	<div class="row flex-row-center">
		<!-- Blog Entries Column (REPEAT THAT) -->
		<?php
		foreach ($posts as $post) {
			$post['Content'] = substr($post['Content'], 0, 150);
			echo "<div class='col-md-8 '>
			<div class='item-article'> 
			<img src='/uploads/{$post['Image_Name']}' alt=''>
			<div class='content-box'> 
			<h2>
				<a href='#' class='titre'>{$post['Slug']}</a>
			</h2>
			<p class='paragraph'><span></span> Posted on {$post['Date_Created']}</p>
			<p class='paragraph'>{$post['Content']}</p>
			<a href='#'>Read More</a>
			</div>
			</div>
			<hr>
		</div>
		";
		}
		?>

	</div>
</div>