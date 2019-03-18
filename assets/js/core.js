$(document).ready(function(){
    $("#dropbtn").click(function(){
        if(document.getElementById("test").style.display == "block"){
            $("#test").css("display", "none");
        }else{
            $("#test").css("display", "block")
        }
    });
});