<div class="container relative">
    <div class="row flex-row-center body-item">
        <form action="" method="POST" class="col col-md-8" style="margin-bottom: 25px;">
            <select name="category-filter" id="select-category" class="col col-9" type=submit>
                <option value=""></option>
                <?php foreach ($categories as $category) : ?>
                    <option value="<?= $category['Title'] ?>"><?= $category['Title'] ?></option>
                <?php endforeach; ?>
            </select>
            <input type="submit" class="col col-2">
        </form>
        <?php
        foreach ($posts as $post) {
            $post['Content'] = substr($post['Content'], 0, 150);
            echo "<div class='col-md-8 '>
			<div class='item-article row'> 
			<div class='col col-3 col-sm-12 col-md-12'>";
            if (empty($post['Image_Name'])) {
                echo "<img class='article-thumbnails' src='/uploads/UndefinedImage.jpg' alt=''>";
            } else {
                echo "<img class='article-thumbnails' src='/uploads/{$post['Image_Name']}' alt=''>";
            }
            echo "</div>
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