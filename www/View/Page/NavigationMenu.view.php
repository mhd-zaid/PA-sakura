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
        <div class="col"><input type="text" class="ipt-form-entry"></div>
    </div>
    <div class="row">
        <div class="col flex-col flex-col-center"><b>Ajouter un élément</b></div>
        <div class="col flex-col flex-col-center"><input type="text" id="ipt-add-page" class="ipt-form-entry"></div>
        <div class="col"><button id="btn-add-page" class="cta-button btn--pink">Ajouter</button></div>
    </div>
    <div class="row">
        <div class="col">
            <b>Éléments du menu</b>&nbsp;&nbsp;&nbsp;<i>modifiez l'ordre de vos éléments</i>
        </div>
    </div>
    <div class="row">
        <div class="col col-4">
            <div class="row menu-items">
                <div class="col col-2 center-text"><b>Monter</b></div>
                <div class="col col-8 center-text"><b>Nom de la page</b></div>
                <div class="col col-2 center-text"><b>Descendre</b></div>
            </div>
        </div>
    </div>
    <div class="row">   
        <div class="col col-4" id="drag-container">
            <div class="row menu-items">
                <div class="col col-2 flex-col flex-col-center"><iconify-icon class="menu-arrow menu-arrow-up" icon="ant-design:arrow-up-outlined" width="42"></iconify-icon></div>
                <div class="col col-8 center-text"><h2 class="navigation-menu-items">Accueil</h2></div>
                <div class="col col-2 flex-col flex-col-center"><iconify-icon class="menu-arrow menu-arrow-down" icon="ant-design:arrow-down-outlined" width="42"></iconify-icon></div>
            </div>
            <div class="row menu-items">
                <div class="col col-2 flex-col flex-col-center"><iconify-icon class="menu-arrow menu-arrow-up" icon="ant-design:arrow-up-outlined" width="42"></iconify-icon></div>
                <div class="col col-8 center-text"><h2 class="navigation-menu-items">Ventes</h2></div>
                <div class="col col-2 flex-col flex-col-center"><iconify-icon class="menu-arrow menu-arrow-down" icon="ant-design:arrow-down-outlined" width="42"></iconify-icon></div>
            </div>
            <div class="row menu-items">
                <div class="col col-2 flex-col flex-col-center"><iconify-icon class="menu-arrow menu-arrow-up" icon="ant-design:arrow-up-outlined" width="42"></iconify-icon></div>
                <div class="col col-8 center-text"><h2 class="navigation-menu-items">Nouveautés</h2></div>
                <div class="col col-2 flex-col flex-col-center"><iconify-icon class="menu-arrow menu-arrow-down" icon="ant-design:arrow-down-outlined" width="42"></iconify-icon></div>
            </div>
            <div class="row menu-items">
                <div class="col col-2 flex-col flex-col-center"><iconify-icon class="menu-arrow menu-arrow-up" icon="ant-design:arrow-up-outlined" width="42"></iconify-icon></div>
                <div class="col col-8 center-text"><h2 class="navigation-menu-items">Achat</h2></div>
                <div class="col col-2 flex-col flex-col-center"><iconify-icon class="menu-arrow menu-arrow-down" icon="ant-design:arrow-down-outlined" width="42"></iconify-icon></div>
            </div>
            <div class="row menu-items">
                <div class="col col-2 flex-col flex-col-center"><iconify-icon class="menu-arrow menu-arrow-up" icon="ant-design:arrow-up-outlined" width="42"></iconify-icon></div>
                <div class="col col-8 center-text"><h2 class="navigation-menu-items">Market Place</h2></div>
                <div class="col col-2 flex-col flex-col-center"><iconify-icon class="menu-arrow menu-arrow-down" icon="ant-design:arrow-down-outlined" width="42"></iconify-icon></div>
            </div>
        </div>
    </div>
</section>

<script>
$(document).ready(function () {
    //Remonte la page dans le menu
    $("#drag-container").on("click", ".menu-arrow-up", function(e){
        var parent = this.parentNode.parentNode;
        $(parent).before(this.parentNode.parentNode);
        for(var i=0; i<$("#drag-container")[0].children.length; i++){
            if($("#drag-container")[0].children[i]==$(e.target.parentElement.parentElement)[0]){
                if($("#drag-container")[0].children[0]!=$(e.target.parentElement.parentElement)[0]){
                    ($("#drag-container")[0].children[i-1].before($(e.target.parentElement.parentElement)[0]));
                }
            }
        }
    });
    //Descend la page dans le menu
    $("#drag-container").on("click", ".menu-arrow-down", function(e){
        var parent = this.parentNode.parentNode;
        $(parent).before(this.parentNode.parentNode);
        for(var i=$("#drag-container")[0].children.length; i>=0; i--){
            if($("#drag-container")[0].children[i]==$(e.target.parentElement.parentElement)[0]){
                if($("#drag-container")[0].children[$("#drag-container")[0].children.length-1]!=$(e.target.parentElement.parentElement)[0]){
                    $(e.target.parentElement.parentElement)[0].before($("#drag-container")[0].children[i+1]);
                }
            }
        }
    });
    //Ajout d'une page au menu
    $("#btn-add-page").click(function(){
        var newPage = $("#ipt-add-page").val();
        if(newPage){
            var newRowPage = $('<div class="row menu-items">'
                            +'<div class="col col-2 flex-col flex-col-center"><iconify-icon class="menu-arrow menu-arrow-up" icon="ant-design:arrow-up-outlined" width="42"></iconify-icon></div>'
                            +'<div class="col col-8 center-text"><h2>'+ newPage +'</h2></div>'
                            +'<div class="col col-2 flex-col flex-col-center"><iconify-icon class="menu-arrow menu-arrow-down" icon="ant-design:arrow-down-outlined" width="42"></iconify-icon></div>'
                            +'</div>');
            $("#drag-container").append(newRowPage);
            document.getElementById("ipt-add-page").value="";
        }
    });
    $("#btn-delete-page").click(function(){
        
    })
});
</script>