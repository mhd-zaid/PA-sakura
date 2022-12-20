<form method="<?= $config["config"]["method"]??"GET" ?>" action="<?= $config["config"]["action"]??"" ?>">

	<?php 
		$firstElem=array_slice($config["inputs"], 0, 1);
		$secondElem=array_slice($config["inputs"], 1, 1);
		$thirdElem=array_slice($config["inputs"], 2, 1);
		$sixthElem=array_slice($config["inputs"], 2, 1);

	?>
	<?php if($config['user']['Role']=== 1): ?>
	<?php if(!empty($config['article']) && $config['article']['Active'] === 0): ?> <input type="submit" class="cta-button btn--pink" name="publish" value="<?= "Publier" ?>"><?php endif; ?>
	<?php if(!empty($config['article']) && $config['article']['Active'] === 1): ?> <input type="submit" class="cta-button btn--pink" name="unpublish" value="<?= "Dépublier" ?>"><?php endif; ?>
	<?php endif;?>
		<h1 class="h1-section-back">Création d'une Page</h1>
	<div> 
	<?php 	
		foreach ($firstElem as $name => $configInput):?>
		<div>
			<p><?= $configInput["label"] ?>
			<input name="<?= $name ?>" 
					class=""
					type="<?= $configInput["type"]??"text" ?>"
					value="<?= !empty($config["article"]['Title']) ? $config["article"]['Title'] : '' ?>"
					<?php if(!empty($configInput["required"])): ?>
						required="required"
					<?php endif;?>

			></p>
			</div>
	<?php endforeach;?> 

    <?php 	
		foreach ($secondElem as $name => $configInput):?>
		<div>
			<p><?= $configInput["label"] ?>
			<input name="<?= $name ?>" 
					class=""
					type="<?= $configInput["type"]??"text" ?>"
					value="<?= !empty($config["article"]['Description']) ? $config["article"]['Description'] : '' ?>"
					<?php if(!empty($configInput["required"])): ?>
						required="required"
					<?php endif;?>

			></p>
			</div>
	<?php endforeach;?> 

	<?php 
		foreach ($sixthElem as $name => $configInput):?>
		<div>
			<p><?= $configInput["label"] ?>
			<input name="<?= $name ?>" 
					class=""
					type="<?= $configInput["type"]??"text" ?>"
					value="<?= !empty($config["article"]['Slug']) ? $config["article"]['Slug'] : ''  ?>"
					<?php if(!empty($configInput["required"])): ?>
						required="required"
					<?php endif;?>

			></p>
			</div>
	<?php endforeach;?>

	<textarea class="<?=$config['textarea']['class']?>" id="<?= $config['textarea']['id']?>" name="<?=
	$config['textarea']['name']?>" required>
		<?= !empty($config["article"]["Content"]) ? $config["article"]["Content"] : "" ?>
	</textarea>

	</div>

	<input type="submit" class="cta-button btn--pink" name="submit" value="<?= !empty($config['article']) ? 'Modifier' : 'Ajouter' ?>">
	<?php if(!empty($config['article'])): ?> <input type="submit" class="cta-button btn--pink" name="delete" value="<?= "Supprimer" ?>"><?php endif; ?>
</form>