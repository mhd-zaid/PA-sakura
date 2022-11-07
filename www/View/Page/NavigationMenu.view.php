<section class="grid">
    <div class="row">
        <h1 class="h1-section-back">Menu</h1>
    </div>
    <div class="row">
        <p class="p-section-back">Créer ou modifier vos propres menus</p>
    </div>
</section>

<section class="grid grid-rounded navigation-menu">
    <div class="row">
        <div class="col"><b>Titre du menu</b></div>
        <div class="col"><input type="text" class="ipt-form-entry" value="<?php echo $data["Title"] ?>"></div>
    </div>
    <div class="row">
        <div class="col flex-col flex-col-center"><b>Ajouter un élément</b></div>
        <div class="col flex-col flex-col-center"><input type="text" id="ipt-add-page" class="ipt-form-entry"></div>
        <div class="col"><button id="btn-add-page" class="cta-button btn--pink">Ajouter</button></div>
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
                <div class="col col-2 center-text"><!--<b>Monter</b>--></div>
                <div class="col col-6 center-text"><b>Nom de la page</b></div>
                <div class="col col-2 center-text"><!--<b>Descendre</b>--></div>
                <div class="col col-2 center-text"><!--<b>Supprimer</b>--></div>
            </div>
        </div>
    </div>
    <div id="row-container" class="row">   
        <div class="col col-8" id="drag-container">
            <?php 
                $menuContent = explode(",",$data["Content"]);
                foreach ($menuContent as $key => $value){
                    echo('<div class="row pages menu-items">');
                    echo('<div class="col col-2 flex-col flex-col-align-center"></div>');
                    echo('<div class="col col-6 center-text"><h2 class="navigation-menu-items">'.$value.'</h2></div>');
                    echo('<div class="col col-2 flex-col flex-col-align-center"></div>');
                    echo('<div class="col col-2 flex-col flex-col-align-center"><iconify-icon class="delete-page-menu" icon="el:remove-circle" style="color: red;" width="42"></iconify-icon></iconify-icon></div>');
                    echo('</div>');
                }
             ?>
        </div>
    </div>
    <div class="row">
        <div class="col"><button id="btn-save-menu" class="cta-button btn--pink">Modifier</button></div>
    </div>
</section>

<script>
$(document).ready(function () {
    //Ajout d'une page au menu
    $("#btn-add-page").click(function(){
        var newPage = $("#ipt-add-page").val();
        if(newPage){
            var newRowPage = $('<div class="row pages menu-items">'
                            +'<div class="col col-2 flex-col flex-col-align-center"><!--<iconify-icon class="menu-arrow menu-arrow-up" icon="ant-design:arrow-up-outlined" width="42"></iconify-icon>--></div>'
                            +'<div class="col col-6 center-text"><h2>'+ newPage +'</h2></div>'
                            +'<div class="col col-2 flex-col flex-col-align-center"><!--<iconify-icon class="menu-arrow menu-arrow-down" icon="ant-design:arrow-down-outlined" width="42"></iconify-icon>--></div>'
                            +'<div class="col col-2 flex-col flex-col-align-center"><iconify-icon class="delete-page-menu" icon="el:remove-circle" style="color: red;" width="42"></iconify-icon></iconify-icon></div>'
                            +'</div>');
            $("#drag-container").append(newRowPage);
            document.getElementById("ipt-add-page").value="";
        }
    });
    //Suppresion d'une page du menu
    $("#btn-delete-page").click(function(){
        $(".delete-page-menu").show();
    });
});
</script>