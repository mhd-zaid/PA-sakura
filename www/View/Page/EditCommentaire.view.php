<script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>

<section class="grid">
    <div class="row">
        <div class="col col-12">
            <h1 class="h1-section-back">Edition d'un commentaire</h1>
            <form action="" method="POST">
                    <textarea class="ckeditor" id="editor" name="editor">
                        <?= isset($data) && !empty($data) ? $data['Content'] : '' ?>
                    </textarea>
                    <select name="active" id="active">
                        <option value="">--Please choose an option--</option>
                        <option <?php if(isset($data) && !empty($data) && $data['Active'] == 0) {echo 'selected="selected"';}?> value="0">Brouillon</option>
                        <option <?php if(isset($data) && !empty($data) && $data['Active'] == 1) {echo 'selected="selected"';}?> value="1">Publier</option>
                    </select>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col col-12">
                    <button type="submit" name="submit" class="cta-button btn--pink" id="add">
                        <?= isset($data) && !empty($data)  ? 'Modifier' : 'Ajouter' ?>
                    </button>
                    <?php
                    if(isset($data) && !empty($data)){ ?>
                        <button type="submit" name="delete" class="cta-button btn--pink" id="add" >
                        Supprimer
                        </button>
                    <?php }      
                    ?>
                   
            </form>
        </div>
    </div>
</section>

<script>
    ClassicEditor
    .create( document.querySelector( '#editor' ) )
    .then( editor => {
        theEditor = editor; // Save for later use.
    } )
    .catch( error => {
        console.error( error );
    } )
        // const add = document.getElementById("add");
        // add.onclick = function(){
        //     console.log(theEditor.getData());
        // }
</script>
