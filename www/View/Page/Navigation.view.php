<section class="grid page-header">
    <div class="row">
        <h1 class="h1-section-back">Navigation</h1>
    </div>
    <div class="row">
        <p class="p-section-back">Créer ou modifier vos propres menus</p>
    </div>
</section>
<!-- TODO : Suppresion de menu 
-->
<section class="grid grid-rounded navigation-menu">
    <div class="row">
        <div class="col col-12">
            <div class="row">
                <div class="col col-12 flex-col"><h1>Menus</h1></div>
            </div>
            <div class="row">
                <div class="col col-3 flex-col flex-col-center">
                    <a href="/navigation-menu-add" class="navigation-link flex-row flex-row-align-center">Ajouter un menu&nbsp;&nbsp;&nbsp;<iconify-icon icon="ant-design:plus-circle-outlined" width="35"></iconify-icon></a>
                </div>
            </div>
            <div class="row">
                 <div class="col col-2 center-text"><b>Modification</b></div>
                <div class="col col-3"><b>Titre</b></div>
                <div class="col col-2"><b>Éléments du menu</b></div>
            </div>

            <?php foreach ($data as $key => $value) {
                // print_r($value["Content"]); 
                $content=str_replace( ",", " - ", $value["Content"]);
                echo('<div class="row">');
                echo('<div class="col col-2 flex-col flex-col-align-center flex-col-center">');
                echo('<a href="" class="read-menu" id="menu-'.$value["Id"].'"><iconify-icon icon="akar-icons:edit" width="35"></iconify-icon></a>');
                echo('</div>');
                echo('<div class="col col-3"><p class="navigation-menu-label">'.$value["Title"].'</p></div>');
                echo('<div class="col col-7"><p class="navigation-menu-elements">'.$content.'</p></div>');
                echo('</div>');
            }
            ?>

        </div>
    </div>
</section>

<script>
    $(document).ready(function(){
        $('.read-menu').on("click",function(e){
            e.preventDefault();
            var menuId = $(this)[0].id.split("-");
            window.location.replace("/navigation-menu-add?id=" + menuId[1]);
        })

    });
</script>