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
		";
		?>
		<div class="item-comment">
			<h4>Commentaire</h4>
			<form action="" method="POST">
				<label for="fname">Pseudo:</label><br>
				<input type="text" id="fname" name="author"><br>
				<label for="lname">E-mail:</label><br>
				<input type="text" id="lcomment" name="email"><br>
				<label for="lcomment">Your Message:</label><br>
				<input type="textarea" id="lcomment" name="content" class="textarea-comments"><br>
				<input class="button-comment" name="add-comment" type="submit" value="Submit">
			</form>
		</div>
		<?php
		foreach($comments as $comment) {
			echo $comment['Content'];
			echo $comment['Email'];
		}


		?>
	</div>
</div>