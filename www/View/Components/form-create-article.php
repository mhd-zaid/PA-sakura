<form method="<?= $config["config"]["method"]??"GET" ?>" action="<?= $config["config"]["action"]??"" ?>">

	<?php 
		$firstElem=array_slice($config["inputs"], 0, 1);
		$secondElem=array_slice($config["inputs"], 1, 1);
		$thirdElem=array_slice($config["inputs"], 2, 2);
		$fifthElem=array_slice($config["inputs"], 5, 5);
		$sixthElem=array_slice($config["inputs"], 5, 6);

	?>
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
	 <input type="hidden" id="list" value = "<?= !empty($config["article"]['categories']) ? $config["article"]['categories'] : '' ?>" name="list" readonly="true"  style="display:none"/>
	<?php 
	$categorieAlreadySet = $config['article']['categories'];
	$array = explode(',',$categorieAlreadySet);
	echo '<h1>Vos catégories</h1>';
	echo '<div id="container-category">';
	echo '<select name="categorie" id="categorie">';
	echo '<option value="">--Please choose an option--</option>';
		foreach($config['category'] as $name => $categorie){
			$categorieName = $config['category'][$name]['Titre'];
   			echo "<option value='$categorieName'>$categorieName</option>";
		}
		echo '</select>';
		echo '</div>';

 	?>
	<?php 	
		foreach ($secondElem as $name => $configInput):?>
		<div>
			<input name="<?= $name ?>" 
					class=""
					id="<?= $configInput["id"] ?>"
					type="<?= $configInput["type"]??"text" ?>"
					value="<?= $configInput["value"] ?>"
					<?php if(!empty($configInput["required"])): ?>
						required="required"
					<?php endif;?>

			></p>
			</div>
	<?php endforeach;?>

	<?php if(!empty($config['article']['Image_Name'])):  ?><img  width="50px"  src="/uploads/<?=$config['article']['Image_Name']?>" /><?php endif ?>
	<div id="modal-image" class="" style="display:none;">
    <input type="hidden" id="imageName" name="imageName" readonly="true"  style="display:none"/>
        <fieldset>
         <?php
            $target_dir = getcwd()."/uploads";
            if (is_dir($target_dir)) {
              $folder = opendir($target_dir);
              while($file = readdir($folder)){
                if ($file !== '.' && $file !== '..') {
                    $img="/uploads/".$file;
                    echo "<input type='radio' name='imageName' value='$file' id='$file' >";
					echo '<div class="row">';
                    echo '<div class="col col-3 block-image">';
                    echo "<label for='$file'>$file</label>";
                    echo "<img src='$img' width='50px' id='$file' alt=''>";
                    echo '</div>';
                    echo '</div>';
                    }
                }
        }      
       ?>
        </fieldset>                              
        </div>

	<?php 	
		if(!empty($config['article']['Image_Name'])): ?>
		  <input type="submit" class="" name="deleteImage" value="<?= "Supprimer l'image" ?>">
	<?php endif; ?>

	<textarea class="<?=$config['textarea']['class']?>" id="<?= $config['textarea']['id']?>" name="<?=
	$config['textarea']['name']?>" required>
		<?= !empty($config["article"]["Content"]) ? $config["article"]["Content"] : "" ?>
	</textarea>

	</div>

	<input type="submit" class="cta-button btn--pink" name="submit" value="<?= !empty($config['article']) ? 'Modifier' : 'Ajouter' ?>">
	<?php if(!empty($config['article'])): ?> <input type="submit" class="cta-button btn--pink" name="delete" value="<?= "Supprimer" ?>"><?php endif; ?>
</form>