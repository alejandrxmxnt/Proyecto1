<div class="container">
  <div class="row">
    <div class="col-md-2">
    </div>
    <div class="col-md-10">
      <br>
      <a href="<?php echo base_url(); ?>index.php/administration/categoria/agregar">
        <button type="button" class="btn btn-primary" style="color">
          Nueva Categoria
        </button>
      </a>
      <a href="<?php echo base_url(); ?>index.php/administration/categoria/deshabilitados">
        <button type="button" class="btn btn-warning">
          Categoria Deshalibitadas
        </button>
      </a>
      <br> <br>
      <h2 class="titulos_centro" > CATEGORIAS </h2>
      <table class="table" > <!-- FONDO A LA TABLA -->
        <thead >
          <tr>
            <th>#</th>
            <th>NOMBRE</th>
            <th>DESCRIPCION</th>
            <th>CREADO</th>
            <th>ACTUALIZAR</th>
            <th>SOFT DELETE</th>
          </tr>
        </thead>
        <tbody>

          <?php
            $indice=1;
            foreach($categorias->result() as $row)
            {//impresion de valores de la data
              //acontinuacion de como se carga una tabla
          ?>
          
          <tr>
            <th><?php echo $indice; ?></th>
            <td><?php echo $row->nombre; ?></td>
            <td><?php echo $row->descripcion; ?></td>
            <td><?php echo $row->fechaRegistro; ?></td>
            <td>
              <?php
                echo form_open_multipart('administration/categoria/modificar');
            ?>

              <input type="hidden" value="<?php echo $row->id; ?>" name="idcategoria">
              <button type="submit" class="btn btn-success">Modificar</button>

            <?php
                echo form_close();
            ?>
            </td>

            <td>
              
              <?php
                echo form_open_multipart('administration/categoria/deshabilitarbd');
            ?>

              <input type="hidden" value="<?php echo $row->id; ?>" name="idcategoria">
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