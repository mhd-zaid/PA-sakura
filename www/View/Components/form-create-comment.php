<form method="<?= $config["config"]["method"]??"GET" ?>" action="<?= $config["config"]["action"]??"" ?>">
	<div>

	<?php 
		$firstElem=array_slice($config["inputs"], 0, 3);
	?>
	
	<?php 	
		foreach ($firstElem as $name => $configInput):?>
		<div>
			<p><?= $configInput["label"] ?>
			<input name="<?= $name ?>" 
					class="<?= $configInput["class"]??"" ?>"
					type="<?= $configInput["type"]??"text" ?>"

					<?php if(!empty($configInput["required"])): ?>
						required="required"
					<?php endif;?>

			></p>
			</div>
	<?php endforeach;?>
	</div>
	<br>

	<input type="submit" class="cta-button btn--pink" name="submit" value="<?='Ajouter' ?>">

</form>