<script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>

<section class="grid">
    <div class="row">
        <div class="col col-12">
            <h1 class="h1-section-back">Création d'un article</h1>
            <div id="editor">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col col-12">
            <button class="cta-button btn--pink">Ajouter</button>
        </div>
    </div>
</section>

<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>