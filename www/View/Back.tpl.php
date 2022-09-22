<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Dashboard</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" href="../Public/css/style.css" />
    <link rel="stylesheet" type="text/css" href="../Public/css/style_com.css" />
    <link rel="stylesheet" type="text/css" href="../Public/src/scss/partials/_grid.scss" />
    <script s type="text/javascript" src="../Public/js/jquery-3.6.0.min.js"></script>
    <script src="../Public/js/main.js"></script>

</head>

<body>

<header id="header-topbar">
    <div class="container">
        <div id="header-topbar-content">
            <img id="menu-button" src="../Public/img/menu.svg" alt="" onclick="openNav()">
            <p>Dashboard</p>
        </div>
    </div>
</header>

<header id="header-sidebar">

    <div class="container">

    <img id="logo-site" src="../Public/img/sakura.svg" />

        <img id="btn-close" onclick="closeNav()" src="../Public/img/close.svg" />

        <div id="profil">
            <img src="../Public/img/Joseph_Joestar_origamigne_Migne_Huynh.jpg" />
            <h3> Joestar Joseph</h3>
        </div>

        <form action="/action_page.php">
            <select name="select-site" id="dropdown">
                <option value="site1">Site1</option>
                <option value="site2">Site2</option>
                <option value="site3">Site3</option>
                <option value="site4">Site4</option>
            </select>
            <br><br>
        </form>

        <nav>
            <ul>
                <li><a href="#"><img src="../Public/img/dashboard.svg"/>Dashboard</a></li>
                <li><a href="#"><img src="../Public/img/page.svg"/>Pages</a></li>
                <li><a href="/article"><img src="../Public/img/art.svg"/>Articles</a></li>
                <li><a href="#"><img src="../Public/img/media.svg"/>Medias</a></li>
                <li><a href="/commentaire"><img src="../Public/img/com.svg"/>Commentaires</a></li>
                <li><a href="/navigation"><img src="../Public/img/navi.svg"/>Navigation</a></li>
                <li><a href="#"><img src="../Public/img/appa.svg"/>Apparences</a></li>
                <li><a href="#"><img src="../Public/img/ext.svg"/>Extensions</a></li>
                <li><a href="#"><img src="../Public/img/stat.svg"/>Analytics</a></li>
                <li><a href="/profil"><img src="../Public/img/settings.svg"/>Parametres</a></li>
            </ul>
        </nav>
        <a href="/se-deconnecter"><button id="button-signout"><img src="../Public/img/Vector.svg" /></button></a>


    </div>

</header>

<!-- Begin Page Content -->
<main>
    <div class="container">
        <section>
            <?php require $this->view; ?>
        </section>
    </div>
</main>

<script>
    function openNav(){
        document.getElementById("header-sidebar").style.transition= "0.5s";
        document.getElementById("header-sidebar").style.left= "0px";

    }
    function closeNav(){
        document.getElementById("header-sidebar").style.left= "-275px";
    }

</script>


</body>
</html>