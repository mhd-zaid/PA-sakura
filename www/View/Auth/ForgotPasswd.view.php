<link rel="stylesheet" type="text/css" href="Public/src/scss/main.css">

<section id="form-forgot-passwd">
    <div class="container">
        <div>
            <h1>Mot de passe oublié</h1><br>
            <?php 
                $this->includeComponent("form-forgot-passwd", $configForm);
            ?>
        </div>
    </div>
</section>