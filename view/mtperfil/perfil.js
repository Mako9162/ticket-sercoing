function init(){

}

$(document).ready(function() {
    var usu_id = $('#user_idx').val();

    $.post("../../controller/usuario.php?op=mostrar1", {usu_id : usu_id}, function (data) {
        data = JSON.parse(data);
        $('#usu_nom').val(data.usu_nom);
        $('#usu_ape').val(data.usu_ape);
        $('#usu_correo').val(data.usu_correo);
       
    }); 

});



$(document).on("click", "#btnactualizar", function(){
    var pass = $("#txtpass").val();
    var newpass = $("#txtpassnew").val();

    if (pass.length == 0 || newpass == 0){
        swal("SolicitudesTI", "Campos vacíos", "error")
    }else{
        if (pass == newpass){
            
            var usu_id = $('#user_idx').val();
            $.post("../../controller/usuario.php?op=password",{usu_id : usu_id, usu_pass:newpass}, function(data){
            });
            swal("SolicitudesTI", "Actualizado correctamente", "success")
        }else{
            swal("SolicitudesTI", "Error, las contraseñas no coinciden", "error")
        }
    }

});

init();
