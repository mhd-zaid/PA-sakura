<form method="<?= $config["config"]["method"]??"GET" ?>" action="<?= $config["config"]["action"]??"" ?>">

	<?php 
		$firstElem=array_slice($config["inputs"], 0, 2);
		$lastElem=array_slice($config["inputs"], 2, 4);
	?>
	<div>
	<h1><b>Modifiez les informations de votre compte</b></h1>
	<?php 	
		foreach ($config["inputs"] as $name => $configInput):?>
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
	</div>

	<input type="submit" class="cta-button btn--pink" value="<?= $config["config"]["submit"]??"Envoyer" ?>">

</form>