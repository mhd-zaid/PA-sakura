<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" href="Public/css/main.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <script type="text/javascript" src="../Public/js/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="../Public/js/main.js"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.0/iconify-icon.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/select/1.4.0/js/dataTables.select.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="../Public/js/dataTable.js"></script>
   
</head>
<body>

<div class="grid grid-back">
    <div class="row row-header">
        <?php $userData = $User->getUser(null,$_COOKIE['Email']); ?>
        <header id="col-header" class="col col-12 col-md-12 col-md-6">
            <div class="row">
                <div id="logo-site" class="flex-col flex-col-align-center">
                    <img src="Public/img/Back/mini-logo.svg" alt="logo-site">
                </div>
                <div class="col">
                    <a href="#" id="visit" class="cta-button-back  btn-pink"> Visiter le site</a>
                </div>
                <div class="col helpLink">
                    <a href="#">Aide</a>
                </div>
                <div class="col dropdownMenu">
                    <img class="photo-profil icon" src="Public\img\Back\avatar.svg" alt="">
                    <button class="dropbtnMenu">
                        <?= ucfirst($userData['Firstname'])." ".strtoupper($userData['Lastname']); 
                        ?>
                    </button>
                    <div class="dropdownMenu-content" id="myDropdownMenu">
                        <a href="#">Paramètre du compte</a>
                        <a href="#">Gérer les utilisateurs</a>
                        <a href="#">Assistance</a>
                        <a href="#">Se déconnecter</a>
                    </div>
                </div>
            </div>
        </header>

    </div>


    <div class="row row-nav-main">

        <nav id="col-nav">
            <a href="/tableau-de-bord"><div class="row">
                <div class="col col-4"><img src="Public/img/Back/dashboard-1.svg" alt="Dashboard"></div>
                <div class="col col-8 flex-col flex-col-center"><h1 class="menu-label">Accueil</h1></div>
            </div></a>
            <a href="/page"><div class="row">
                <div class="col col-4"><img src="Public/img/Back/page-1.svg" alt="Dashboard"></div>
                <div class="col col-8 flex-col flex-col-center"><h1 class="menu-label">Page</h1></div>
            </div></a>
            <a href="/article"><div class="row">
                <div class="col col-4"><img src="Public/img/Back/page-1.svg" alt="Dashboard"></div>
                <div class="col col-8 flex-col flex-col-center"><h1 class="menu-label">Articles</h1></div>
            </div></a>
            <a href="/media"><div class="row">
                <div class="col col-4"><img src="Public/img/Back/article-1.svg" alt="Dashboard"></div>
                <div class="col col-8 flex-col flex-col-center"><h1 class="menu-label">Médias</h1></div>
            </div></a>
            <a href="/commentaire"><div class="row">
                <div class="col col-4"><img src="Public/img/Back/media1.svg" alt="Dashboard"></div>
                <div class="col col-8 flex-col flex-col-center"><h1 class="menu-label">Commentaires</h1></div>
            </div></a>
            <a href="/navigation"><div class="row">
                <div class="col col-4"><img src="Public/img/Back/comments1.svg" alt="Dashboard"></div>
                <div class="col col-8 flex-col flex-col-center"><h1 class="menu-label">Navigation</h1></div>
            </div></a>
            <a href="/tableau-de-bord"><div class="row">
                <div class="col col-4"><img src="Public/img/Back/appearance-1.svg" alt="Dashboard"></div>
                <div class="col col-8 flex-col flex-col-center"><h1 class="menu-label">Apparence</h1></div>
            </div></a>
            <a href="/tableau-de-bord"><div class="row">
                <div class="col col-4"><img src="Public/img/Back/analytics-1.svg" alt="Dashboard"></div>
                <div class="col col-8 flex-col flex-col-center"><h1 class="menu-label">Statistiques</h1></div>
            </div></a>
            <a href="/tableau-de-bord"><div class="row">
                <div class="col col-4"><img src="Public/img/Back/extension-1.svg" alt="Dashboard"></div>
                <div class="col col-8 flex-col flex-col-center"><h1 class="menu-label">Extension</h1></div>
            </div></a>
            <a href="/parametres"><div class="row">
                <div class="col col-4"><img src="Public/img/Back/settings-1.svg" alt="Dashboard"></div>
                <div class="col col-8 flex-col flex-col-center"><h1 class="menu-label">Paramètres</h1></div>
            </div></a>
            <a href="/"><div id="disconnect" class="row">
                <div class="col col-2"><img src="Public/img/Back/logout1.svg" alt="Dashboard"></div>
                <div class="col col-10 flex-col flex-col-center"><h2 class="menu-label">Se déconnecter</h2></div>
            </div></a>
        </nav>
        
        <main id="col-main" class="col">
            <?php require $this->view; ?>
        </main>

    </div>

</div>

</body>
</html>