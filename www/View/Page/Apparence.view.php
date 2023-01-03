<?php
switch ($apparenceData["Css"]) {
    case 'electro':
        echo '<link rel="stylesheet" type="text/css" href="/Public/css/site-theme-electro.css">';

        break;
    case 'music':
        echo '<link rel="stylesheet" type="text/css" href="/Public/css/site-theme-music.css">';
        break;
    case 'sakura':
        echo '<link rel="stylesheet" type="text/css" href="/Public/css/site-theme-sakura.css">';
        break;
    default:
        echo '<link rel="stylesheet" type="text/css" href="/Public/css/site-theme-x.css">';
        break;
}
?>
<?php foreach ($configFormErrors as $error ):?>
                    <div>
                        <p><?= $error ?> </p>
                    </div>
                <?php endforeach;?>

<!-- TODO
Modifier la taille de la sidebar apparence => 250px -->
<section class="body">
    <header class="header">
        <div class="row">
            <div class="col col-2">
                <img style="width: 75px;" src="../uploads/<?= $site[0]['Logo'] ?>" alt="Logo" width="50" height="50">
            </div>
            <div class="col col-10">
                <nav class="nav row">
                    <ul class="col col-12" style="margin: 0;display : flex">
                        <div class="col col-3 center-text" style="cursor: pointer;">
                            <li style="border-bottom: 2px solid white;list-style : none;padding-bottom: 5px;">ACTUALITÉS</li>
                        </div>
                        <div class="col col-3 center-text" style="cursor: pointer;">
                            <li style="list-style: none">MANGAS</li>
                        </div>
                        <div class="col col-3 center-text" style="cursor: pointer;">
                            <li style="list-style: none">ANIME</li>
                        </div>
                        <div class="col col-3 center-text" style="cursor: pointer;">
                            <li style="list-style: none">PLANNING</li>
                        </div>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <section style="padding: 0px 50px;">
        <div class="grid">
            <div class="row">
                <div class="col">
                    <h1 class="titre">Le meilleur de l'actualité mangas et animes</h1>
                </div>
            </div>
        </div>
    </section>

    <section style="padding: 0px 50px;">
        <p class="paragraph">Après une saison d’automne marquée par le retour triomphal de Bleach et le lancement tant attendu de série populaires telles que Chainsaw Man ou encore Blue Lock, il est temps de nous intéresser aux nouveaux animes à venir cet hiver 2023, avec, comme vous allez pouvoir le constater, de très beaux titres au programme !</p>
        <p class="paragraph">Au total : c’est une soixantaine de séries et films d’animation qui seront proposés entre janvier et mars 2023, de tous genres et pour tous les goûts, de quoi satisfaire aussi bien les amateurs d’isekai, d’action, de drame ou encore de comédie.</p>
        <p class="paragraph">Parmi les suites attendues, on retrouve évidemment les immanquables saisons 2 de Vinland Saga et Tokyo Revengers, la troisième et dernière partie de Jojo’s Bizarre Adventure : Stone Ocean, la quatrième saison de Bungo Stray Dogs ainsi que le grand retour de Bofuri ou encore The Misfit of Demon King Academy.</p>
        <p class="paragraph">Au niveau des nouveautés, impossible de ne pas citer NieR: Automata, adapté du célèbre jeu vidéo du même nom, le premier isekai du studio MAPPA avec Campfire Cooking in Another World, quelques sympathiques romcom, à l’image de Tomo-chan is a Girl! ou The Angel Next Door Spoils Me Rotten, ou encore plusieurs projets originaux prometteurs, tels que REVENGER, La Dernière Aventure du Comte Lance-Dur et Giant Beasts of Ars.</p>
        <p class="paragraph">Comme vous l’aurez compris, ceci n’était qu’un petit aperçu des animes à venir lors de cet hiver 2023 ! Dès maintenant, découvrez le programme intégral ci-dessous pour être certain de ne manquer aucune nouveauté !</p>
    </section>

    <section style="padding: 0px 50px;">
    <div class="item-comment">
			<div class="row">
				<div class="col col-12">
					<div class="row">
						<div class="col">
							<h1>Commentaires</h1>
						</div>
					</div>
					<form action="" method="POST">
						<div class="row">
							<div class="col col-2">
								<p style="margin: 0;">Pseudo</p>
							</div>
							<div class="col col-10">
								<input type="text" id="fname" name="author" placeholder="Saisissez votre pseudo..." style="width: 100%">
							</div>
						</div>
						<div class="row">
							<div class="col col-2">
								<p style="margin: 0;">E-mail</p>
							</div>
							<div class="col col-10">
								<input type="text" id="lcomment" name="email" placeholder="Saisissez votre e-mail..." style="width: 100%">
							</div>
						</div>
						<div class="row">
							<div class="col col-2">
								<p style="margin: 0;">Message</p>
							</div>
							<div class="col col-10">
								<textarea id="lcomment" name="content" class="textarea-comments" cols="30" rows="10" placeholder="Saisissez votre message..." style="width: 100%"></textarea>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<input class="button-comment" name="add-comment" type="submit" value="Envoyer">
							</div>
						</div>
					</form>
				</div>
			</div>
            <div class="row">
				<div class="item-singleComment col col-12">
					<div class='item-duo'>
						<div class='initial-avatar' comment-author='Makan KAMISSOKO'>NP</div>
						<p class='item-author'> Makan KAMISSOKO </p>
						<p class='item-date'> 2023-01-01 00:00:00 </p>
					</div><br>
					<div class='item-content'>
						<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam omnis nostrum qui dicta eius sit quas ex aperiam accusamus provident numquam deleniti, fugit quia ratione mollitia nemo nam dolore hic!</p>
					</div><br>
					<a href='#' class='item-signal'>Signaler</a>
				</div>
			</div>
		</div>
    </section>

    <footer class="footer">
        <div class="row">
            <div class="col col-12">
                <nav class="nav">
                    <ul>
                        <li style="list-style : none;padding-bottom: 5px;cursor: pointer;">Actualités</li>
                        <li style="list-style : none;padding-bottom: 5px;cursor: pointer;">Mangas</li>
                        <li style="list-style : none;padding-bottom: 5px;cursor: pointer;">Anime</li>
                        <li style="list-style : none;padding-bottom: 5px;cursor: pointer;">Planning</li>
                    </ul>
                </nav>
            </div>
        </div>
    </footer>
