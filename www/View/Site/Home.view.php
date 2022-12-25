<div class="container relative">

	<div class="row">
		<!-- Blog Entries Column (REPEAT THAT) -->
		<?php
		foreach ($posts as $post) {
			$post['Content'] = substr($post['Content'], 0, 200);
			echo "<div class='col-md-8'>
			<h2>
				<a href='#' class='slug-preview'>{$post['Slug']}</a>
			</h2>
			<p><span></span> Posted on {$post['Date_Created']}</p>
			<hr>
			<img width='200' src='/uploads/{$post['Image_Name']}' alt=''>
			<hr>
			<p>{$post['Content']}</p>
			<a href='#'>Read More</a>
		</div>";
		}
		?>
		
	</div>
</div>