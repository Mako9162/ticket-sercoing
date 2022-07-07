function init(){

}

$(document).ready(function() {
   

});

$(document).on("change", "#perfil", function() {
   
    if ($('#perfil').val()=="1"){
        $('#rol_id').val(1);
        $("#imgtipo").attr("src", "public/1.png");
    }else if ($('#perfil').val()=="2"){
        $('#rol_id').val(2);
        $("#imgtipo").attr("src", "public/2.png");
    }else{
        $('#rol_id').val(3);
        $("#imgtipo").attr("src", "public/2.png");
    }
    
});


init();