</section>


<script>
    $().ready(function() {
        let colorPicker;
        window.addEventListener("load", startup(), false);
    })

    function startup() {
        titrecolorPicker = document.querySelector("#titrecolorPicker");
        paragraphecolorPicker = document.querySelector("#paragraphecolorPicker");
        navcolorPicker = document.querySelector("#navcolorPicker");
        bodycolorPicker = document.querySelector("#bodycolorPicker");
        titrefontFamily = document.querySelector("#titrefontFamily");
        paragraphefontFamily = document.querySelector("#paragraphefontFamily");
        headercolorPicker = document.querySelector("#headercolorPicker");
        footercolorPicker = document.querySelector("#footercolorPicker");

        titrecolorPicker.addEventListener("input", updateFirst, false);
        paragraphecolorPicker.addEventListener("input", updateFirst, false);
        navcolorPicker.addEventListener("input", updateFirst, false);
        bodycolorPicker.addEventListener("input", updateFirst, false);
        titrefontFamily.addEventListener("input", updateFirst, false);
        paragraphefontFamily.addEventListener("input", updateFirst, false);
        headercolorPicker.addEventListener("input", updateFirst, false);
        footercolorPicker.addEventListener("input", updateFirst, false);

    }

    function updateFirst(event) {
        switch (event.target.getAttribute('id')) {
            case 'titrecolorPicker':
                const titres = document.querySelectorAll("h1, h2, h3, h4, h5, h6");
                if (titres) {
                    titres.forEach(element => {
                        element.style.color = event.target.value;
                    });
                }
                break;
            case 'paragraphecolorPicker':
                const paragraphes = document.querySelectorAll(".paragraph");
                if (paragraphes) {
                    paragraphes.forEach(element => {
                        console.log(element);
                        element.style.color = event.target.value;
                    });
                }
                break;
            case 'navcolorPicker':
                const nav = document.querySelector(".nav");
                if (nav) {
                    nav.style.color = event.target.value;
                }
                break;
            case 'bodycolorPicker':
                const body = document.querySelector(".body");
                if (body) {
                    body.style.backgroundColor = event.target.value;
                }
                break;
            case 'titrefontFamily':
                console.log("titre font");
                const titresf = document.querySelectorAll("h1, h2, h3, h4, h5, h6");
                if (titresf) {
                    titresf.forEach(element => {
                        element.style.fontFamily = event.target.value;
                    });
                }
                break;
            case 'paragraphefontFamily':
                const paragraphesf = document.querySelectorAll(".paragraph");
                if (paragraphesf) {
                    paragraphesf.forEach(element => {
                        console.log(element);
                        element.style.fontFamily = event.target.value;
                    });
                }
                break;
            case 'headercolorPicker':
                console.log("titre font");
                const header = document.querySelectorAll(".header");
                if (header) {
                    header.forEach(element => {
                        element.style.backgroundColor = event.target.value;
                    });
                }
                break;
            case 'footercolorPicker':
                const footer = document.querySelectorAll(".footer");
                if (footer) {
                    footer.forEach(element => {
                        console.log(element);
                        element.style.backgroundColor = event.target.value;
                    });
                }
                break;
            default:
        }
    }
</script>