<script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>

<section class="grid">
    <div class="row">
        <div class="col col-12">
            <h1 class="h1-section-back">Création d'une page</h1>
            <form action="" method="POST">
                <div class="row">
                    <div>
                        <p id="page-title">Titre de la page</p>
                    </div>

                    <div class="col col-5 flex-col flex-col-center">
                        <input id="ipt-title" type="text" name="page-title" value=<?= isset($data) && !empty($data) ? $data['Title'] : '' ?>>
                    </div>
                </div>
                <div class="row">
                    <div>
                        <p id="page-title">Meta description</p>
                    </div>
                    <div class="col col-5 flex-col flex-col-center">
                        <input id="ipt-title" type="text" name="page-description" value=<?= isset($data) && !empty($data) ? $data['description'] : '' ?>>
                    </div>
                </div>
                <textarea class="ckeditor" id="editor" name="editor">
                        <?= isset($data) && !empty($data) ? $data['Content'] : '' ?>
                </textarea>
        </div>
    </div>
    <div class="row">
        <div class="col col-12">
            <button type="submit" name="submit" class="cta-button btn--pink" id="add">
                <?= isset($data) && !empty($data)  ? 'Modifier' : 'Ajouter' ?>
            </button>
            <?php
            if (isset($data) && !empty($data)) { ?>
                <button type="submit" name="delete" class="cta-button btn--pink" id="add">
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
        .create(document.querySelector('#editor'))
        .then(editor => {
            theEditor = editor; // Save for later use.
        })
        .catch(error => {
            console.error(error);
        })
    // const add = document.getElementById("add");
    // add.onclick = function(){
    //     console.log(theEditor.getData());
    // }
</script>