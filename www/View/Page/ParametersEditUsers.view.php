<div class="container-fluid container-fluid-parameters">
    <h1>Paramètres&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;Gestion des utilisateurs&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;Modifier informations utilisateurs</h1>
    <section class="grid grid-rounded">
        <div class="row">
            <div class="col-8 col-offset-1">
                <?php 
                $this->includeComponent("form-user-update", $configForm);
                ?>
            </div>
        </div>
    </section>
</div>
<?php include 'View/Components/parameters-menu.php';?>