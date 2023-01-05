<form method="<?= $config["config"]["method"]??"GET" ?>" action="<?= $config["config"]["action"]??"" ?>">
	<div>

	<?php 
		$textElem=array_slice($config["inputs"], 0, 5);
		$radioElem=array_slice($config["inputs"], 5,1);
	?>
	
	<?php 	
		foreach ($textElem as $name => $configInput):?>
		<div class="row">
			<div class="col col-3">
			<p><?= $configInput["label"] ?></p>
			</div>
			<div class="col">
			<input name="<?= $name ?>" 
					class="<?= $configInput["class"]??"" ?>"
					type="<?= $configInput["type"]??"text" ?>"

					<?php if(!empty($configInput["required"])): ?>
						required="required"
					<?php endif;?>

			>
					</div>
		</div>
	<?php endforeach;?>
	</div>
	
	<?php 	
		foreach ($radioElem as $name => $configInput):?>
		<?php foreach ($configInput as $key => $value):?>
		<div class="row flex-row flex-row-align-center">
			<div class="col">
				<input name="<?= $value["elemName"]??"" ?>"
						class="<?= $value["class"]??"" ?>"
						type="<?= $value["type"]??"text" ?>"
						value="<?= $value["value"]??"" ?>"

						<?php if(!empty($value["required"])): ?>
							required="required"
						<?php endif;?>

				>
			</div>
			<div class="col">
				<p><?= $value["label"] ?></p>
			</div>
		</div>
	<?php endforeach;?>
	<?php endforeach;?>

	<div class="row">
		<div class="col">
			<input type="submit" class="cta-button btn--pink" value="<?= $config["config"]["submit"]??"Envoyer" ?>">
		</div>
	</div>
</form>