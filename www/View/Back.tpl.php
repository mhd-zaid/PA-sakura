<!DOCTYPE html>
<html>
  <head>
    <title>Dashboard</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" href="../Public/css/style.css" />
    <link rel="stylesheet" type="text/css" href="../Public/js/script.js" />
    <link rel="stylesheet" type="text/css" href="../Public/src/scss/partials/_grid.scss" />
    <script s type="text/javascript" src="../Public/js/jquery-3.6.0.min.js"></script>
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



            <img id="logo-ste" src="../Public/img/logo.svg" />

            <img id="btn-close" onclick="closeNav()" src="../Public/img/close.svg" />

            <div id="profil">
                <img src="../Public/img/Joseph_Joestar_origamigne_Migne_Huynh.jpg" />
                <h3> Joestart Joseph</h3>
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
                  <li><a href="#"><img src="../Public/img/navi.svg"/>DASHBOARD</a></li>
                  <li><a href="#"><img src="../Public/img/page.svg"/>PAGES</a></li>
                  <li><a href="#"><img src="../Public/img/art.svg"/>ARTICLES</a></li>
                  <li><a href="#"><img src="../Public/img/media.svg"/>MEDIAS</a></li>
                  <li><a href="#"><img src="../Public/img/com.svg"/>COMMENTAIRES</a></li>
                  <li><a href="#"><img src="../Public/img/navi.svg"/>NAVIGATION</a></li>
                  <li><a href="#"><img src="../Public/img/appa.svg"/>APPARENCES</a></li>
                  <li><a href="#"><img src="../Public/img/ext.svg"/>EXTENSIONS</a></li>
                  <li><a href="#"><img src="../Public/img/stat.svg"/>ANALYTICS</a></li>
                  <li><a href="#"><img src="../Public/img/navi.svg"/>PARAMETRES</a></li>
                </ul>
            </nav>
            <button id="button-signout"><img src="../Public/img/Vector.svg" /></button>
            <div class="container">

    </header>

	<!-- Begin Page Content -->
    <main>
        <div class="container">
            <section id="main-component">
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