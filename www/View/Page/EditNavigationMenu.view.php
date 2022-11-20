<section class="grid">
    <div class="row">
        <h1 class="h1-section-back">Menu</h1>
    </div>
    <div class="row">
        <p class="p-section-back">Créer ou modifier vos propres menus</p>
    </div>
</section>

<section class="grid grid-rounded navigation-menu">
    <form method="POST">
        <div class="row">
            <div class="col"><b>Titre du menu</b></div>
            <div class="col"><input type="text" name="menu-title" class="ipt-form-entry" value="<?php echo isset($data["Title"])?$data["Title"]:"" ?>"></div>
        </div>
        <div class="row">
            <div class="col flex-col flex-col-center"><b>Ajouter un élément</b></div>
            <div class="col flex-col flex-col-center"><input type="text" id="ipt-add-page" class="ipt-form-entry"></div>
            <div class="col"><button id="btn-add-page" class="cta-button btn--pink">Ajouter</button></div>
        </div>
        <div class="row">
            <div class="col flex-col flex-col-center"><b>Supprimer un élément</b></div>
            <div class="col flex-col flex-col-center"><select name="slt-del-page" id="slt-del-page" class="ipt-form-entry">
                <?php 
                 $menuContent = explode(",",$data["Content"]);
                 foreach ($menuContent as $key => $value){
                    echo('<option value="'.$value.'">'.$value.'</option>');
                 }
                ?>
            </select></div>
            <div class="col"><button id="btn-delete-page" class="cta-button btn--pink">Supprimer</button></div>
        </div>
        <div class="row">
            <div class="col">
                <b>Éléments du menu</b>&nbsp;&nbsp;&nbsp;<i>modifiez l'ordre de vos éléments</i>
            </div>
        </div>
        <div class="row">
            <div class="col col-8">
                <div class="row menu-items">
                    <div class="col col-offset-3 col-6 center-text"><b>Nom de la page</b></div>
                </div>
            </div>
        </div>
        <div id="row-container" class="row">   
            <div class="col col-8" id="drag-container">
                <?php 
                    foreach ($menuContent as $key => $value){
                        echo('<div class="row pages menu-items">');
                        echo('<div class="col col-3 flex-col flex-col-align-center"></div>');
                        echo('<input class="col col-6 center-text" name="'.$value.'" value="'.$value.'" readonly>');
                        echo('<div class="col col-3 flex-col flex-col-align-center"><iconify-icon class="delete-page-menu" icon="el:remove-circle" style="color: red;" width="42"></iconify-icon></iconify-icon></div>');
                        echo('</div>');
                    }
                ?>
            </div>
        </div>
        <div class="row">
            <?php if(isset($_GET["id"])){
                    echo('<div class="col"><input id="btn-save-menu" name="publish" type="submit" class="cta-button btn--pink" value="Modifier"></div>');
                    echo('<div class="col"><input id="btn-del-menu" name="unpublish" type="submit" class="cta-button btn--pink" value="Supprimer"></div>');
                }
                else{
                    echo('<div class="col"><input id="btn-save-menu" name="publish" type="submit" class="cta-button btn--pink" value="Créer"></div>');
                }
             ?>
        </div>
    </form>
</section>

<script>
$(document).ready(function () {
    //Ajout d'une page au menu
    $("#btn-add-page").click(function(e){
        e.preventDefault();
        var newPage = $("#ipt-add-page").val();
        if(newPage){
            var newRowPage = $('<div class="row pages menu-items">'
                            +'<div class="col col-3 flex-col flex-col-align-center"><!--<iconify-icon class="menu-arrow menu-arrow-up" icon="ant-design:arrow-up-outlined" width="42"></iconify-icon>--></div>'
                            +'<input class="col col-6 center-text" name="'+newPage+'" value="'+ newPage +'" readonly>'
                            +'<div class="col col-2 flex-col flex-col-align-center"><iconify-icon class="delete-page-menu" icon="el:remove-circle" style="color: red;" width="42"></iconify-icon></iconify-icon></div>'
                            +'</div>');
            $("#drag-container").append(newRowPage);
            document.getElementById("ipt-add-page").value="";
        }
        dragAndDrop(document.getElementById('drag-container'));
    });
    //Suppresion d'une page du menu
    $("#btn-delete-page").click(function(e){
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