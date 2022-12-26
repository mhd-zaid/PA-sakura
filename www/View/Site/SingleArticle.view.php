<div class="container relative">

	<div class="row flex-row-center">
		<!-- Blog Entries Column (REPEAT THAT) -->
		<?php
			echo "<div class='col-md-8 '>
			<div class='item-article'> 
			<img src='/uploads/{$post[0]['Image_Name']}' alt=''>
			<div class='content-box'> 
			<p class='paragraph'><span></span> Posted on {$post[0]['Date_Created']}</p>
			<p class='paragraph'>{$post[0]['Content']}</p>
			</div>
			</div>
			<hr>
		</div>
		";

		?>

	</div>
</div>