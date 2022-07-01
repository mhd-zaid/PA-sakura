<!DOCTYPE html>
<html>
  <head>
    <title>header</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" href="../Public/css/style.css" />
  </head>

  <body>
    <section class="header">
      <div class="center">
        <img src="../Public/img/logo.svg" />
      </div>

      <div class="center">
          <div class="drop">
            <img src="../Public/img/Joseph_Joestar_origamigne_Migne_Huynh.jpg" />
            <p> Joestart Joseph</p>
          </div>
        <form action="/action_page.php">
          
          <select name="langue" id="dropdown">
            <option value="volvo">Site</option>
            <option value="saab">page</option>
            <option value="opel">page</option>
            <option value="audi">page</option>
          </select>
          <br><br>
        </form>
        <ul class="element">
          <li ><a class="flex" href="#"><img class="logo" src="../Public/img/navi.svg" />DASHBOARD</a></li>
          <li ><a class="flex" href="#"><img class="logo" src="../Public/img/page.svg" />PAGES</a></li>
          <li ><a class="flex" href="#"><img class="logo" src="../Public/img/art.svg" />ARTICLES</a></li>
          <li ><a class="flex" href="#"><img class="logo" src="../Public/img/media.svg" />MEDIAS</a></li>
          <li ><a class="flex" href="#"><img class="logo" src="../Public/img/com.svg" />COMMENTAIRES</a></li>
          <li ><a class="flex" href="#"><img class="logo" src="../Public/img/navi.svg" />NAVIGATIONS</a></li>
          <li ><a class="flex" href="#"><img class="logo" src="../Public/img/appa.svg" />APPARENCES</a></li>
          <li ><a class="flex" href="#"><img class="logo" src="../Public/img/ext.svg" />EXTENSIONS</a></li>
          <li ><a class="flex" href="#"><img class="logo" src="../Public/img/stat.svg" />ANALYTICS</a></li>
          <li ><a class="flex" href="#"><img class="logo" src="../Public/img/navi.svg" />PARAMETRES</a></li>
        </ul>
        <img class="logo deco" src="../Public/img/Vector.svg" />
    </section>
	<!-- Begin Page Content -->
	<div class="container-fluid">
		<?php require $this->view; ?>

	</div>
  </body>
</html>