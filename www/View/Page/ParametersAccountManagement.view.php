<div class="container-fluid container-fluid-parameters">
    <h1>Paramètres&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;Gestion du compte</h1>
    <section class="grid grid-rounded">
        <div class="row">
            <div class="col col-offset-1">
                <?php 
                $this->includeComponent("form-profil-update", $configForm);
                ?>
            </div>
        </div>
    </section>
</div>
<?php include 'View/Components/parameters-menu.php';?>