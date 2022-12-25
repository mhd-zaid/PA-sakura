<div class="container-fluid container-fluid-parameters">
    <h1>Paramètres&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;Gestion du site</h1>
    <section class="grid grid-rounded parametres-compte">
        <div class="row">
            <div class="col">
                <h1>Information du compte</h1>
            </div>
        </div>
            <a href="/parametres-site" class="cta-button btn--pink">Modifier</a>
            <div class="col col-2 flex-col flex-col-center flex-col-align-center">
                <?php $img = $site[0]["Logo"] ?>
                <?php echo "<img src='uploads/$img' alt='logo' width='150'>" ?>
            </div>
            <div class="col col-9">
                <div class="row flex-row flex-row-align-center">
                    <div class="col">
                        <iconify-icon icon="ci:mail" width="40"></iconify-icon>
                    </div>
                    <div class="col">
                        <p><?= $site[0]["Email"] ?>]</p>
                    </div>
                </div>
                <div class="row flex-row flex-row-align-center">
                    <div class="col">
                        <iconify-icon icon="carbon:phone" width="40"></iconify-icon>
                    </div>
                    <div class="col">
                        <p><?= $site[0]["Number"] ?></p>
                    </div>
                </div>
            </div>
        <div class="row flex-row flex-row-align-center"><div class="col"></div>
            <div class="col">
            <iconify-icon icon="ep:position" width="40"></iconify-icon>
            </div>
            <div class="col">
            <p><?= $site[0]["Address"] ?></p>
            </div>
        </div>
        <div class="row flex-row flex-row-align-center"><div class="col"></div>
            <div class="col">
                <iconify-icon icon="mdi:web" width="40"></iconify-icon>
            </div>
            <div class="col">
                <p><?= $site[0]["Name"] ?></p>
            </div>
        </div>
        <div class="row flex-row flex-row-align-center"><div class="col"></div>
            <div class="col">
                    <iconify-icon icon="clarity:language-line" width="40"></iconify-icon>
            </div>
            <div class="col">
                <p>France</p>
            </div>
        </div>
    </section>
    <section class="grid grid-rounded parametres-compte">
    </section>
</div>