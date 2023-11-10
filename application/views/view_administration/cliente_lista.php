<!--Librerias Bootstrap-->
<!--
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
-->
<!--Hasta aqui librerias Bootstrap-->
<style>
  @media screen and (max-width: 1170px) {
    main {
      max-width: 800px;
      width: 100%;
      margin: auto;
      padding: 40px;
    }
    /*Modificacion para responsibidad de columnas*/
    .columna1 {
      width: 8.33%;
    }
    .columna2 {
      width: 91.67%;
    }
        
  }
</style>

<div class="container">
  <div class="row">
    <div class="col-md-2 columna1">
    </div>
    <div class="col-md-10 columna2">
      <br>
      <a href="<?php echo base_url(); ?>index.php/administration/cliente/agregar">
        <button type="button" class="btn btn-primary" style="color">
          Agregar Cliente
        </button>
      </a>
      <a href="<?php echo base_url(); ?>index.php/administration/cliente/deshabilitados">
        <button type="button" class="btn btn-warning">
          Lista Deshalibitados
        </button>
      </a>
      <br> <br>
      <h2 class="titulos_centro" > TABLA DE CLIENTES </h2>
      <div class="table-responsive">
      <table class="table" id="my-table"> <!-- FONDO A LA TABLA -->
          <tr class="header-row" id="header-row">
            <th>#</th>
            <th>Nombre Completo</th>
            <th>CI / NIT</th>
            <th>Telefono</th>
            <th>Referencias</th>
            <th>Razón Social</th>
            <th>Fecha Registro</th>
            <th>Acciones</th>
          </tr>

          <?php
            $indice=1;
            foreach($clientes->result() as $row)
            {//impresion de valores de la data
              //acontinuacion de como se carga una tabla
          ?>
          
          <tr>
            <th><?php echo $indice; ?></th>
            <td><?php echo $row->nombre." ".$row->primerApellido." ".$row->segundoApellido ?></td>
            <td><?php echo $row->ciNit; ?></td>
            <td><?php echo $row->telefono; ?></td>
            <td><?php echo $row->direccion; ?></td>
            <td><?php echo $row->razonSocial; ?></td>
            <td><?php echo $row->fechaRegistro; ?></td>
            <td>
              <div class="d-flex" style="display: flex; justify-content: center; align-items: center;">
                <?php
                  echo form_open_multipart('administration/cliente/modificar');
                ?>

                <input type="hidden" value="<?php echo $row->id; ?>" name="idcliente">
                <button type="submit" class="btn btn-success"><i class="fas fa-edit"></i></button> 

                <?php
                  echo form_close();
                ?>

                <?php
                  echo form_open_multipart('administration/cliente/deshabilitarbd');
                ?>

                <input type="hidden" value="<?php echo $row->id; ?>" name="idcliente">
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>

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

<!--JS
<script src="<?php echo base_url();?>bootstrap/js/tablas/pagina.js"></script>-->

<script>
  /*
  const table = document.getElementById('my-table');
  const rows = table.getElementsByTagName('tr');
  const rowsPerPage = 8;//cantidad de filas a visualizar
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
