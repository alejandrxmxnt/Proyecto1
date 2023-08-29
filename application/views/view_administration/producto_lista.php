<div class="container">
  <div class="row">
    <div class="col-md-2">
    </div>
    <div class="col-md-10">
      <br>
      <a href="<?php echo base_url(); ?>index.php/administration/producto/agregar">
        <button type="button" class="btn btn-primary" style="color">
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
      <table class="table" > <!-- FONDO A LA TABLA -->
        <thead >
          <tr>
            <th>#</th>
            <th>NOMBRES</th>
            <th>DESCRIPCION</th>
            <th>PRECIO U/N</th>
            <th>STOCK</th>
            <th>IMAGEN</th>
            <th>CREADO</th>
            <th>ACTUALIZAR</th>
            <th>SOFT DELETE</th>
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
                {
                    ?>
                    <img width="100" src="<?php echo base_url(); ?>uploads/productos/vacio.jpg">
                    <?php
                }
                
                else
                {
                    ?>
                    <img width="100" src="<?php echo base_url(); ?>uploads/productos/<?php echo $foto; ?>">
                    <?php
                }
                ?>
                <?php

                ?>
            
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

              <input type="hidden" value="<?php echo $row->id; ?>" name="idcliente">
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
    </div>
  </div>
</div>