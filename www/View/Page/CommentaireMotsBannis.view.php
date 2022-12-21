<section class="grid">
    <div class="row">
        <h1 class="h1-section-back">Commentaires - Mots bannis</h1>
    </div>
    <div class="row">
        <p class="p-section-back">Gérer votre liste des mots bannis</p>
    </div>
    <div class="row">
        <div class="col-4">
          <?php 
                $this->includeComponent("form-create-category", $configForm);
                ?>
                 <?php foreach ($configFormErrors as $error ):?>
                    <div>
                        <p><?= $error ?> </p>
                    </div>
                <?php endforeach;?>
        </div>
    </div>
</section>

<section class="grid">
    <div class="row">
        <div class="col col-6">
            <?php foreach ($data as $motBanni) : ?>
                <p><a href="/supprimer-mot-banni?word=<?= $motBanni ?>"><iconify-icon icon="ant-design:close-circle-outlined" style="color: red;"></iconify-icon>
                    </a></span>&nbsp;&nbsp;&nbsp; <?= $motBanni ?> </p>

            <?php endforeach; ?>

    </div>
</section>