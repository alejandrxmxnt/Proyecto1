<!doctype html>
<html>
  <head>
    <title>Autocomplete in CodeIgniter 3 with jQuery UI</title>
    <!-- agregar las librerias de jQuery UI CSS, jQuery y jQuery UI js script-->
    <!-- jQuery UI CSS --> 
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
  </head>
  <body>
    <!-- El primer elemento de texto se usa para inicializar el autocompletado -->
    Search User : <input type="text" id="autouser">

    <br><br>
    <!--El segundo elemento de texto se utiliza para mostrar el valor de la opcion seleccionada de la lista de sugerencias -->
    Selected user id : <input type="text" id="cliente" value='0' name="cliente">

    <!-- Script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- jQuery UI -->
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <!-- Script -->
    <script type='text/javascript'>
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
    </script>
  </body>
</html>