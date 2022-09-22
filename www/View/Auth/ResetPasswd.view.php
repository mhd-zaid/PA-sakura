<link rel="stylesheet" type="text/css" href="Public/src/scss/main.css">

<section id="form-forgot-passwd">
    <div class="container">
        <div>
            <h1>Réinitialisez votre mot de passe</h1><br>
            <?php 
                $this->includeComponent("form-reset-passwd", $configForm);
            ?>
        </div>
    </div>
</section>