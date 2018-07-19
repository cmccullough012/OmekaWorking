/*
function mobileFriendlyOld(id1, id2) {
    var x = window.matchMedia("(max-width: 450px)");
    var large = document.getElementById(id1).innerHTML;
    var small = document.getElementById(id2).innerHTML;
    
    if (x.matches) { // If media query matches
        document.getElementById("banner_wrapper").style.backgroundImage = 'url(../../files/theme_uploads/' + small + ')';
    } else {
        document.getElementById("banner_wrapper").style.backgroundImage = 'url(../../files/theme_uploads/' + large + ')';
    }
}



const BANNER = document.querySelector("#banner_wrapper"); 
const mq = window.matchMedia("(max-width:450px)");


function mobileFriendly(){
    var large = document.querySelector("#hide #banner_img").textContent;
    var small = document.querySelector("#hide #mobile_ban").textContent;
    
    if (x.matches){
        var source = "url(../../files/theme_uploads/" + small + ")";
        BANNER.style.backgroundImage = source;
    } else {
        var source2 = "url(../../files/theme_uploads/" + large + ")";
        BANNER.style.backgroundImage = source2;
    }
}


mq.addEventListener("matches", mobileFriendly,false);
*/

const BANNER = document.querySelector("#banner_wrapper"); 
const mq = window.matchMedia("(max-width:450px)");
var large = document.querySelector("#hide #banner_img").textContent;
var small = document.querySelector("#hide #mobile_ban").textContent;
    
    if (x.matches){
        var source = 'url("../../files/theme_uploads/"' + small + '")';
        BANNER.style.backgroundImage = source;
        console.log(source);
    } else {
        var source2 = 'url("../../files/theme_uploads/"' + large + '")';
        BANNER.style.backgroundImage = source2;
        console.log(source2);
    }