<form method="<?= $config["config"]["method"]??"GET" ?>" action="<?= $config["config"]["action"]??"" ?>">

	<?php 
		$firstElem=array_slice($config["inputs"], 0, 1);
		$secondElem=array_slice($config["inputs"], 1, 1);
		$thirdElem=array_slice($config["inputs"], 2, 1);
		$sixthElem=array_slice($config["inputs"], 3, 1);
		$fifthElem=array_slice($config["inputs"], 5, 1);
	?>
	<?php if($config['user']['Role']=== 1 || $config['user']['Role']=== 0 ): ?>
	<?php if(!empty($config['article']) && $config['article']['Active'] === 0): ?> <input type="submit" class="cta-button btn--pink" name="publish" value="<?= "Publier" ?>"><?php endif; ?>
	<?php if(!empty($config['article']) && $config['article']['Active'] === 1): ?> <input type="submit" class="cta-button btn--pink" name="unpublish" value="<?= "Dépublier" ?>"><?php endif; ?>
		<div>
		<?php endif;?>
			<h1 class="h1-section-back">Création d'un article</h1>
		<div> 
		<?php 	
		foreach ($firstElem as $name => $configInput):?>
			<p><?= $configInput["label"] ?>
			<input name="<?= $name ?>" 
					class=""
					type="<?= $configInput["type"]??"text" ?>"
					value="<?= !empty($config["article"]['Title']) ? $config["article"]['Title'] : '' ?>"
					<?php if(!empty($configInput["required"])): ?>
						required="required"
					<?php endif;?>

			></p>
			<?php endforeach;?> 
		</div>

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

	<?php 
		foreach ($fifthElem as $name => $configInput):?>
		<div>
			<p><?= $configInput["label"] ?>
			<input name="<?= $name ?>" 
					class=""
					type="<?= $configInput["type"]??"text" ?>"
					value="<?= !empty($config["article"]['Description']) ? $config["article"]['Description'] : ''  ?>"
					<?php if(!empty($configInput["required"])): ?>
						required="required"
					<?php endif;?>

			></p>
			</div>
	<?php endforeach;?>

	 <input type="hidden" id= <?= $thirdElem['listCategorie']['id'] ?>  value = "<?= !empty($config["article"]['categories']) ? $config["article"]['categories'] : '' ?>" name="list" readonly="true"  style="display:none"/>
	<?php 
	$categorieAlreadySet = $config['article']['categories'];
	$array = explode(',',$categorieAlreadySet);
	echo '<h1>Vos catégories</h1>';
	echo '<div id="container-category">';
	echo '<select name="categorie" id="categorie">';
	echo '<option value="">--Catégorie--</option>';
		foreach($config['category'] as $name => $categorie){
			$categorieName = $config['category'][$name]['Title'];
   			echo "<option value='$categorieName'>$categorieName</option>";
		}
		echo '</select>';
		echo '</div>';

 	?>

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
		if(empty($config['article']['Image_Name'])): ?>
		  <input type="button" class="" name="openFile" id='openFile' value="<?= "Ajouter image" ?>">
	<?php endif; ?>
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