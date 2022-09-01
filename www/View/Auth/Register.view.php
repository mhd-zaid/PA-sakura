<!-- SECTION HERO -->
<section id="section-register">
    <div class="container">
        <div>
            <h1>Créer votre compte</h1>
            <?php 
                // print_r($configFormErrors);
                $this->includeComponent("form", $configForm);
            ?>
            <?php foreach ($configFormErrors as $error ):?>

                <div>
                    <p><?= $error ?> </p>
                </div>

            <?php endforeach;?>
            <br>
        </div>
        <p><a href="/se-connecter">Se connecter</a></p>
    </div>
</section>

