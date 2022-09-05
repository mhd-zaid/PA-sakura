<!-- SECTION HERO -->
<section id="section-login">
    <div class="container">
        <div>
            <h1>Connectez vous à votre compte</h1><br>
            <?php 
                $this->includeComponent("form-login", $configForm);
            ?>
            <div>
                <p><a href="">Mot de passe oublié ?</a></p>
                <p><a href="/s-inscrire">Créer un nouveau compte</a></p>
            </div>

        </div>
    </div>
</section>

