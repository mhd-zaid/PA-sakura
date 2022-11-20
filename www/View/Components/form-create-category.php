<form method="<?= $config["config"]["method"]??"GET" ?>" action="<?= $config["config"]["action"]??"" ?>">

	<?php 
		$firstElem=array_slice($config["inputs"], 0, 1);
	?>
	<div>
	<?php 	
		foreach ($firstElem as $name => $configInput):?>
		<div>
			<p><?= $configInput["label"] ?>
			<input name="<?= $name ?>" 
					class=""
					type="<?= $configInput["type"]??"text" ?>"
					value="<?= !empty($config['category']) ? $config['category']['Titre'] : '' ?>"
					<?php if(!empty($configInput["required"])): ?>
						required="required"
					<?php endif;?>

			></p>
			</div>
	<?php endforeach;?>   
	</div>

	<input type="submit" class="cta-button btn--pink" name="submit" value="<?= 'Ajouter' ?>">
	<?php if(!empty($config['category'])): ?>
	<input type="submit" class="cta-button btn--pink" name="delete" value="<?= 'Supprimer' ?>">
	<?php endif; ?>

</form>