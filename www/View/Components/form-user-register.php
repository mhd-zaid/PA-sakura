<form method="<?= $config["config"]["method"]??"GET" ?>" action="<?= $config["config"]["action"]??"" ?>">
	<div>

	<?php 
		$textElem=array_slice($config["inputs"], 0, 5);
		$radioElem=array_slice($config["inputs"], 5,3);
		$textAreaElem=array_slice($config["inputs"], 8, 2);
	?>
	
	<?php 	
		foreach ($textElem as $name => $configInput):?>
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
		foreach ($radioElem as $name => $configInput):?>
			<p><?= $configInput["label"] ?></p>
			<input name="<?= $configInput["elemName"]??"" ?>"
					class="<?= $configInput["class"]??"" ?>"
					type="<?= $configInput["type"]??"text" ?>"
                    value="<?= $configInput["value"]??"" ?>"

					<?php if(!empty($configInput["required"])): ?>
						required="required"
					<?php endif;?>

			>
	<?php endforeach;?>
	<br>
	
    <?php 	
		foreach ($textAreaElem as $name => $configInput):?>
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

	<input type="submit" class="cta-button btn--pink" value="<?= $config["config"]["submit"]??"Envoyer" ?>">
</form>