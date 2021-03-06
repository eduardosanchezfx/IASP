$.ajaxSetup({
     headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')     
     }
 }); 
//popover de botones
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
//ajax en almacenamientos
$(document).ready(function(){
    $('#store').click(function(){
        event.preventDefault();
        //tomamos valores de los input
        var almacen_id = $("#almacen_id").val();
        var product_id = $("#product_id").val();
        var stock = $("#stock").val();
        
        
        $.ajax({
                type:'ajax',
                url:'/Almacenamiento',//ruta de envio
                type:'POST',
                dataType:'json',
                data:{almacen_id:almacen_id,product_id:product_id,stock:stock},
                
                success:function(response){
                  alert('Producto Ingresado a la BD, recargue para visualizar la actualización');
                    //vacia los input para poder ingresar otro producto
                  var stock = $("#stock").val("");
                },
                error:function(x,xs,xt){
                    //nos dara el error si es que hay alguno
                    alert(JSON.stringify(x));
                    alert('error: ' + JSON.stringify(x) +"\n error string: "+ xs + "\n error throwed: " + xt);
                }
        })
    })
})


//datatables
  var table = $('#example1').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true,
      'responsive'  : true,
      buttons: [
        'copy', 'print', 'excel', 'pdf'
    ],
      language: {
        "decimal": "",
        "emptyTable": "No hay información!!",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        "infoEmpty": "Mostrando 0 to 0 de 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Entradas",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
        }
       }
       
    });
//select2
$('.select2').select2();
//pop window
 $(document).ready(function(){
               $("a.editar").click(function() {
                  url = $(this).attr("href");
                  window.open(url, '_blank','width=465,height=666,resizable=false');
                  return false;
               });
            });
//datepicker
$('.datepicker').datepicker({
                  format: "dd/mm/yyyy",
                  language: "es",
                  autoclose: true
              });
//toastr multiple
toastr.options = {
    "preventDuplicates": true
}
//ajax de envios
$(document).ready(function(){
    $('#store').click(function(){
        event.preventDefault();
        //tomamos valores de los input
        var almacen_id = $("#almacen_id").val();
        var storage_id = $("#storage_id").val();
        var user_id = $("#user_id").val();
        var numero_guia = $("#numero_guia").val();
        var cantidad_inicial = $("#cantidad_inicial").val();
        var comentario = $("#comentario").val();
        var example = $("#example1").val();
        var cantidad_inicial = $("#cantidad_inicial").val();
        
        $.ajax({
                type:'ajax',
                url:'/Envio',//ruta de envio
                type:'POST',
                dataType:'json',
                data:{almacen_id:almacen_id,storage_id:storage_id,user_id:user_id,numero_guia:numero_guia,cantidad_inicial:cantidad_inicial,comentario:comentario,cantidad_incial:cantidad_inicial},
                
                success:function(response){
                  alert('Producto Ingresado a la BD, No recargue si desea ingresar productos en una misma orden de envio');
                    //vacia los input para poder ingresar otro producto
                  var cantidad_inicial = $("#cantidad_inicial").val("");
                  var comentario = $("#comentario").val("");
                  var cantidad_inicial = $("#cantidad_inicial").val("");
                  
                },
                error:function(x,xs,xt){
                    //nos dara el error si es que hay alguno
                    alert(JSON.stringify(x));
                    alert('error: ' + JSON.stringify(x) +"\n error string: "+ xs + "\n error throwed: " + xt);
                }
        })
    })
})
