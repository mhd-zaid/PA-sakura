<link rel="stylesheet" type="text/css" href="Public/src/scss/main.css">
<!-- SECTION HERO -->
<section id="form-login">
    <div class="container">
        <div>
            <h1>Connectez vous à votre compte</h1><br>
            <?php 
                $this->includeComponent("form-login", $configForm);
            ?>
            <br>
            <p><a href="">Mot de passe oublié ?</a></p>
            <br>
            <p><a href="/s-inscrire">Créer un nouveau compte</a></p>
        </div>
    </div>
</section>

