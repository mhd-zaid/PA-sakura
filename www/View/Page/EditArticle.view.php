<script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>

<section class="grid">
    <div class="row">
        <div class="col col-12">
            <h1 class="h1-section-back">Création d'un article</h1>
            <form action="" method="POST">
                        <div class="row">
                            <div>
                                <p id="article-slug">Titre de l'article</p>
                            </div>
                            <div class="col col-5 flex-col flex-col-center">
                                <input id="ipt-slug" type="text" name="article-slug">
                            </div>
                        </div>
                    <textarea class="ckeditor" id="editor" name="editor"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-12">
                    <button type="submit" name="submit" class="cta-button btn--pink" id="add">Ajouter</button>
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
