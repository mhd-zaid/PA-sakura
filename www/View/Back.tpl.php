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

<body>

<div class="grid grid-back">
    <div class="row row-header">
        <?php $userData = $User->getUser($_COOKIE['JWT']); ?>
        <header id="col-header" class="col col-12 col-md-12 col-md-6">
            <div class="row">
                <div id="logo-site" class="col flex-col flex-col-align-center">
                    <img src="/Public/img/Back/mini-logo.svg" alt="logo-site">
                </div>
                <div class="col visitLink">
                    <a href="#" id="visit" class="cta-button-back  btn-pink"> Visiter le site</a>
                </div>
                <div class="col helpLink">
                    <a href="#">Aide</a>
                </div>
                <div class="col dropdownMenu">
                    <img class="photo-profil icon" src="/Public\img\Back\avatar.svg" alt="">
                    <button class="dropbtnMenu">
                        <?= ucfirst($userData['Firstname'])." ".strtoupper($userData['Lastname']); 
                        ?>
                    </button>
                    <div class="dropdownMenu-content" id="myDropdownMenu">
                        <a href="/parametres-compte">Paramètre du compte</a>
                        <a href="/parametres-users">Gérer les utilisateurs</a>
                        <a href="/parametres-support">Assistance</a>
                        <a href="/se-deconnecter">Se déconnecter</a>
                    </div>
                </div>
            </header>

        </div>


        <div id="row-nav-main" class="row row-nav-main">

            <nav id="col-nav">
                <a href="/tableau-de-bord">
                    <div class="row">
                        <div class="col col-3"><img src="Public/img/Back/dashboard-1.svg" alt="Dashboard"></div>
                        <div class="col col-7 flex-col flex-col-center">
                            <p class="menu-label">Accueil</p>
                        </div>
                    </div>
                </a>
                <a href="/page">
                    <div class="row">
                        <div class="col col-3"><img src="Public/img/Back/page-1.svg" alt="Dashboard"></div>
                        <div class="col col-7 flex-col flex-col-center">
                            <p class="menu-label">Page</p>
                        </div>
                    </div>
                </a>
                <a href="/article">
                    <div class="row">
                        <div class="col col-3"><img src="Public/img/Back/page-1.svg" alt="Dashboard"></div>
                        <div class="col col-7 flex-col flex-col-center">
                            <p class="menu-label">Articles</p>
                        </div>
                    </div>
                </a>
                <a href="/media">
                    <div class="row">
                        <div class="col col-3"><img src="Public/img/Back/article-1.svg" alt="Dashboard"></div>
                        <div class="col col-7 flex-col flex-col-center">
                            <p class="menu-label">Médias</p>
                        </div>
                    </div>
                </a>
                <a href="/commentaire">
                    <div class="row">
                        <div class="col col-3"><img src="Public/img/Back/media1.svg" alt="Dashboard"></div>
                        <div class="col col-7 flex-col flex-col-center">
                            <p class="menu-label">Commentaires</p>
                        </div>
                    </div>
                </a>
                <a href="/navigation">
                    <div class="row">
                        <div class="col col-3"><img src="Public/img/Back/comments1.svg" alt="Dashboard"></div>
                        <div class="col col-7 flex-col flex-col-center">
                            <p class="menu-label">Navigation</p>
                        </div>
                    </div>
                </a>
                <a href="/apparence">
                    <div class="row">
                        <div class="col col-3"><img src="Public/img/Back/appearance-1.svg" alt="Dashboard"></div>
                        <div class="col col-7 flex-col flex-col-center">
                            <p class="menu-label">Apparence</p>
                        </div>
                    </div>
                </a>
                <a href="/tableau-de-bord">
                    <div class="row">
                        <div class="col col-3"><img src="Public/img/Back/analytics-1.svg" alt="Dashboard"></div>
                        <div class="col col-7 flex-col flex-col-center">
                            <p class="menu-label">Statistiques</p>
                        </div>
                    </div>
                </a>
                <a href="/tableau-de-bord">
                    <div class="row">
                        <div class="col col-3"><img src="Public/img/Back/extension-1.svg" alt="Dashboard"></div>
                        <div class="col col-7 flex-col flex-col-center">
                            <p class="menu-label">Extension</p>
                        </div>
                    </div>
                </a>
                <a href="/parametres">
                    <div class="row">
                        <div class="col col-3"><img src="Public/img/Back/settings-1.svg" alt="Dashboard"></div>
                        <div class="col col-7 flex-col flex-col-center">
                            <p class="menu-label">Paramètres</p>
                        </div>
                    </div>
                </a>
                <a href="/se-deconnecter">
                    <div id="disconnect" class="row">
                        <div class="col col-3"><img src="Public/img/Back/logout1.svg" alt="Dashboard"></div>
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
                <div id="label" class="row appearance">
                    <div class="menu-label col col-7 flex-col flex-col-center">
                        <p>H1</p>
                    </div>
                    <div id="appearance-h1-icon" class="menu-icon col col-5">
                        <iconify-icon icon="material-symbols:arrow-forward-ios" style="color: white;"></iconify-icon>
                    </div>
                </div>
                <div id="appearance-h1-settings" class="row">
                    <div class="row">
                        <label for="h1-color">Color</label><br>
                    </div>
                    <div class="row">
                        <input type="color" name="h1-color" id="h1colorPicker"><br>
                    </div>
                    <div class="row">
                        <label for="h1-font-size">Font-size</label><br>
                    </div>
                    <div class="row">
                        <input type="number" name="h1-font-size" min="0" max="64"><br>
                    </div>
                    <div class="row">
                        <label for="h1-font-weigth">Font-weight</label><br>
                    </div>
                    <div class="row">
                        <input type="number" name="h1-font-weigth" min="0" max="800"><br>
                    </div>
                    <div class="row">
                        <label for="h1-font-family">Font-family</label><br>
                    </div>
                    <div class="row">
                        <select name="h1-font-family" id="h1-font-family">
                            <option value=""></option>
                            <option value="sans-serif">Sans-serif</option>
                            <option value="calibri">Calibri</option>
                            <option value="times-new-roman">Times new roman</option>
                            <option value="mulish">Mulish</option>
                        </select><br>
                    </div>
                </div>
                <hr>

                <div id="label" class="row appearance">
                    <div class="menu-label col col-7 flex-col flex-col-center">
                        <p>H2</p>
                    </div>
                    <div id="appearance-h2-icon" class="menu-icon col col-5">
                        <iconify-icon icon="material-symbols:arrow-forward-ios" style="color: white;"></iconify-icon>
                    </div>
                </div>
                <div id="appearance-h2-settings" class="row">
                    <div class="row">
                        <label for="h2-color">Color</label><br>
                    </div>
                    <div class="row">
                        <input type="color" name="h2-color" id="h2colorPicker"><br>
                    </div>
                    <div class="row">
                        <label for="h2-font-size">Font-size</label><br>
                    </div>
                    <div class="row">
                        <input type="number" name="h2-font-size" min="0" max="64"><br>
                    </div>
                    <div class="row">
                        <label for="h2-font-weigth">Font-weight</label><br>
                    </div>
                    <div class="row">
                        <input type="number" name="h2-font-weigth" min="0" max="800"><br>
                    </div>
                    <div class="row">
                        <label for="h2-font-family">Font-family</label><br>
                    </div>
                    <div class="row">
                        <select name="h2-font-family" id="h2-font-family">
                            <option value=""></option>
                            <option value="sans-serif">Sans-serif</option>
                            <option value="calibri">Calibri</option>
                            <option value="times-new-roman">Times new roman</option>
                            <option value="mulish">Mulish</option>
                        </select><br>
                    </div>
                </div>
                <hr>

                <div id="label" class="row appearance">
                    <div class="menu-label col col-7 flex-col flex-col-center">
                        <p>H3</p>
                    </div>
                    <div id="appearance-h3-icon" class="menu-icon col col-5">
                        <iconify-icon icon="material-symbols:arrow-forward-ios" style="color: white;"></iconify-icon>
                    </div>
                </div>
                <div id="appearance-h3-settings" class="row">
                    <div class="row">
                        <label for="h3-color">Color</label><br>
                    </div>
                    <div class="row">
                        <input type="color" name="h3-color" id="h3colorPicker"><br>
                    </div>
                    <div class="row">
                        <label for="h3-font-size">Font-size</label><br>
                    </div>
                    <div class="row">
                        <input type="number" name="h3-font-size" min="0" max="64"><br>
                    </div>
                    <div class="row">
                        <label for="h3-font-weigth">Font-weight</label><br>
                    </div>
                    <div class="row">
                        <input type="number" name="h3-font-weigth" min="0" max="800"><br>
                    </div>
                    <div class="row">
                        <label for="h3-font-family">Font-family</label><br>
                    </div>
                    <div class="row">
                        <select name="h3-font-family" id="h3-font-family">
                            <option value=""></option>
                            <option value="sans-serif">Sans-serif</option>
                            <option value="calibri">Calibri</option>
                            <option value="times-new-roman">Times new roman</option>
                            <option value="mulish">Mulish</option>
                        </select><br>
                    </div>
                </div>
                <hr>

                <div id="label" class="row appearance">
                    <div class="menu-label col col-7 flex-col flex-col-center">
                        <p>H4</p>
                    </div>
                    <div id="appearance-h4-icon" class="menu-icon col col-5">
                        <iconify-icon icon="material-symbols:arrow-forward-ios" style="color: white;"></iconify-icon>
                    </div>
                </div>
                <div id="appearance-h4-settings" class="row">
                    <div class="row">
                        <label for="h4-color">Color</label><br>
                    </div>
                    <div class="row">
                        <input type="color" name="h4-color" id="h4colorPicker"><br>
                    </div>
                    <div class="row">
                        <label for="h4-font-size">Font-size</label><br>
                    </div>
                    <div class="row">
                        <input type="number" name="h4-font-size" min="0" max="64"><br>
                    </div>
                    <div class="row">
                        <label for="h4-font-weigth">Font-weight</label><br>
                    </div>
                    <div class="row">
                        <input type="number" name="h4-font-weigth" min="0" max="800"><br>
                    </div>
                    <div class="row">
                        <label for="h4-font-family">Font-family</label><br>
                    </div>
                    <div class="row">
                        <select name="h4-font-family" id="h4-font-family">
                            <option value=""></option>
                            <option value="sans-serif">Sans-serif</option>
                            <option value="calibri">Calibri</option>
                            <option value="times-new-roman">Times new roman</option>
                            <option value="mulish">Mulish</option>
                        </select><br>
                    </div>
                </div>
                <hr>

                <div id="label" class="row appearance">
                    <div class="menu-label col col-7 flex-col flex-col-center">
                        <p>H5</p>
                    </div>
                    <div id="appearance-h5-icon" class="menu-icon col col-5">
                        <iconify-icon icon="material-symbols:arrow-forward-ios" style="color: white;"></iconify-icon>
                    </div>
                </div>
                <div id="appearance-h5-settings" class="row">
                    <div class="row">
                        <label for="h5-color">Color</label><br>
                    </div>
                    <div class="row">
                        <input type="color" name="h5-color" id="h5colorPicker"><br>
                    </div>
                    <div class="row">
                        <label for="h5-font-size">Font-size</label><br>
                    </div>
                    <div class="row">
                        <input type="number" name="h5-font-size" min="0" max="64"><br>
                    </div>
                    <div class="row">
                        <label for="h5-font-weigth">Font-weight</label><br>
                    </div>
                    <div class="row">
                        <input type="number" name="h5-font-weigth" min="0" max="800"><br>
                    </div>
                    <div class="row">
                        <label for="h5-font-family">Font-family</label><br>
                    </div>
                    <div class="row">
                        <select name="h5-font-family" id="h5-font-family">
                            <option value=""></option>
                            <option value="sans-serif">Sans-serif</option>
                            <option value="calibri">Calibri</option>
                            <option value="times-new-roman">Times new roman</option>
                            <option value="mulish">Mulish</option>
                        </select><br>
                    </div>
                </div>
                <hr>

                <div id="label" class="row appearance">
                    <div class="menu-label col col-7 flex-col flex-col-center">
                        <p>H6</p>
                    </div>
                    <div id="appearance-h6-icon" class="menu-icon col col-5">
                        <iconify-icon icon="material-symbols:arrow-forward-ios" style="color: white;"></iconify-icon>
                    </div>
                </div>
                <div id="appearance-h6-settings" class="row">
                    <div class="row">
                        <label for="h6-color">Color</label><br>
                    </div>
                    <div class="row">
                        <input type="color" name="h6-color" id="h6colorPicker"><br>
                    </div>
                    <div class="row">
                        <label for="h6-font-size">Font-size</label><br>
                    </div>
                    <div class="row">
                        <input type="number" name="h6-font-size" min="0" max="64"><br>
                    </div>
                    <div class="row">
                        <label for="h6-font-weigth">Font-weight</label><br>
                    </div>
                    <div class="row">
                        <input type="number" name="h6-font-weigth" min="0" max="800"><br>
                    </div>
                    <div class="row">
                        <label for="h6-font-family">Font-family</label><br>
                    </div>
                    <div class="row">
                        <select name="h6-font-family" id="h6-font-family">
                            <option value=""></option>
                            <option value="sans-serif">Sans-serif</option>
                            <option value="calibri">Calibri</option>
                            <option value="times-new-roman">Times new roman</option>
                            <option value="mulish">Mulish</option>
                        </select><br>
                    </div>
                </div>
                <hr>

                <div id="label" class="row appearance">
                    <div class="menu-label col col-7 flex-col flex-col-center">
                        <p>Menu</p>
                    </div>
                    <div id="appearance-menu-icon" class="menu-icon col col-5">
                        <iconify-icon icon="material-symbols:arrow-forward-ios" style="color: white;"></iconify-icon>
                    </div>
                </div>
                <div id="appearance-menu-settings" class="row">
                    <div class="row">
                        <label for="nav-color">Color</label><br>
                    </div>
                    <div class="row">
                        <input type="color" name="nav-color" id="navcolorPicker"><br>
                    </div>
                    <div class="row">
                        <label for="nav-background-color">Background-color</label><br>
                    </div>
                    <div class="row">
                        <input type="color" name="nav-background-color" id="navbcgcolorPicker"><br>
                    </div>
                </div>
                <hr>

                <div id="label" class="row appearance">
                    <div class="menu-label col col-7 flex-col flex-col-center">
                        <p>Body</p>
                    </div>
                    <div id="appearance-body-icon" class="menu-icon col col-5">
                        <iconify-icon icon="material-symbols:arrow-forward-ios" style="color: white;"></iconify-icon>
                    </div>
                </div>
                <div id="appearance-body-settings" class="row">
                    <div class="row">
                        <label for="body-background-color">Background-color</label><br>
                    </div>
                    <div class="row">
                        <input type="color" name="body-background-color" id="bodycolorPicker"><br>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <form action="" class="col col-12">
                        <!-- <div class="col col-12"> -->
                            <input class="reset" type="reset"><br>
                        <!-- </div> -->
                        <!-- <div class="col col-12"> -->
                            <input type="submit">
                        <!-- </div> -->
                    </form>
                </div>
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

