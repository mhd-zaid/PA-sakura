<section class="grid">
    <div class="row">
        <div class="col col-12">
            <?php 
                $this->includeComponent("form-update-site", $configForm);
                ?>
                <?php foreach ($configFormErrors as $error ):?>
                    <div>
                        <p><?= $error ?> </p>
                    </div>
                <?php endforeach;?>
        </div>
    </div>
</section>
