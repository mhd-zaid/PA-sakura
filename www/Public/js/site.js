$().ready(function() {
    //Menu button (Fronttpl)
    $("#menu-button-site").on("click", function () {
        console.log("btn preview");
        var menu = document.getElementById("main-nav-site");
        menu.classList.toggle("visible");
    });

    //Affectation du style
    $('.content-box p').addClass('paragraph');
    $('.content-box h1,.content-box h2,.content-box h3,.content-box h4,.content-box h5,.content-box h6').addClass('titre');

    $('.content-page p, .content-page a').addClass('paragraph');
    $('.site-name, nav ul li a').addClass('nav');
    $('.sk-navbar').addClass('header');

    $('.content-page h1,.content-page h2,.content-page h3,.content-page h4,.content-page h5,.content-page h6').addClass('titre');

    //Création d'avatar en lettre
    $('.initial-avatar').each(function(){
        var colours = [
            "#1abc9c", "#2ecc71", "#3498db", "#9b59b6", "#34495e", "#16a085", "#27ae60", "#2980b9", "#8e44ad", "#2c3e50", 
            "#f1c40f", "#e67e22", "#e74c3c", "#95a5a6", "#f39c12", "#d35400", "#c0392b", "#bdc3c7", "#7f8c8d"
        ]
        let i = Math.floor(Math.random() * colours.length);
        let authorName = $(this).attr('comment-author').toUpperCase().split(' ');
        if (authorName.length == 1) {
            initials = authorName[0] ? authorName[0].charAt(0):'?';
        } else if(authorName.length == 2){
            initials = authorName[0].charAt(0) + authorName[1].charAt(0);
        }else{
            initials = authorName[0].charAt(0) + authorName[1].charAt(0) + authorName[2].charAt(0);
        }
        $(this).html(initials);
        $(this).css('background-color',colours[i]);
    });

    //Session flash
    $("#close-flash").on("click", function () {
        var flash = document.getElementById("flash-msg");
        var container = document.getElementsByTagName("body");
        container.removeChild(flash);
    });
    setTimeout(function () {
        $("#flash-msg").remove();
    }, 3000);

    // $('#select-category').on('change', func)
    
})