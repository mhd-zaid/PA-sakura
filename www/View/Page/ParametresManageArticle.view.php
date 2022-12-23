<div class="container-fluid container-fluid-parameters">
    <h1>Paramètres&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;Gestion URL</h1>
    <section>
        <p>Comment souhaitez-vous réecrire vos URL </p>
             <?php 
                $this->includeComponent("form-manage-url", $configForm);
                ?>
                 <?php foreach ($configFormErrors as $error ):?>
                    <div>
                        <p><?= $error ?> </p>
                    </div>
                <?php endforeach;?>
    </section>
</div>
