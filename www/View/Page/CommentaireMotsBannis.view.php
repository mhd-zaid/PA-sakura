<section class="grid">
    <div class="row">
        <h1 class="h1-section-back">Commentaires - Mots bannis</h1>
    </div>
    <div class="row">
        <p class="p-section-back">Gérer votre liste des mots bannis</p>
    </div>
    <div class="row">
        <div class="col-4">
            <p>Rechercher&nbsp;&nbsp;&nbsp;<span><input type="text" id="recherche"></span></p>
        </div>
        <div class="col-4">
            <form action="" method="POST">
                <button type="submit" name="submit" class="cta-button btn--pink" id="ajouter-mot">
                    Ajouter
                </button>
                <input type="text" name="ajouter-mot" id="ajouter-mot"></span></p>
            </form>

        </div>
    </div>
</section>

<section class="grid">
    <div class="row">
        <div class="col col-6">
            <?php foreach ($data as $motBanni) : ?>
                <iconify-icon icon="ant-design:close-circle-outlined" style="color: red;"></iconify-icon>
                    </a></span>&nbsp;&nbsp;&nbsp; <?= $motBanni ?> </p>

            <?php endforeach; ?>

    </div>
</section>