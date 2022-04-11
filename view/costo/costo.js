var tabla;

function init(){
    $("#costo_form").on("submit",function(e){
        guardaryeditar(e);	
    });
}

function guardaryeditar(e){
    e.preventDefault();
	var formData = new FormData($("#costo_form")[0]);
    $.ajax({
        url: "../../controller/costo.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(datos){    
            console.log(datos);
            $('#costo_form')[0].reset();
            $("#modalcosto").modal('hide');
            $('#costo_data').DataTable().ajax.reload();

            swal({
                title: "SolicitudesTI",
                text: "Registrado correctamente",
                type: "success",
                confirmButtonClass: "btn-success"
            });    
        }
    });
}

$(document).ready(function(){

        tabla=$('#costo_data').dataTable({
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
                url: '../../controller/costo.php?op=listar',
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

function editar(cos_id){
    $('#mdltitulo').html('Editar Registro');

    $.post("../../controller/costo.php?op=mostrar", {cos_id : cos_id}, function (data) {
        data = JSON.parse(data);
        $('#cos_id').val(data.cos_id);
        $('#cos_nom').val(data.cos_nom);
    }); 

    $('#modalcosto').modal('show');
}

function eliminar(cos_id){
    swal({
        title: "SolicitudesTI",
        text: " A continuaciòn eliminará un contrato",
        type: "error",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Si",
        cancelButtonText: "No",
        closeOnConfirm: false      
    },
    function(isConfirm) {
        if (isConfirm) {
            $.post("../../controller/costo.php?op=eliminar", {cos_id : cos_id}, function(data){
                
            });

            $('#costo_data').DataTable().ajax.reload();

            swal({
                title: "SolicitudesTI!",
                text: "eliminado correctamente",
                type: "success",
                confirmButtonClass: "btn-success"
            });

        }
    });
}

$(document).on("click", "#btnnuevo", function(){
    $('#mdltitulo').html('Nuevo registro');
    $('#costo_form')[0].reset();
    $('#modalcosto').modal('show');
});

init();