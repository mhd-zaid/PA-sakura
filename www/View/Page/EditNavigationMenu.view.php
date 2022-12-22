<section class="grid">
    <div class="row">
        <h1 class="h1-section-back">Menu</h1>
    </div>
    <div class="row">
        <p class="p-section-back">Créer ou modifier vos propres menus</p>
    </div>
</section>
<?php 
        $this->includeComponent("form-create-navigation", $configForm);
        ?>
            <?php foreach ($configFormErrors as $error ):?>
            <div>
                <p><?= $error ?> </p>
            </div>
        <?php endforeach;?>

<script>
    $(document).ready(function() {
        $("#slt-add-page")[0].value = "";
        $("#btn-add-page").click(function(e) {
            e.preventDefault();
            // var newPage = $("#ipt-add-page").val();
            var newPage = $("#slt-add-page")[0].value;
            if (newPage) {
                var newRowPage = $('<div class="row pages menu-items">' +
                    '<input class="col col-offset-3 col-6 center-text" name="' + newPage + '" value="' + newPage + '" readonly>' +
                    '</div>');
                $("#drag-container").append(newRowPage);
                $("#slt-add-page")[0].value = "";
            }
            dragAndDrop(document.getElementById('drag-container'));
        });
        //Suppresion d'une page du menu
        $("#btn-delete-page").click(function(e) {
            e.preventDefault();
            var delPage = document.getElementById("slt-del-page").value;
            var container = document.getElementById("drag-container");
            console.log(delPage);
            var iptdelPage = document.getElementsByName(delPage);
            console.log($(iptdelPage)[0].parentElement);
            container.removeChild($(iptdelPage)[0].parentElement);
            // $(".delete-page-menu").show();
        });
    });
</script>