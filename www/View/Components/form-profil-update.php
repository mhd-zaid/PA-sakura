<form method="<?= $config["config"]["method"]??"GET" ?>" action="<?= $config["config"]["action"]??"" ?>">

	<?php 
		$firstElem=array_slice($config["inputs"], 0, 3);
		$lastElem=array_slice($config["inputs"], 3, 3);
	?>
	<div>
	<h1><b>Modifiez les informations de votre compte</b></h1>
	<?php 	
		foreach ($firstElem as $name => $configInput):?>
		<div>
			<p><?= $configInput["label"] ?>
			<input name="<?= $name ?>" 
					class="<?= $configInput["class"]??"" ?>"
					type="<?= $configInput["type"]??"text" ?>"
					value="<?= $config["profil"][ucfirst($name)] ?>"
					<?php if(!empty($configInput["required"])): ?>
						required="required"
					<?php endif;?>

			></p>
			</div>
	<?php endforeach;?>

	<?php 	
		foreach ($lastElem as $name => $configInput):?>
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

	<input type="submit" class="cta-button btn--pink" value="<?= $config["config"]["submit"]??"Envoyer" ?>">

</form>