<div class="container-fluid ">
    <h1>Paramètres&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;Gestion du compte</h1>
    <section class="grid grid-rounded">
        <div class="row">
            <div class="col col-offset-1">
                <?php 
                $this->includeComponent("form-profil-update", $configForm);
                ?>
                <?php foreach ($configFormErrors as $error ):?>
                    <div>
                        <p><?= $error ?> </p>
                    </div>
                <?php endforeach;?>
            </div>
        </div>
    </section>
</div>
