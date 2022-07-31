<link rel="stylesheet" type="text/css" href="Public/src/scss/main.css">
<!-- SECTION HERO -->
<section id="form-register">
    <div class="container">
        <div>
            <h1>Créer votre compte</h1>
            <?php 
                // print_r($configFormErrors);
                $this->includeComponent("form", $configForm);
            ?>
            <br>
            <p><a href="/se-connecter">Se connecter</a></p>
        </div>
    </div>
</section>

