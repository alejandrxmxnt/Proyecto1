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
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Nombre Completo</th>
            <th>Celular</th>
            <th>Ci</th>
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
              <button type="submit" class="btn btn-success">Modificar</button>

            <?php
                echo form_close();
            ?>
            </td>

            <td>
              
              <?php
                echo form_open_multipart('administration/usuario/deshabilitarbd');
            ?>

              <input type="hidden" value="<?php echo $row->id; ?>" name="idusuario">
              <button type="submit" class="btn btn-danger">Eliminar</button>

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