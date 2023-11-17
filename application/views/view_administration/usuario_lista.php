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
          
          <tr>
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

<!--PARA GENERAR EL EFECTO DE NUEVA PAGINA Y SE SIGAN CARGANDO LOS DATOS-->
<!--
<script src="<?php echo base_url();?>bootstrap/js/tablas/pagina.js"></script>
-->
<script>
  /*
  const table = document.getElementById('my-table');
  const rows = table.getElementsByTagName('tr');
  const rowsPerPage = 5;//cantidad de filas a visualizar
  const totalPages = Math.ceil(rows.length / rowsPerPage);
  let currentPage = 1;

  function showPage(page) {
      for (let i = 0; i < rows.length; i++) {
          if (i < (page * rowsPerPage) && i >= ((page - 1) * rowsPerPage)) {
              rows[i].style.display = '';
          } else {
              rows[i].style.display = 'none';
          }
      }
  }

  function generatePagination() {
      const paginationContainer = document.getElementById('pagination-container');
      let paginationHTML = '';

      for (let i = 1; i <= totalPages; i++) {
          paginationHTML += `<a href="#" onclick="changePage(${i})" ${i === currentPage ? 'class="active"' : ''}>${i}</a>`;
      }

      paginationContainer.innerHTML = paginationHTML;
  }

  function changePage(page) {
      currentPage = page;
      showPage(page);
      generatePagination();
  }

  showPage(currentPage);
  generatePagination();
  */
</script>
