<form method="<?= $config["config"]["method"]??"GET" ?>" action="<?= $config["config"]["action"]??"" ?>">
	<div>

	<?php 
		$firstElem=array_slice($config["inputs"], 0, 2);
		$lastElem=array_slice($config["inputs"], 2, 4);
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

	<?php 	
		foreach ($lastElem as $name => $configInput):?>
			<p><?= $configInput["label"] ?></p>
			<input name="<?= $name ?>" 
					class="<?= $configInput["class"]??"" ?>"
					type="<?= $configInput["type"]??"text" ?>"

					<?php if(!empty($configInput["required"])): ?>
						required="required"
					<?php endif;?>

			>
	<?php endforeach;?>
	<br>

	<input type="submit" class="cta-button cta-button--pink" value="<?= $config["config"]["submit"]??"Envoyer" ?>">

</form>