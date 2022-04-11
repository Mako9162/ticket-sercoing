var tabla;

function init(){
    $("#categoria_form").on("submit",function(e){
        guardaryeditar(e);	
    });
}

function guardaryeditar(e){
    e.preventDefault();
	var formData = new FormData($("#categoria_form")[0]);
    $.ajax({
        url: "../../controller/categoria.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(datos){    
            console.log(datos);
            $('#categoria_form')[0].reset();
            $("#modalcategoria").modal('hide');
            $('#categoria_data').DataTable().ajax.reload();

            swal({
                title: "SolicitudeTI!",
                text: "Registrado correctamente",
                type: "success",
                confirmButtonClass: "btn-success"
            });    
        }
    });
}

$(document).ready(function(){

        tabla=$('#categoria_data').dataTable({
            "aProcessing": true,
            "aServerSide": true,
            dom: 'Bfrtip',
            "searching": true,
            lengthChange: false,
            colReorder: true,
            buttons: [		          
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5'
                    ],
            "ajax":{
                url: '../../controller/categoria.php?op=listar',
                type : "post",
                dataType : "json",	
              						
                error: function(e){
                    console.log(e.responseText);	
                }
            },
            "bDestroy": true,
            "responsive": true,
            "bInfo":true,
            "iDisplayLength": 6,
            "autoWidth": false,
            "language": {
                "sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "Ningún dato disponible en esta tabla",
                "sInfo":           "Mostrando un total de _TOTAL_ registros",
                "sInfoEmpty":      "Mostrando un total de 0 registros",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":    "",
                "sSearch":         "Buscar:",
                "sUrl":            "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            }     
        }).DataTable(); 
     
    
});

function editar(cat_id){
    $('#mdltitulo').html('Editar Registro');

    $.post("../../controller/categoria.php?op=mostrar", {cat_id : cat_id}, function (data) {
        data = JSON.parse(data);
        $('#cat_id').val(data.cat_id);
        $('#cat_nom').val(data.cat_nom);
    }); 

    $('#modalcategoria').modal('show');
}

function eliminar(cat_id){
    swal({
        title: "SolicitudeTI",
        text: " A continuación eliminará una categoría",
        type: "error",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Si",
        cancelButtonText: "No",
        closeOnConfirm: false      
    },
    function(isConfirm) {
        if (isConfirm) {
            $.post("../../controller/categoria.php?op=eliminar", {cat_id : cat_id}, function(data){
                
            });

            $('#categoria_data').DataTable().ajax.reload();

            swal({
                title: "SolicitudeTI!",
                text: "Eliminado correctamente",
                type: "success",
                confirmButtonClass: "btn-success"
            });

        }
    });
}

$(document).on("click", "#btnnuevo", function(){
    $('#mdltitulo').html('Nuevo registro');
    $('#categoria_form')[0].reset();
    $('#modalcategoria').modal('show');
});

init();