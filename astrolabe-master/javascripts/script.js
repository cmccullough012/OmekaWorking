function mobileFriendly(id1, id2) {
    var x = window.matchMedia("(max-width: 450px)");
    var large = document.getElementById(id1).innerHTML;
    var small = document.getElementById(id2).innerHTML;
    
    if (x.matches) { // If media query matches
        document.getElementById("banner_wrapper").style.backgroundImage = 'url(../../files/theme_uploads/' + small + ')';
    } else {
        document.getElementById("banner_wrapper").style.backgroundImage = 'url(../../files/theme_uploads/' + large + ')';
    }
}


function screenSize(x) {
    var path = "url(../../files/theme_uploads/";
    var close = ")"
    
    var largePath = path.concat(large);
    largePath = path.concat(close);
    
    var smallPath = path.concat(small);
    smallPath = path.concat(close);
}
