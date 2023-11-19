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
          
          <tr class="fila-consejo">
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