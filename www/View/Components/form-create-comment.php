<form method="<?= $config["config"]["method"] ?? "GET" ?>" action="<?= $config["config"]["action"] ?? "" ?>">
	<?php
	$firstElem = array_slice($config["inputs"], 0, 2);
	$secondElem = array_slice($config["inputs"], 2, 3);
	?>

	<?php foreach ($firstElem as $name => $configInput) : ?>
		<div class="row">
			<div class="col col-2 col-sm-12">
				<p style="margin: 0;"><?= $configInput["label"] ?></p>
			</div>
			<div class="col col-10 col-sm-12">
				<input name="<?= $name ?>" class="<?= $configInput["class"] ?? "" ?>" type="<?= $configInput["type"] ?? "text" ?>" <?php if (!empty($configInput["required"])) : ?> required="required" <?php endif; ?>>
			</div>
		</div>
	<?php endforeach; ?>
	<?php foreach ($secondElem as $name => $configInput) : ?>
		<div class="row">
			<div class="col col-2 col-sm-12">
				<p style="margin: 0;"><?= $configInput["label"] ?></p>
			</div>
			<div class="col col-10 col-sm-12">
				<textarea name="<?= $name ?>" class="col col-10 <?= $configInput["class"] ?? "" ?>" cols="30" rows="10"></textarea>
			</div>
		</div>
	<?php endforeach; ?>
	</div>
	<br>

	<input type="submit" class="cta-button btn--pink" name="submit" value="<?= 'Ajouter' ?>">
</form>