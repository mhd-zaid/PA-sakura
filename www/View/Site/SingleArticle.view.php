<div class="container relative">

	<div class="row flex-row-center body-item">
		<!-- Blog Entries Column (REPEAT THAT) -->
		<?php
		echo "<div class='col-md-8 '>
			<div class='item-article'> ";
		if ($post[0]['Image_Name'] != "UndefinedImage.jpg")	echo "<img class='article-thumbnails' src='/uploads/{$post[0]['Image_Name']}' alt=''>";
		echo "<div class='content-box'> 
			<p><span></span> Posted on {$post[0]['Date_Created']}</p>
			<p>" . $post[0]['Content'] . "</p>
			</div>
			</div>";
		?>
		<div class="item-comment">
			<div class="row">
				<div class="col col-12">
					<div class="row">
						<div class="col">
							<h1>Commentaires</h1>
						</div>
					</div>
					<form action="" method="POST">
						<div class="row">
							<div class="col col-2">
								<p style="margin: 0;">Pseudo</p>
							</div>
							<div class="col col-10">
								<input type="text" id="fname" name="author" placeholder="Saisissez votre pseudo..." style="width: 100%">
							</div>
						</div>
						<div class="row">
							<div class="col col-2">
								<p style="margin: 0;">E-mail</p>
							</div>
							<div class="col col-10">
								<input type="text" id="lcomment" name="email" placeholder="Saisissez votre e-mail..." style="width: 100%">
							</div>
						</div>
						<div class="row">
							<div class="col col-2">
								<p style="margin: 0;">Message</p>
							</div>
							<div class="col col-10">
								<textarea id="lcomment" name="content" class="textarea-comments" cols="30" rows="10" placeholder="Saisissez votre message..." style="width: 100%"></textarea>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<input class="button-comment" name="add-comment" type="submit" value="Envoyer">
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="row">
				<?php foreach ($comments as $comment) {
					echo "<div class='item-singleComment col col-12'>";
					echo "<div class='item-duo'>";
					echo "<div class='initial-avatar' comment-author='{$comment['Author']}'></div>";
					echo "<p class='item-author'> {$comment['Author']} </p>";
					echo "<p class='item-date'> {$comment['Date_Created']} </p>";
					echo "</div><br>";
					echo "<div class='item-content'>";
					echo "<p> {$comment['Content']} </p>";
					echo "</div><br>";
					echo "<form action='' method='POST'>";
					echo "<input class='button-comment' name='signaler-id' type='hidden' value='{$comment['Id']}'>";
					echo "<input class='button-comment' name='signaler-comment' type='submit' value='Signaler'>";
					echo "</form> ";
					echo "</div>";
				}
				?>
			</div>
		</div>
	</div>
</div>