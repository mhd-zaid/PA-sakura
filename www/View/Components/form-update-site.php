<form enctype="multipart/form-data" method="<?= $config["config"]["method"]??"GET" ?>" action="<?= $config["config"]["action"]??"" ?>">

	<?php 
		$firstElem=array_slice($config["inputs"], 0, 1);
		$secondElem=array_slice($config["inputs"], 1, 1);
		$thirdElem=array_slice($config["inputs"], 2, 1);
		$fourthElem=array_slice($config["inputs"], 3, 1);
		$fifthElem=array_slice($config["inputs"], 4, 1);
	?>
		<h1 class="h1-section-back">Information de votre site</h1>

	<div> 

	<?php 	
		foreach ($firstElem as $name => $configInput):?>
		<div>
			<p><?= $configInput["label"] ?>
			<input name="<?= $name ?>" 
					class=""
					type="<?= $configInput["type"]??"text" ?>"
					value="<?= !empty($config["site"][0]['Logo']) ? $config["site"][0]['Logo'] : '' ?>"
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
					value="<?= !empty($config["site"][0]['Name']) ? $config["site"][0]['Name'] : '' ?>"
					<?php if(!empty($configInput["required"])): ?>
						required="required"
					<?php endif;?>

			></p>
			</div>
	<?php endforeach;?> 

    <?php 	
		foreach ($thirdElem as $name => $configInput):?>
		<div>
			<p><?= $configInput["label"] ?>
			<input name="<?= $name ?>" 
					class=""
					type="<?= $configInput["type"]??"text" ?>"
					value="<?= !empty($config["site"][0]['Email']) ? $config["site"][0]['Email'] : '' ?>"
					<?php if(!empty($configInput["required"])): ?>
						required="required"
					<?php endif;?>

			></p>
			</div>
	<?php endforeach;?> 

    <?php 	
		foreach ($fourthElem as $name => $configInput):?>
		<div>
			<p><?= $configInput["label"] ?>
			<input name="<?= $name ?>" 
					class=""
					type="<?= $configInput["type"]??"text" ?>"
					value="<?= !empty($config["site"][0]['Number']) ? $config["site"][0]['Number'] : '' ?>"
					<?php if(!empty($configInput["required"])): ?>
						required="required"
					<?php endif;?>

			></p>
			</div>
	<?php endforeach;?> 

    <?php 	
		foreach ($fifthElem as $name => $configInput):?>
		<div>
			<p><?= $configInput["label"] ?>
			<input name="<?= $name ?>" 
					class=""
					type="<?= $configInput["type"]??"text" ?>"
					value="<?= !empty($config["site"][0]['Address']) ? $config["site"][0]['Address'] : '' ?>"
					<?php if(!empty($configInput["required"])): ?>
						required="required"
					<?php endif;?>

			></p>
			</div>
	<?php endforeach;?> 
	<input type="submit" class="cta-button btn--pink" name="submit">
</form>