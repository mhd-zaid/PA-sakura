<div class="container-fluid ">
    <h1>Paramètres&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;Gestion URL</h1>
    <section class="grid grid-rounded">
        <div class="row">
            <div class="col col-offset-1">
                <div class="row">
                    <h1>&nbsp;&nbsp;&nbsp;Comment souhaitez-vous réecrire vos URL</h1>
                </div>
                <div class="row">
                    <div class="col">
                        <?php
                        $this->includeComponent("form-manage-url", $configForm);
                        ?>
                        <?php foreach ($configFormErrors as $error) : ?>
                            <div>
                                <p><?= $error ?> </p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>