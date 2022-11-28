var prevScrollpos = window.pageYOffset;
window.onscroll = function() {
var currentScrollPos = window.pageYOffset;
if (prevScrollpos > currentScrollPos) {
document.getElementById("header").classList.remove('on');
}
else { document.getElementById("header").classList.add('on');
}
prevScrollpos = currentScrollPos;
}
function openTab(foodName) {
        var i;
        var x = document.getElementsByClassName("food");
        for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
        }
        document.getElementById(foodName).style.display = "block";
}
$( document ).ready(function() {
        $.get( "/live/bill/qtycart", function( data ) {
            if (data >0){
                $( ".result" ).html(data);
                
            }else{
                $( ".result" ).html();  
            }
        });
    });
