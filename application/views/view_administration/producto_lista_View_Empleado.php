<div class="container">
  <div class="row">
    <div class="col-md-2">
    </div>
    <div class="col-md-10">
      <br>
      <h2 class="titulos_centro" style="font-weight: 700;"> TABLA DE PRODUCTOS </h2>
      <table class="table" id="my-table"> <!-- FONDO A LA TABLA -->
          <tr class="header-row" id="header-row">
            <th>#</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio U/N Bs.</th>
            <th>Stock</th>
            <th>Imagen</th>
            <th>Registrado</th>
          </tr>

          <?php
            $indice=1;
            foreach($productos->result() as $row)
            {//impresion de valores de la data
              //acontinuacion de como se carga una tabla
          ?>
          
          <tr>
            <th><?php echo $indice; ?></th>
            <td style="text-align: left;">
                <?php 
                    $nombre = $row->nombre;
                    echo strtoupper(utf8_decode($nombre)); 
                ?>
            </td>
            <td style="text-align: left;">
                <?php 
                echo $row->descripcion; 
                ?>
            </td>
            <td>
                <?php
                    $precio = $row->precioUnitario; 
                    $ventaGeneral=number_format($precio, 2,',','.');
                    echo $ventaGeneral.' Bs.';
                ?>
            </td>
            <td>
                <?php 
                    $stockDisponible = $row->stock;
                    if($stockDisponible > 0) {
                        echo $stockDisponible;
                    }else{
                        echo '<span style="color: red; font-weight: 400;">(AGOTADO)</span>';
                    }
                ?>
            </td>
            <td>

                <?php 
                $foto=$row->foto;
                if($foto=="")//si foto esta igual a vacion sin imagen
                {//cargar una imagen en caso de no tener una imagen que sea vacio
                    ?>
                    <img width="100" src="<?php echo base_url(); ?>uploads/productos/vacio.jpg">
                    <?php
                }else {//caso contrario se proyectara la imagen
                    ?>
                    <img style="max-width: 100px; max-height: 50px;" src="<?php echo base_url(); ?>uploads/productos/<?php echo $foto; ?>">
                    <?php
                }
                ?>
            </td>
            <td><?php echo $row->fechaRegistro; ?></td>
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

<script>
  /*
  const table = document.getElementById('my-table');
  const rows = table.getElementsByTagName('tr');
  const rowsPerPage = 4;//cantidad de filas a visualizar
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