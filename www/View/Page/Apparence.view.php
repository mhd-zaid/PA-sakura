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
<section class="body">
    <header class="header">
        <div class="row">
            <div class="col col-2">
                <img style="width: 75px;" src="data:image/png;base64,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" alt="">
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
        <div class="row">
            <div class="col col-12">

                <div class="row">
                    <div class="col">
                        <h1 class="titre">Commentaires</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-2">
                        <p class="paragraph" style="margin: 0;">Pseudo</p>
                    </div>
                    <div class="col col-10">
                        <input type="text" name="" id="" placeholder="Saisissez votre pseudo..." disabled style="width: 100%">
                    </div>
                </div>
                <div class="row">
                    <div class="col col-2">
                        <p class="paragraph" style="margin: 0;">Message</p>
                    </div>
                    <div class="col col-10">
                        <textarea name="" id="" cols="30" rows="10" placeholder="Saisissez votre message..." disabled style="width: 100%"></textarea>
                    </div>
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
        window.addEventListener("load", startup, false);
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