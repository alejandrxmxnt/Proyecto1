<div class="container">
  <div class="row">
    <div class="col-md-2">
    </div>
    <div class="col-md-10">
      <br>
      <a href="<?php echo base_url(); ?>index.php/administration/producto/agregar">
        <button type="button" class="btn btn-primary" style="">
          Agregar nuevo Producto
        </button>
      </a>
      <a href="<?php echo base_url(); ?>index.php/administration/producto/deshabilitados">
        <button type="button" class="btn btn-warning">
          Lista Productos Deshalibitados
        </button>
      </a>
      <br> <br>
      <h2 class="titulos_centro" > TABLA DE PRODUCTOS </h2>
      <table class="table" id="my-table"> <!-- FONDO A LA TABLA -->
        <thead >
          <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio U/N</th>
            <th>Stock</th>
            <th>Imagen</th>
            <th>Creado</th>
            <th>Actualizar</th>
            <th>Eliminar</th>
          </tr>
        </thead>
        <tbody>

          <?php
            $indice=1;
            foreach($productos->result() as $row)
            {//impresion de valores de la data
              //acontinuacion de como se carga una tabla
          ?>
          
          <tr>
            <th><?php echo $indice; ?></th>
            <td><?php echo $row->nombre; ?></td>
            <td><?php echo $row->descripcion; ?></td>
            <td><?php echo $row->precioUnitario; ?></td>
            <td><?php echo $row->stock; ?></td>
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
                    <img width="100" src="<?php echo base_url(); ?>uploads/productos/<?php echo $foto; ?>">
                    <?php
                }
                ?>
                <?php
                  echo form_open_multipart('administration/producto/subirfoto');
                ?> <!--crear un boton para subir imagenes-->
                <input type="hidden" name="id" value="<?php echo $row->id; ?>">
                <button type="submit" class="btn btn-primary">Subir</button>
            
            </td>
            <td><?php echo $row->fechaRegistro; ?></td>
            <td>
              <?php
                echo form_open_multipart('administration/producto/modificar');
            ?>

              <input type="hidden" value="<?php echo $row->id; ?>" name="idcliente">
              <button type="submit" class="btn btn-success">Modificar</button>

            <?php
                echo form_close();
            ?>
            </td>

            <td>
              
              <?php
                echo form_open_multipart('administration/producto/deshabilitarbd');
            ?>

              <input type="hidden" value="<?php echo $row->id; ?>" name="idproducto">
              <button type="submit" class="btn btn-warning">Deshabilitar</button>

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

<script>
  const table = document.getElementById('my-table');
  const rows = table.getElementsByTagName('tr');
  const rowsPerPage = 3;//cantidad de filas a visualizar
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