<form method="<?= $config["config"]["method"]??"GET" ?>" action="<?= $config["config"]["action"]??"" ?>">
	<div>
		<?php 
			$radioElem=array_slice($config["inputs"], 0,1);
            if($config['rewriteUrl'] == 0){
                $val = 2;
            }else{
                $val = 1;
            }
		?>
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
						if($value["value"]==$val){
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
			<input type="submit" name="save" class="cta-button btn--pink" value="<?= $config["config"]["submit"]??"Envoyer" ?>">
		</div>
	</div>
</form>