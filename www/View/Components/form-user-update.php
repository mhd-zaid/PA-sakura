<form method="<?= $config["config"]["method"]??"GET" ?>" action="<?= $config["config"]["action"]??"" ?>">
	<div>
		<?php 
			$radioElem=array_slice($config["inputs"], 0,1);
		?>
	</div>

	<div>
		<p>Editer les droits de <?= $config['user']['Firstname'].' '.$config['user']['Lastname'] ?></p>
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

						<?php 
						if($value["value"]==$config["user"]['Role']){
							echo 'checked';
						}
						?>

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
			<input type="submit" name="update" class="cta-button btn--pink" value="<?= $config["config"]["submit"]??"Envoyer" ?>">
		</div>
		<div class="col">
			<input type="submit" name="delete" class="cta-button btn--pink" value="<?= $config["config"]["delete"]??"Envoyer" ?>">
		</div>
	</div>
</form>