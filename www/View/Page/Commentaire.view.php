<section class="grid">
        <div class="row">
            <div class="col">
            <h1 class="h1-section-back">Commentaire</h1>
            <h1 class="h-section-back">Créer ou modifier vos commentaire</h1>
        </div>
    </div>
    <div class="row">
        <p>Recherche <span><input type="text"></span> </p>
    </div>
    <div class="row">
        <div class="col col-2 flex-col flex-col-center"><p class="filter">En attente</p></div>
        <div class="col col-2 flex-col flex-col-center"><p class="filter">Publié</p> </div>
        <div class="col col-2 flex-col flex-col-center"><p class="filter">Supprimé</p></div>
        <div class="col col-2 flex-col flex-col-center"><p class="filter">Signalement</p></div>
        <div class="col col-2 flex-col flex-col-center"><a href="/commentaire-mots-bannis"> <p class="filter">Mot bannis</p></a></div>

    </div>
    <div class="row">
        <div class="col col-2">
            <a href="/commentaire-add" class="cta-button btn--pink">Ajouter</a>
        </div>
    </div>
</section>

<section class="grid">
    <div class="row">
        <div class="col col-12">
        <table id="table_comments" class="display hover order-column">
        <thead>
            <tr>
                <th></th>
                <th>Id</th>
                <th>Content</th>
                <th></th>
            </tr>
        </thead>
    </table>
        </div>
    </div>
</section>