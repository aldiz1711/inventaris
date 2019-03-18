$(document).ready(function(){
    $("#dropbtn1").click(function(){
        if(document.getElementById("account").style.display == "block"){
            $("#account").css("display", "none");
        }else{
            $("#account").css("display", "block")
        }
    });
});
$(document).ready(function(){
    $("#dropbtn2").click(function(){
        if(document.getElementById("dashboard").style.display == "block"){
            $("#dashboard").css("display", "none");
        }else{
            $("#dashboard").css("display", "block")
        }
    });
});
