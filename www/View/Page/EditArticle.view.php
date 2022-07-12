<!DOCTYPE html>
<html>
  <head>
    <title>header</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" href="../../Public/css/style.css" />
    <link rel="stylesheet" type="text/css" href="../../Public/css/edit-article.css" />
  </head>
  <body>
    <section>
        <div class="button">
        <img  src="../../Public/img/save.svg" width="40px" height="40px" id ="save_out"/>
            <img  src="../../Public/img/goback.svg" width="40px" height="40px" id="myBtn"/>
        </div>
<div id="modalEdit" class="modal">  
    <div id = "modal-edit" class = "modal-edit">
  <span class="close">&times;</span> 
  <textarea rows = "15" cols="25" id = "input-area"></textarea>

  <div class = "choix-police">
      <p id="bold">Bold</p>
      <p id="italic">Italic</p>
      <p id="underline">Underline</p> 
      <input type = "color"  id = "color"/>
      <button  id="save-text">Sauvegarder</button>
      <button  id="modifier">Modifier</button>
</div>
</div>
</div>
<div id="myModal" class="modal">
  <div class="modal-content">
    <span>Voulez-vous quitter</span>
    <div class="modal-button">
    <button class="button_style" id="Yes">Oui</button>
    <button class="button_style" id="No">Non</button>
</div>
  </div>
</div>
    </section>
   
    <section>
        <div class="menu">
            <button class="button_style"id="bt-img">Ajouter une image </button>
            <button class="button_style" id="video" >Ajouter une vidéo</button>
            <button class="button_style" id='bt'>Bloc de texte</button>
        </div>
    </section>
    <section>
      <div class ="content" id="content">
    
      </div>
      </section>
    <script src="../../Public/js/scriptArticle.js"></script>
  </body>
</html>