<<<<<<< HEAD

    <div id="row-nav-main" class="row row-nav-main">

        <nav id="col-nav">
            <a href="/tableau-de-bord"><div class="row">
                <div class="col col-3"><img src="/Public/img/Back/dashboard-1.svg" alt="Dashboard"></div>
                <div class="col col-7 flex-col flex-col-center"><p class="menu-label">Accueil</p></div>
            </div></a>
            <a href="/page"><div class="row">
                <div class="col col-3"><img src="/Public/img/Back/page-1.svg" alt="Dashboard"></div>
                <div class="col col-7 flex-col flex-col-center"><p class="menu-label">Page</p></div>
            </div></a>
            <a href="/article"><div class="row">
                <div class="col col-3"><img src="/Public/img/Back/page-1.svg" alt="Dashboard"></div>
                <div class="col col-7 flex-col flex-col-center"><p class="menu-label">Articles</p></div>
            </div></a>
            <a href="/media"><div class="row">
                <div class="col col-3"><img src="/Public/img/Back/article-1.svg" alt="Dashboard"></div>
                <div class="col col-7 flex-col flex-col-center"><p class="menu-label">Médias</p></div>
            </div></a>
            <a href="/commentaire"><div class="row">
                <div class="col col-3"><img src="/Public/img/Back/media1.svg" alt="Dashboard"></div>
                <div class="col col-7 flex-col flex-col-center"><p class="menu-label">Commentaires</p></div>
            </div></a>
            <a href="/navigation"><div class="row">
                <div class="col col-3"><img src="/Public/img/Back/comments1.svg" alt="Dashboard"></div>
                <div class="col col-7 flex-col flex-col-center"><p class="menu-label">Navigation</p></div>
            </div></a>
            <a href="/apparence"><div class="row">
                <div class="col col-3"><img src="Public/img/Back/appearance-1.svg" alt="Dashboard"></div>
                <div class="col col-7 flex-col flex-col-center"><p class="menu-label">Apparence</p></div>
            </div></a>
            <a href="/statistiques"><div class="row">
                <div class="col col-3"><img src="/Public/img/Back/analytics-1.svg" alt="Dashboard"></div>
                <div class="col col-7 flex-col flex-col-center"><p class="menu-label">Statistiques</p></div>
            </div></a>
            <a href="/tableau-de-bord"><div class="row">
                <div class="col col-3"><img src="/Public/img/Back/extension-1.svg" alt="Dashboard"></div>
                <div class="col col-7 flex-col flex-col-center"><p class="menu-label">Extension</p></div>
            </div></a>
            <a href="/parametres"><div class="row">
                <div class="col col-3"><img src="/Public/img/Back/settings-1.svg" alt="Dashboard"></div>
                <div class="col col-7 flex-col flex-col-center"><p class="menu-label">Paramètres</p></div>
            </div></a>
            <a href="/se-deconnecter"><div id="disconnect" class="row">
                <div class="col col-3"><img src="/Public/img/Back/logout1.svg" alt="Dashboard"></div>
                <div class="col col-7 flex-col flex-col-center"><p class="menu-label">Déconnexion</p></div>
            </div></a>
        </nav>
        
        <main id="col-main" class="col">
            <?php require $this->view; ?>
        </main>
        <?php if(isset($_SESSION["flash-success"]) || isset($_SESSION["flash-error"])){
            if(isset($_SESSION["flash-success"])){
                $msg=$_SESSION["flash-success"];
                unset($_SESSION["flash-success"]);
                echo("<div id='flash-msg' class='row flash flash-success'>");
                echo("<iconify-icon id='close-flash' icon='system-uicons:cross' style='color: black;' width='20'></iconify-icon>");
                echo("<p class='center-text plain'>{$msg}</p>");
                echo("</div>");
            }else{
                $msg=$_SESSION["flash-error"];
                unset($_SESSION["flash-error"]);
                echo("<div id='flash-msg' class='row flash flash-error'>");
                echo("<iconify-icon id='close-flash' icon='system-uicons:cross' style='color: black;' width='20'></iconify-icon>");
                echo("<p class='center-text plain'>{$msg}</p>");
                echo("</div>");
            }
        }?>
        

    </div>

</div>

=======
>>>>>>> 5301997 (init Apparence)
</body>

</html>