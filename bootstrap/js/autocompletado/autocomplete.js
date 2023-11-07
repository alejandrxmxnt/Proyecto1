$(document).ready(function(){

    // Initialice el autocompletado en el primer elemento de texto
    $( "#autouser" ).autocomplete({ 
       //con la opcion 'source' carga la lista de sugerencias
       source: function( request, response ) {
         // Envia la solicitud POST AJAX a "controlador de metodo userList"
         $.ajax({
           url: "<?php echo base_url(); ?>index.php/administration/autocomplete/userList",
           type: 'post',
           dataType: "json", //establece el tipo de datos: json y pase los valores de entrada como data
           data: {
             search: request.term
           },
           //en caso de devolución de llamada exitosa, pase la data en response() function
           success: function( data ) {
             response( data );
           }
         });
       },
       //con la opcion de select obtengo las sugenrencias seleccionadas
       select: function (event, ui) {
         // Set selection
         $('#autouser').val(ui.item.label); // display the selected text
         $('#cliente').val(ui.item.value); // save selected id to input
         return false;
       }
     });

   });