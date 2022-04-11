function init(){

}

$(document).ready(function(){
    var usu_id = $('#user_idx').val();
  
    if ($('#rol_idx').val()==1) {
        $.post("../../controller/usuario.php?op=total", {usu_id : usu_id}, function(data){
            data = JSON.parse(data);
            $('#lbltotal').html(data.TOTAL)
        });
    
        $.post("../../controller/usuario.php?op=abierto", {usu_id : usu_id}, function(data){
            data = JSON.parse(data);
            $('#lblabiertos').html(data.TOTAL)
         });
    
         $.post("../../controller/usuario.php?op=cerrado", {usu_id : usu_id}, function(data){
            data = JSON.parse(data);
             $('#lblcerrados').html(data.TOTAL)
         });

         $.post("../../controller/usuario.php?op=grafico", {usu_id : usu_id}, function(data){
            data = JSON.parse(data);
            
            new Morris.Bar({
                element: 'divgrafico',
                data: data,
                xkey: 'nom',
                ykeys: ['total'],
                labels: ['Total']
            })
        });

        } else {
        $.post("../../controller/ticket.php?op=total", function(data){
            data = JSON.parse(data);
            $('#lbltotal').html(data.TOTAL)
        });
    
        $.post("../../controller/ticket.php?op=abierto", function(data){
            data = JSON.parse(data);
            $('#lblabiertos').html(data.TOTAL)
         });
    
         $.post("../../controller/ticket.php?op=cerrado", function(data){
            data = JSON.parse(data);
             $('#lblcerrados').html(data.TOTAL)
         });

         $.post("../../controller/ticket.php?op=grafico", function(data){
            data = JSON.parse(data);
           
            new Morris.Bar({
                element: 'divgrafico',
                data: data,
                xkey: 'nom',
                ykeys: ['total'],
                labels: ['Total']
            })

            
        });

        // $.post("../../controller/ticket.php?op=grafico1", function(data){
        //     data = JSON.parse(data);
           
        //     new Morris.Bar({
        //         element: 'divgrafico1',
        //         data: data,
        //         xkey: 'nom',
        //         ykeys: ['total'],
        //         labels: ['Total']
        //     })

            
        // });
        
    }

    

     


});

init();