$(document).ready(function(){
    $("#dropbtn1").click(function(){
        if(document.getElementById("account").style.display == "block"){
              $("#account").css("display", "none");
        }else{
          $("#account").css("display", "block");
        }
    });
});
$(document).ready(function(){
    $("#dropbtn2").click(function(){
        if(document.getElementById("barang").style.display == "block"){
            $("#barang").css("display", "none");
        }else{
            $("#barang").css("display", "block");
        }
    });
});
$(document).ready(function(){
    $("#dropbtn3").click(function(){
        if(document.getElementById("lokasi").style.display == "block"){
            $("#lokasi").css("display", "none");
        }else{
            $("#lokasi").css("display", "block");
        }
    });
});
