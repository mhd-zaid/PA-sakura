
<head>
    <title>header</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" href="../../Public/css/article.css" />

</head>
<body>
<section>
    <div class="header-mobile">
        <img  src="img/art.svg" width="30px" height="30px"/>
        <span>Articles</span>
    </div>
</section>
<section>
    <div class = "header-container">
        <span>Articles</span>
        <img  src="../../Public/img/art.svg" width="50px" height="50px"/>
    </div>
</section>

<section>
    <div class="menu-article">
        <div class ="centre">
            <span id="click">Nouvel article</span>
<!--            <img  src="../../Public/img/art.svg" width="40px" height="40px"/>-->
        </div>

        <div>
            <label for="article">Rechercher</label>
            <input type="text" id="article" />
        </div>
    </div>
</section>
<section>
    <div class="container-article">
        <div class="articles">
            <img src="../Public/img/Joseph_Joestar_origamigne_Migne_Huynh.jpg" width = "75px" height = "100px" />
            <div class="article-bas">
                <span id="date">Il y a trois jours</span>
                <span id="title">Nouveautés</span>
            </div>
        </div>
        <div class="articles">
            <img src="../Public/img/Joseph_Joestar_origamigne_Migne_Huynh.jpg" width = "75px" height = "100px" />
            <div class="article-bas">
                <span id="date">Il y a trois jours</span>
                <span id="title">Nouveautés</span>
            </div>
        </div>
        <div class="articles">
            <img src="../Public/img/Joseph_Joestar_origamigne_Migne_Huynh.jpg" width = "75px" height = "100px" />
            <div class="article-bas">
                <span id="date">Il y a trois jours</span>
                <span id="title">Nouveautés</span>
            </div>
        </div>
        <div class="articles">
            <img src="../Public/img/Joseph_Joestar_origamigne_Migne_Huynh.jpg" width = "75px" height = "100px" />
            <div class="article-bas">
                <span id="date">Il y a trois jours</span>
                <span id="title">Nouveautés</span>
            </div>
        </div>
        <div class="articles">
            <img src="../Public/img/Joseph_Joestar_origamigne_Migne_Huynh.jpg" width = "75px" height = "100px" />
            <div class="article-bas">
                <span id="date">Il y a trois jours</span>
                <span id="title">Nouveautés</span>
            </div>
        </div>
    </div>
</section>
<script>
    $("#click").on("click",()=>{
        location.replace("edi");
    })
</script>
</body>

