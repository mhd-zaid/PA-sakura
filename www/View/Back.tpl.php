<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" href="/Public/css/main.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <script type="text/javascript" src="../Public/js/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="../Public/js/main.js"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.0/iconify-icon.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="../Public/js/dataTable.js"></script>

</head>
<?php if (isset($_SESSION['isDarkModeEnable']) && $_SESSION['isDarkModeEnable'] === "dark" ) : ?>
<body data-theme="dark">
<?php else: ?>
<body data-theme="light">
<?php endif ?>

    <div class="grid grid-back">
        <div class="row row-header">
            <?php $userData = $User->getUser($_COOKIE['JWT']); ?>
            <header id="col-header" class="col col-12 col-md-12 col-md-6">
                <div class="row">
                    <div id="logo-site" class="col flex-col flex-col-align-center">
                        <img src="/Public/img/Back/mini-logo.svg" alt="logo-site">
                    </div>
                    <div class="col visitLink">
                        <a href="/" id="visit" class="cta-button-back  btn-pink"> Visiter le site</a>
                    </div>
                    <div class="col helpLink">
                        <a href="#">Aide</a>
                    </div>
                    <div class="col dropdown">
                        <button class="dropbtn">
                            <?= ucfirst($userData['Firstname']) . " " . strtoupper($userData['Lastname']); ?>
                        </button>
                        <div class="dropdown-content">
                            <a href="/parametres-compte">Paramètre du compte</a>
                            <?php if ($userData['Role'] == 1 || $userData['Role'] == 0) : ?>
                                <a href="/parametres-users">Gérer les utilisateurs</a>
                            <?php endif ?>
                            <a href="/se-deconnecter">Se déconnecter</a>
                        </div>
                    </div>
            </header>

        </div>


        <div id="row-nav-main" class="row row-nav-main">

            <nav id="col-nav">
                <a href="/tableau-de-bord">
                    <div class="row">
                        <div class="col col-3"><img src="/Public/img/Back/dashboard-1.svg" alt="Dashboard"></div>
                        <div class="col col-7 flex-col flex-col-center">
                            <p class="menu-label">Accueil</p>
                        </div>
                    </div>
                </a>
                <a href="/pages">
                    <div class="row">
                        <div class="col col-3"><img src="/Public/img/Back/page-1.svg" alt="Dashboard"></div>
                        <div class="col col-7 flex-col flex-col-center">
                            <p class="menu-label">Page</p>
                        </div>
                    </div>
                </a>
                <a href="/article">
                    <div class="row">
                        <div class="col col-3"><img src="/Public/img/Back/page-1.svg" alt="Dashboard"></div>
                        <div class="col col-7 flex-col flex-col-center">
                            <p class="menu-label">Articles</p>
                        </div>
                    </div>
                </a>
                <a href="/media">
                    <div class="row">
                        <div class="col col-3"><img src="/Public/img/Back/article-1.svg" alt="Dashboard"></div>
                        <div class="col col-7 flex-col flex-col-center">
                            <p class="menu-label">Médias</p>
                        </div>
                    </div>
                </a>
                <a href="/commentaire">
                    <div class="row">
                        <div class="col col-3"><img src="/Public/img/Back/media1.svg" alt="Dashboard"></div>
                        <div class="col col-7 flex-col flex-col-center">
                            <p class="menu-label">Commentaires</p>
                        </div>
                    </div>
                </a>
                <a href="/navigation">
                    <div class="row">
                        <div class="col col-3"><img src="/Public/img/Back/comments1.svg" alt="Dashboard"></div>
                        <div class="col col-7 flex-col flex-col-center">
                            <p class="menu-label">Navigation</p>
                        </div>
                    </div>
                </a>
                <a href="/apparence">
                    <div class="row">
                        <div class="col col-3"><img src="/Public/img/Back/appearance-1.svg" alt="Dashboard"></div>
                        <div class="col col-7 flex-col flex-col-center">
                            <p class="menu-label">Apparence</p>
                        </div>
                    </div>
                </a>
                <a href="/parametres">
                    <div class="row">
                        <div class="col col-3"><img src="/Public/img/Back/settings-1.svg" alt="Dashboard"></div>
                        <div class="col col-7 flex-col flex-col-center">
                            <p class="menu-label">Paramètres</p>
                        </div>
                    </div>
                </a>
                <a href="/se-deconnecter">
                    <div id="disconnect" class="row">
                        <div class="col col-3"><img src="/Public/img/Back/logout1.svg" alt="Dashboard"></div>
                        <div class="col col-7 flex-col flex-col-center">
                            <p class="menu-label">Déconnexion</p>
                        </div>
                    </div>
                </a>
            </nav>

            <main id="col-main" class="col">
                <?php require $this->view; ?>
            </main>

            <div id="col-appearance">
                <div class="row">
                    <form action="/apparence" method="POST" class="plain appearance-set">
                            <input type="submit" name="submit" class="cta-button btn--pink">
                </div>
                <hr>

                <!-- Apparence titre -->
                <div id="label" class="row appearance">
                    <div class="menu-label col col-7 flex-col flex-col-center">
                        <p>Titre</p>
                    </div>
                    <div id="appearance-titre-icon" class="menu-icon col col-5">
                        <iconify-icon icon="material-symbols:arrow-forward-ios" style="color: white;"></iconify-icon>
                    </div>
                </div>
                <div id="appearance-titre-settings" class="row appearance-settings">
                    <div class="row">
                        <label for="titre-color">Color</label><br>
                    </div>
                    <div class="row">
                        <input type="color" name="titre-color" id="titrecolorPicker" value='<?= $css[".titre"]->color ?>'><br>
                    </div>
                    <div class="row">
                        <label for="titre-font-family">Font-family</label><br>
                    </div>
                    <div class="row">
                        <select class="plain" name="titre-font-family" id="titrefontFamily" value='<?= $css[".titre"]->{"font-family"} ?>'>
                            <option value='<?= $css[".titre"]->{"font-family"} ?>' selected hidden><?= ucfirst($css[".titre"]->{"font-family"}) ?></option>
                            <option value="arial">Arial</option>
                            <option value="cambria">Cambria</option>
                            <option value="courier">Courier</option>
                            <option value="georgia">Georgia</option>
                            <option value="helvetica">Helvetica</option>
                            <option value="optima">Optima</option>
                            <option value="palatino">Palatino</option>
                            <option value="tahoma">Tahoma</option>
                            <option value="times">Times</option>
                            <option value="verdana">Verdana</option>
                        </select><br>
                    </div>
                </div>
                <hr>

                <!-- Apparence paragraphe -->
                <div id="label" class="row appearance">
                    <div class="menu-label col col-7 flex-col flex-col-center">
                        <p>Paragraphe</p>
                    </div>
                    <div id="appearance-paragraphe-icon" class="menu-icon col col-5">
                        <iconify-icon icon="material-symbols:arrow-forward-ios" style="color: white;"></iconify-icon>
                    </div>
                </div>
                <div id="appearance-paragraphe-settings" class="row appearance-settings">
                    <div class="row">
                        <label for="paragraphe-color">Color</label><br>
                    </div>
                    <div class="row">
                        <input type="color" name="paragraphe-color" id="paragraphecolorPicker" value='<?= $css[".paragraph"]->color ?>'><br>
                    </div>
                    <div class="row">
                        <label for="paragraphe-font-family">Font-family</label><br>
                    </div>
                    <div class="row">
                        <select class="plain" name="paragraphe-font-family" id="paragraphefontFamily" value='<?= $css[".paragraph"]->{"font-family"} ?>'>
                            <option value='<?= $css[".paragraph"]->{"font-family"} ?>' selected hidden><?= ucfirst($css[".paragraph"]->{"font-family"}) ?></option>
                            <option value="arial">Arial</option>
                            <option value="cambria">Cambria</option>
                            <option value="courier">Courier</option>
                            <option value="georgia">Georgia</option>
                            <option value="helvetica">Helvetica</option>
                            <option value="optima">Optima</option>
                            <option value="palatino">Palatino</option>
                            <option value="tahoma">Tahoma</option>
                            <option value="times">Times</option>
                            <option value="verdana">Verdana</option>
                        </select><br>
                    </div>
                </div>
                <hr>

                <!-- Apparence menu -->
                <div id="label" class="row appearance">
                    <div class="menu-label col col-7 flex-col flex-col-center">
                        <p>Menu</p>
                    </div>
                    <div id="appearance-menu-icon" class="menu-icon col col-5">
                        <iconify-icon icon="material-symbols:arrow-forward-ios" style="color: white;"></iconify-icon>
                    </div>
                </div>
                <div id="appearance-menu-settings" class="row appearance-settings">
                    <div class="row">
                        <label for="nav-color">Color</label><br>
                    </div>
                    <div class="row">
                        <input type="color" name="nav-color" id="navcolorPicker" value='<?= $css[".nav"]->color ?>'><br>
                    </div>
                </div>
                <hr>

                <!-- Apparence body -->
                <div id="label" class="row appearance">
                    <div class="menu-label col col-7 flex-col flex-col-center">
                        <p>Body</p>
                    </div>
                    <div id="appearance-body-icon" class="menu-icon col col-5">
                        <iconify-icon icon="material-symbols:arrow-forward-ios" style="color: white;"></iconify-icon>
                    </div>
                </div>
                <div id="appearance-body-settings" class="row appearance-settings">
                    <div class="row">
                        <label for="body-background-color">Background-color</label><br>
                    </div>
                    <div class="row">
                        <input type="color" name="body-background-color" id="bodycolorPicker" value='<?= $css[".body"]->{"background-color"} ?>'><br>
                    </div>
                </div>
                <hr>

                <!-- Apparence haeder -->
                <div id="label" class="row appearance">
                    <div class="menu-label col col-7 flex-col flex-col-center">
                        <p>Header</p>
                    </div>
                    <div id="appearance-header-icon" class="menu-icon col col-5">
                        <iconify-icon icon="material-symbols:arrow-forward-ios" style="color: white;"></iconify-icon>
                    </div>
                </div>
                <div id="appearance-header-settings" class="row appearance-settings">
                    <div class="row">
                        <label for="header-background-color">Background-color</label><br>
                    </div>
                    <div class="row">
                        <input type="color" name="header-background-color" id="headercolorPicker" value='<?= $css[".header"]->{"background-color"} ?>'><br>
                    </div>
                </div>
                <hr>

                <!-- Apparence footer -->
                <div id="label" class="row appearance">
                    <div class="menu-label col col-7 flex-col flex-col-center">
                        <p>Footer</p>
                    </div>
                    <div id="appearance-footer-icon" class="menu-icon col col-5">
                        <iconify-icon icon="material-symbols:arrow-forward-ios" style="color: white;"></iconify-icon>
                    </div>
                </div>
                <div id="appearance-footer-settings" class="row appearance-settings">
                    <div class="row">
                        <label for="footer-background-color">Background-color</label><br>
                    </div>
                    <div class="row">
                        <input type="color" name="footer-background-color" id="footercolorPicker" value='<?= $css[".footer"]->{"background-color"} ?>'><br>
                    </div>
                </div>
                <hr>

                <input type="submit" value="electro" name="electro" class="cta-button btn--pink"><br><br>
                <input type="submit" value="music" name="music" class="cta-button btn--pink"><br><br>
                <input type="submit" value="sakura" name="sakura" class="cta-button btn--pink"><br>
                </form>
            </div>

            <?php if (isset($_SESSION["flash-success"]) || isset($_SESSION["flash-error"])) {
                if (isset($_SESSION["flash-success"])) {
                    $msg = $_SESSION["flash-success"];
                    unset($_SESSION["flash-success"]);
                    echo ("<div id='flash-msg' class='row flash flash-success'>");
                    echo ("<iconify-icon id='close-flash' icon='system-uicons:cross' style='color: black;' width='20'></iconify-icon>");
                    echo ("<p class='center-text plain'>{$msg}</p>");
                    echo ("</div>");
                } else {
                    $msg = $_SESSION["flash-error"];
                    unset($_SESSION["flash-error"]);
                    echo ("<div id='flash-msg' class='row flash flash-error'>");
                    echo ("<iconify-icon id='close-flash' icon='system-uicons:cross' style='color: black;' width='20'></iconify-icon>");
                    echo ("<p class='center-text plain'>{$msg}</p>");
                    echo ("</div>");
                }
            } ?>


        </div>

    </div>

    </body>

</html>