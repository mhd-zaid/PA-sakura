<form method="<?= $config["config"]["method"] ?? "GET" ?>" onsubmit="return confirm('Etes vous sûr de votre choix ?');" action="<?= $config["config"]["action"] ?? "" ?>">

    <?php
    $firstElem = array_slice($config["inputs"], 0, 1);
    ?>
    <?php if ($config['user']['Role'] === 1) : ?>
        <?php if (!empty($config['article']) && $config['article']['Active'] === 0) : ?> <input type="submit" class="cta-button btn--pink" name="publish" value="<?= "Publier" ?>"><?php endif; ?>
        <?php if (!empty($config['article']) && $config['article']['Active'] === 1) : ?> <input type="submit" class="cta-button btn--pink" name="unpublish" value="<?= "Dépublier" ?>"><?php endif; ?>
    <?php endif; ?>
    <div>
        
        <section class="grid grid-rounded navigation-menu">
            <div class="row">
                <div class="col col-offset-2">
                    <h1 class="h1-section-back">Création d'un article</h1>
                </div>
            </div>
            <div class="row">
                <div class="col col-8 col-offset-2">
                    <div class="row">
                        <?php
                        foreach ($firstElem as $name => $configInput) : ?>
                            <div>
                                <p><?= $configInput["label"] ?>
                                    <input name="<?= $name ?>" class="" type="<?= $configInput["type"] ?? "text" ?>" value="<?= !empty($config["navigation"]['Title']) ? $config["navigation"]['Title'] : '' ?>" <?php if (!empty($configInput["required"])) : ?> required="required" <?php endif; ?>>
                                </p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="row">
                        <div class="col col-4"><b>Définir par défault</b></div>
                        <div class="col"><input type="checkbox" id="default_menu" name="default_menu" <?php if (isset($config['navigation']) && $config['navigation']['Main'] == 1) echo "checked" ?>></div>
                    </div>
                    <div class="row">
                        <div class="col col-4 flex-col flex-col-center"><b>Ajouter un élément</b></div>
                        <div class="col flex-col flex-col-center"><select name="slt-add-page" id="slt-add-page" class="ipt-form-entry">
                                <?php
                                if (isset($config['navigation']["Content"])) $menuContent = explode(",", $config['navigation']["Content"]);
                                $title = array_values($config['existingPages']);
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
                                $title = array_values($config['existingPages']);
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
                </div>
            </div>
        </section>
</form>