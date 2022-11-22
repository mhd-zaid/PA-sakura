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
        <div class="col col-8 col-offset-2">
            <form method="POST">
                <div class="row">
                    <div class="col col-4"><b>Titre du menu</b></div>
                    <div class="col"><input type="text" name="menu-title" class="ipt-form-entry" required value="<?php echo isset($data["Title"]) ? $data["Title"] : "" ?>"></div>
                </div>
                <div class="row">
                    <div class="col col-4"><b>Définir par défault</b></div>
                    <div class="col"><input type="checkbox" id="default_menu" name="default_menu" <?php if (isset($data["Main"]) && $data['Main'] == 1) echo "checked" ?>></div>
                </div>
                <div class="row">
                    <div class="col col-4 flex-col flex-col-center"><b>Ajouter un élément</b></div>
                    <div class="col flex-col flex-col-center"><select name="slt-add-page" id="slt-add-page" class="ipt-form-entry">
                            <?php
                            if (isset($data["Content"])) $menuContent = explode(",", $data["Content"]);
                            $title = array_values($existingPages);
                            foreach ($title as $key => $value) {
                                echo ('<option value="' . $value["Title"] . '">' . $value["Title"] . '</option>');
                            }
                            ?>
                        </select></div>
                    <!-- <div class="col flex-col flex-col-center"><input type="text" id="ipt-add-page" class="ipt-form-entry"></div> -->
                    <div class="col"><button id="btn-add-page" class="cta-button btn--pink">Ajouter</button></div>
                </div>
                <div class="row">
                    <div class="col col-4 flex-col flex-col-center"><b>Supprimer un élément</b></div>
                    <div class="col flex-col flex-col-center"><select name="slt-del-page" id="slt-del-page" class="ipt-form-entry">
                            <?php
                            $title = array_values($existingPages);
                            foreach ($title as $key => $value) {
                                echo ('<option value="' . $value["Title"] . '">' . $value["Title"] . '</option>');
                            }
                            ?>
                        </select></div>
                    <div class="col"><button id="btn-delete-page" class="cta-button btn--pink">Supprimer</button></div>
                </div>
                <div class="row">
                    <div class="col col-12">
                        <b>Éléments du menu</b>&nbsp;&nbsp;&nbsp;<i>modifiez l'ordre de vos éléments</i>
                    </div>
                </div>
                <div id="row-container" class="row">
                    <div class="col col-12" id="drag-container">
                        <?php
                        if (isset($menuContent)) {
                            foreach ($menuContent as $key => $value) {
                                echo ('<div class="row pages menu-items">');
                                echo ('<input class="col col-offset-3 col-6 center-text" name="' . $value . '" value="' . $value . '" readonly>');
                                echo ('</div>');
                            }
                        }
                        ?>
                    </div>
                </div>
                <div class="row">
                    <?php if (isset($_GET["id"])) {
                        echo ('<div class="col"><input id="btn-save-menu" name="publish" type="submit" class="cta-button btn--pink" value="Modifier"></div>');
                        echo ('<div class="col"><input id="btn-del-menu" name="unpublish" type="submit" class="cta-button btn--pink" value="Supprimer"></div>');
                    } else {
                        echo ('<div class="col"><input id="btn-save-menu" name="publish" type="submit" class="cta-button btn--pink" value="Créer"></div>');
                    }
                    ?>
                </div>
            </form>
        </div>
    </div>
</section>

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