<div class="container">
  <div class="row">
    <div class="col-md-2">
    </div>
    <div class="col-md-10">
      <br>
      <a href="<?php echo base_url(); ?>index.php/administration/usuario/agregar">
        <button type="button" class="btn btn-primary">
          Crear Usuario
        </button>
      </a> <br> <br>
      <h2 class="titulos_centro"> TABLA DE USUARIOS </h2>
      <table class="table" id="my-table">
          <tr class="header-row" id="header-row">
            <th>#</th>
            <th>Nombre Completo</th>
            <th>Celular</th>
            <th>Cedula Identidad</th>
            <th>Usuario</th>
            <th>Rol</th>
            <th>Fecha de Registro</th>
            <th>Acciones</th>

          </tr>
          <?php
            $indice=1;
            foreach($usuarios->result() as $row)
            {//impresion de valores de la data
              //acontinuacion de como se carga una tabla
          ?>
          
          <tr class="fila-consejo">
            <th><?php echo $indice; ?></th>
            <td><?php echo $row->nombre." ".$row->primerApellido." ".$row->segundoApellido ?></td>
            <td><?php echo $row->celular; ?></td>
            <td><?php echo $row->ci; ?></td>
            <td><?php echo $row->login; ?></td>
            <td><?php echo $row->tipo; ?></td>
            <td><?php echo $row->fechaRegistro; ?></td>

            <td>
            <div class="d-flex" style="display: flex; justify-content: center; align-items: center;">
            <?php
                echo form_open_multipart('administration/usuario/modificar');
            ?>

              <input type="hidden" value="<?php echo $row->id; ?>" name="idusuario">
              <button type="submit" class="btn btn-success">
              <i class="fas fa-edit"></i>
              </button>

            <?php
                echo form_close();
            ?>

<?php
                echo form_open_multipart('administration/usuario/deshabilitarbd');
            ?>

              <input type="hidden" value="<?php echo $row->id; ?>" name="idusuario">
              <button type="submit" class="btn btn-danger">
              <i class="fas fa-trash"></i>
              </button>

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