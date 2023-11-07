<style>
  /* Estilos para la contenedor de tabla responsive */
  .table-responsive {
      max-width: 100%;
      overflow-x: auto;
  }

  /* Estilos para la tabla */
  .table {
      border-collapse: collapse;
      width: 100%;
      opacity: 0.9; /* Transparencia de la tabla */
      border: 15px solid #333; /* Borde de 15px y color oscuro */
      border-radius: 15px; /* Borde redondeado de 15px */
      font-size: 10px; /* Tamaño de letra de 10px */
  }

  /* Estilos para las filas de la tabla */
  .table tr {
      background-color: #f5f5f5;
      line-height: 1; /* Puedes ajustar el valor según tus preferencias, por ejemplo, 1.2 o 1.5 para un interlineado mayor. */
      border-spacing: 5px;
  }

  /* Estilos para las celdas de la tabla */
  .table td, .table th {
      padding: 5px;
      border: 1px solid #ccc;
      text-align: center; /* Alinear el texto al centro */
      font-size: 14px;
      line-height: 1; /* Puedes ajustar el valor según tus preferencias. */
  }

  /* Estilos para las celdas de encabezado */
  .table th {
      background-color: #333; /* Color oscuro para las celdas de encabezado */
      color: #fff; /* Texto en color blanco en las celdas de encabezado */
  }

  /* Estilos para las celdas de la tabla en modo hover */
  .table tr:hover {
      background-color: #e0e0e0;
  }
</style>

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
      
      <div class="table-responsive">
        <table class="table" id="my-table">
            <tr class="header-row" id="header-row">
                <th>#</th>
                <th>CLIENTE</th>
                <th>CI/NIT</th>
                <th>TELEFONO</th>
                <th>REFERENCIA</th>
                <th>RAZON SOCIAL</th>
                <th>FECHA REGISTRO</th>
                <th>ACCIONES</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Marcelo Montero</td>
                <td>9878654</td>
                <td>77657851</td>
                <td>Av. America entre calle Ruben dario</td>
                <td></td>
                <td>2023-10-15 23:22:55</td>
                <td>
                  <div class="d-flex">
                    <button class="btn btn-primary"><i class="fas fa-edit" style=""></i></button>
                    <button class="btn btn-danger small-button"><i class="fas fa-edit"></i></button>
                  </div>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>Eduardo Aguirre Saavedra</td>
                <td>9434770</td>
                <td>67541840</td>
                <td></td>
                <td></td>
                <td>2023-10-15 23:29:46</td>
                <td>
                  <div class="d-flex">
                    <button class="btn btn-primary"><i class="fas fa-edit"></i></button>
                    <button class="btn btn-danger"><i class="fas fa-edit"></i></button>
                  </div>
                </td>
            </tr>
            <tr>
                <td>3</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                  <div class="d-flex">
                    <button class="btn btn-primary"><i class="fas fa-edit"></i></button>
                    <button class="btn btn-danger"><i class="fas fa-edit"></i></button>
                  </div>
                </td>
            </tr>
            <tr>
                <td>4</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                  <div class="d-flex">
                    <button class="btn btn-primary"><i class="fas fa-edit"></i></button>
                    <button class="btn btn-danger"><i class="fas fa-edit"></i></button>
                  </div>
                </td>
            </tr>
            <tr>
                <td>5</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                  <div class="d-flex">
                    <button class="btn btn-primary"><i class="fas fa-edit"></i></button>
                    <button class="btn btn-danger"><i class="fas fa-edit"></i></button>
                  </div>
                </td>
            </tr>
            <tr>
              <td>6</td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td>
                <div class="d-flex">
                  <button class="btn btn-primary"><i class="fas fa-edit"></i></button>
                  <button class="btn btn-danger"><i class="fas fa-edit"></i></button>
                </div>
              </td>
          </tr>
          <tr>
            <td>7</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>
              <div class="d-flex">
                <button class="btn btn-primary"><i class="fas fa-edit"></i></button>
                <button class="btn btn-danger"><i class="fas fa-edit"></i></button>
              </div>
            </td>
        </tr>
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

<!--PARA GENERAR EL EFECTO DE NUEVA PAGINA Y SE SIGAN CARGANDO LOS DATOS-->
<!--
<script src="<?php echo base_url();?>bootstrap/js/tablas/pagina.js"></script>
-->
<script>
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
  
</script>

<script>
  let dataTable; //ALMACENA LA DATA
  let dataTableIsInitialized=false; //para saber si esta inicializada

  const initDataTable=async()=> {
    if(dataTableIsInitialized) {
      dataTable.destroy();
    }

    //await listDatos(); // si la data lla llega al formulario esta no es necesaria

    //dataTable=$("#my-table").dataTable({});
    const table = document.getElementById('my-table');
    table.dataTable({});
    dataTableIsInitialized = true;
  };

</script>
