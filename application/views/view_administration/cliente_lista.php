<div class="container">
  <div class="row">
    <div class="col-md-2">
    </div>
    <div class="col-md-10">
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
      <table class="table" > <!-- FONDO A LA TABLA -->
        <thead >
          <tr>
            <th>#</th>
            <th>NOMBRE COMPLETO</th>
            <th>CI / NIT</th>
            <th>TELEFONO</th>
            <th>REFERENCIAS</th>
            <th>RAZON SOCIAL</th>
            <th>FECHA DE REGISTRO</th>
            <th>ACTUALIZAR</th>
            <th>DESHABILITAR</th>
          </tr>
        </thead>
        <tbody>

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
              <?php
                echo form_open_multipart('administration/cliente/modificar');
            ?>

              <input type="hidden" value="<?php echo $row->id; ?>" name="idcliente">
              <button type="submit" class="btn btn-success">Modificar</button>

            <?php
                echo form_close();
            ?>
            </td>

            <td>
              
              <?php
                echo form_open_multipart('administration/cliente/deshabilitarbd');
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