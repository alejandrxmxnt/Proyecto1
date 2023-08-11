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
            <th>Nombre</th>
            <th>1° Apellido</th>
            <th>2° Apellido</th>
            <th>Celular</th>
            <th>Ci</th>
            <th>Usuario</th>
            <th>Contraseña</th>
            <th>Rol</th>
            <th>Fecha de Registro</th>
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
            <td><?php echo $row->nombre; ?></td>
            <td><?php echo $row->primerApellido; ?></td>
            <td><?php echo $row->segundoApellido; ?></td>
            <td><?php echo $row->celular; ?></td>
            <td><?php echo $row->ci; ?></td>
            <td><?php echo $row->userName; ?></td>
            <td><?php echo $row->password; ?></td>
            <td><?php echo $row->idRol; ?></td>
            <td><?php echo $row->fechaRegistro; ?></td>
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