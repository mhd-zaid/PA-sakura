
<link rel="stylesheet" type="text/css" href="Public/css/main.css">

<!-- SECTION HERO -->
<section id="hero">
    <div class="container">
        <div class="intro">
            <h1 class="h1-section">Créez votre site<br>personalisé avec <span style="color :#FF66C4">Sakura<span></h1>            
            <p>Intégrez vos influences de l’animation japonaise !</p>
            <button class ="cta-button cta-button--white">Créer votre site web</button>
        </div>
       <img src="Public/img/Front/image_JOJO.svg" alt="logo-hero">
    </div>
</section>

<!-- SECTION ABOUT US -->
<section id="about-us">
    <div class="container">
        <div>
            <div>
                <img src="../../Public/img/Front/mini-logo.png" alt="">
            </div>
            <p>Sakura, inspiré des cerisiers ornementaux du Japon, est un CMS (Content Management System) permettant de créer des sites
                internets responsives (site vitrine, blog et portfolio) dans un environnement 100% manga. Ce CMS est entièrement gratuit.
            </p>
        </div>
        <div>
            <img src="../../Public/img/Front/Conan.svg" alt="">
        </div>
    </div>
</section>

<!-- SECTION FEATURES -->
<section id="features">
    <div class="container">
        
        <article class="feature">
            <div>
                <img class="features-img" src="Public/img/Front/responsive.jpg" alt="Responsive Design">
                <h1 class="h1-section-features">Responsive design</h1>
                <p>Offre une consultation confortable de votre<br>
                    site sur tous types d’appareils.</p>
            </div>
        </article>

        <article class="feature">
            <div>
                <img class="features-img" src="Public/img/Front/img_themes.webp" alt="Thèmes">
                <h1 class="h1-section-features">Thèmes 100% mangas</h1>
                <p>Découvrez une liste d’une dizaine de thèmes<br> 
                pour votre site inspirés de l’animation<br>
                japonaise.</p>
                <a href="" class="link-article">Trouvez votre thème</a>
            </div>
        </article>
        
        <article class="feature">
            <div>
                <img class="features-img" src="Public/img/Front/img_gestion_page_article.webp" alt="Gestion des pages et articles">
                <h1 class="h1-section-features">Gestion des pages et articles</h1>
                <p>Sakura facilite la gestion de vos contenus.<br>
                Vous pouvez créer des articles, des<br>
                pages, insérer des médias et les publier<br>
                en un simple clic.</p>
            </div>
        </article>

        <article class="feature">
            <div>
                <img class="features-img" src="Public/img/Front/img_statistiques.jpg" alt="Statistiques">
                <h1 class="h1-section-features">Statistiques</h1>
                <p>Possibilité de visualiser le trafic sur votre<br> 
                site internet en temps réel, les pages<br>
                vues, le taux de rebond ainsi que les<br>
                sources du trafic.</p>
            </div>
        </article> 
    </div>
    <button class="cta-button cta-button--pink">Créer votre site web</button>
</section>

<!-- SECTION CONTACT -->
<section id="form-contact">
    <div class="container">
        <div>
            <h1>Contact</h1>
            <p>Une remarque ? une suggestion ? N’hésitez-pas à m’écrire</p><br>
            <?php 
                $this->includeComponent("form-login", $configForm);
            ?><p>
        </div>
    </div>
</section>


