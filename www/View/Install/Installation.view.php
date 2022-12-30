<section id="hero">
    <div class="container">
        <div class="intro">
            <img src="/Public/img/Front/Logo.svg" >
            <h1 class="h1-section">Installation de Sakura</h1>            
            <p>Insérez les informations de la base de donnée</p>
        </div>
       <div>
       <?php $this->includeComponent("form", $configForm); ?>
       <?php foreach ($configFormErrors as $error ):?>
                    <div>
                        <p><?= $error ?> </p>
                    </div>
                <?php endforeach;?>
       </div>
    </div>
</section>