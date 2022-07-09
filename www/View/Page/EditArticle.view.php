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
            <button class="button_style" id="myBtn">Quitter</button>
            <button  class="button_style">Enregistrer</button>
        </div>

<div id="modalEdit" class="modal">  
    <div id = "modal-edit" class = "modal-edit">
  <span class="close">&times;</span> 
  <div class = "choix-police">
      <p id="bold">Bold</p>
      <p id="italic">Italic</p>
      <p id="underline">Underline</p> 
      <button class="button-style" id="save-text">Sauvegarder</button>
      <button class="button-style" id="modifier">Modifier</button>

</div>
  <textarea rows = "15" cols="15" id = "input-area"></textarea>
</div>
</div>
<div id="myModal" class="modal">
  <div class="modal-content">
    <span class="modal-header">Voulez-vous quitter</span>
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
            <button class="button_style" >Ajouter une vidéo</button>
            <button class="button_style" id='bt'>Bloc de texte</button>
        </div>
    </section>
    <section>
      <div class ="content" id="content">
    
      </div>
      </section>
    <script src="../../Public/js/script.js"></script>

  </body>
</html>
