$().ready(function() {
    $('.content-box p').addClass('paragraph');
    $('.content-box h1,.content-box h2,.content-box h3,.content-box h4,.content-box h5,.content-box h6').addClass('titre');

    $('.initial-avatar').each(function(){
        var colours = [
            "#1abc9c", "#2ecc71", "#3498db", "#9b59b6", "#34495e", "#16a085", "#27ae60", "#2980b9", "#8e44ad", "#2c3e50", 
            "#f1c40f", "#e67e22", "#e74c3c", "#95a5a6", "#f39c12", "#d35400", "#c0392b", "#bdc3c7", "#7f8c8d"
        ]
        let i = Math.floor(Math.random() * colours.length);
        let authorName = $(this).attr('comment-author').toUpperCase().split(' ');
        console.log(authorName);
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
})