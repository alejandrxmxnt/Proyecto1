<div class="container">
  <div class="row">
    <div class="col-md-2">
    </div>
    <div class="col-md-10">
      <br>
      <a href="<?php echo base_url(); ?>index.php/administration/cliente/index">
        <button type="button" class="btn btn-success">
          Lista De Halibitados
        </button>
      </a>
      <br> <br>
      <h2 class="titulos_centro"> TABLA DE CLIENTES DESHABILITADOS </h2>
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>NOMBRES</th>
            <th>1° APELLIDO</th>
            <th>2° APELLIDO</th>
            <th>CI / NIT</th>
            <th>TELEFONO</th>
            <th>REFERENCIAS</th>
            <th>RAZON SOCIAL</th>
            <th>HABILITAR</th>

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
            <td><?php echo $row->nombre; ?></td>
            <td><?php echo $row->primerApellido; ?></td>
            <td><?php echo $row->segundoApellido; ?></td>
            <td><?php echo $row->ciNit; ?></td>
            <td><?php echo $row->telefono; ?></td>
            <td><?php echo $row->direccion; ?></td>
            <td><?php echo $row->razonSocial; ?></td>
            <td>
              
              <?php
                echo form_open_multipart('administration/cliente/habilitarbd');
            ?>

              <input type="hidden" value="<?php echo $row->id; ?>" name="idcliente">
              <button type="submit" class="btn btn-warning">Habilitar</button>

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