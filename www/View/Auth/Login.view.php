<!-- SECTION HERO -->
<section id="section-login">
    <div class="container">
        <div>
            <h1>Connectez vous à votre compte</h1><br>
            <?php 
                $this->includeComponent("form-login", $configForm);
                ?>
                 <?php foreach ($configFormErrors as $error ):?>
                    <div>
                        <p><?= $error ?> </p>
                    </div>
                <?php endforeach;?>
            <br>
            <p><a href="/mot-de-passe-oublie">Mot de passe oublié ?</a></p>
            <br>
        </div>
    </div>
</section>

