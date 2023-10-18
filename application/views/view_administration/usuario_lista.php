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
        <thead>
          <tr>
            <th>#</th>
            <th>Nombre Completo</th>
            <th>Celular</th>
            <th>Cedula Identidad</th>
            <th>Usuario</th>
            <th>Rol</th>
            <th>Fecha de Registro</th>
            <th>Modificar</th>
            <th>Eliminar</th>

          </tr>
        </thead>
        <tbody>

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
              <?php
                echo form_open_multipart('administration/usuario/modificar');
            ?>

              <input type="hidden" value="<?php echo $row->id; ?>" name="idusuario">
              <button type="submit" class="btn btn-success">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                </svg>
              </button>

            <?php
                echo form_close();
            ?>
            </td>

            <td>
              
              <?php
                echo form_open_multipart('administration/usuario/deshabilitarbd');
            ?>

              <input type="hidden" value="<?php echo $row->id; ?>" name="idusuario">
              <button type="submit" class="btn btn-danger">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                </svg>
              </button>

            <?php
                echo form_close();
            ?>

            </td>

          </tr>

          <?php
            $indice++;
            }
          ?>

        </tbody>
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
</script>
