<div class="container">
  <div class="row">
    <div class="col-md-2">
    </div>
    <div class="col-md-10">
      <br>
      <a href="<?php echo base_url(); ?>index.php/administration/cliente/index">
        <button type="button" class="btn btn-success">
          Lista De Halibitados
        </button>
      </a>
      <br> <br>
      <h2 class="titulos_centro"> TABLA DE CLIENTES DESHABILITADOS </h2>
      <div class="table-responsive"></div>
        <table class="table" id="my-table">
            <tr class="header-row" id="header-row">
              <th>#</th>
              <th>Nombre Completo</th>
              <th>CI / NIT</th>
              <th>Telefono</th>
              <th>Referencias</th>
              <th>Razón Social</th>
              <th>Acciones</th>
            </tr>
            <?php
              $indice=1;
              foreach($clientes->result() as $row)
              {//impresion de valores de la data
                //acontinuacion de como se carga una tabla
            ?>          
            <tr class="fila-consejo">
              <th><?php echo $indice; ?></th>
              <td><?php echo $row->nombre.' '.$row->primerApellido.' '.$row->segundoApellido; ?></td>
              <td><?php echo $row->ciNit; ?></td>
              <td><?php echo $row->telefono; ?></td>
              <td><?php echo $row->direccion; ?></td>
              <td><?php echo $row->razonSocial; ?></td>
              <td>
                <div class="d-flex" style="display: flex; justify-content: center; align-items: center;">
                  <?php
                    echo form_open_multipart('administration/cliente/habilitarbd');
                  ?>

                  <input type="hidden" value="<?php echo $row->id; ?>" name="idcliente">
                  <button type="submit" class="btn btn-warning"><i class="fas fa-reply-all"></i></button>

                  <?php
                    echo form_close();
                  ?>
                </div>
              </td>
          </tr>
            <?php
              $indice++;
              }
            ?>
        </table>
      </div>
      <!--PARA ALMACENAR LOS VALORES DE PAGINAS SIGUIENTES-->
      <div class="pagination" id="pagination-container">
      </div> <br> <br>

    </div>
  </div>
</div>

<!--STYLE PARA EL CAMBIO DE PAGINA-->
<style>

  .pagination {
      display: inline-block;
  }
  .pagination a {
      text-decoration: none;
      font-weight: bold;
      padding: 8px 16px;
      background-color: #f2f2f2;
      color: black;
      border: 1px solid #ddd;
      border-radius: 20%;
  }
  .pagination a.active {
      background-color: gray;
      color: white;
  }
</style>

<!--JS-->

<script src="<?php echo base_url();?>bootstrap/js/tablas/pagina.js"></script>

<script src="<?php echo base_url(); ?>bootstrap/js/buscador/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    //Captura del evento de cambio en el campo de busqueda
    $("#searchInput").on("input", function () {
      var valorBusqueda = $(this).val().toLowerCase(); //Obtener el valor de busqueda en minusculas
      //Filtra las filas de la tabla
      $(".fila-consejo").each(function () {
        var textoFila = $(this).text().toLowerCase(); //texto de la fila en minusculas
        if (textoFila.indexOf(valorBusqueda) === -1){
        $(this).hide(); //Oculta la fila si no coincide con la busqueda
      } else {
        $(this).show(); //Muestra la fila si coincide con la busqueda
      }
      });
    });
  });
</script>