<div class="container-fluid ">
    <h1>Paramètres&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;Gestion des utilisateurs&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;Invitation</h1>
    <section class="grid grid-rounded">
        <div class="row">
            <div class="col">
                <?php 
                $this->includeComponent("form-user-register", $configForm);
                ?>
                 <?php foreach ($configFormErrors as $error ):?>
                    <div>
                        <p><?= $error ?> </p>
                    </div>
                <?php endforeach;?>
            </div>
            
        </div>
    </section>
</div>
<?php include 'View/Components/parameters-menu.php';?>