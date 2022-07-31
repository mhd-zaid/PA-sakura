<form method="<?= $config["config"]["method"]??"GET" ?>" action="<?= $config["config"]["action"]??"" ?>">

	<?php 
		$firstElem=array_slice($config["inputs"], 0, 1);
		$lastElem=array_slice($config["inputs"], 2, 3);
	?>
	<?php foreach (firstElem as $name => $configInput):?>
		<p><?= $configInput["label"] ?></p>
		<input name="<?= $name ?>" 
				class="<?= $configInput["class"]??"" ?>"
				type="<?= $configInput["type"]??"text" ?>"

				<?php if(!empty($configInput["required"])): ?>
					required="required"
				<?php endif;?>

			><br>
	<?php endforeach;?>
</form>