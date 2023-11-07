<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

<div class="container">
  <div class="row">
    <div class="col-md-2">
    </div>
    <div class="col-md-10">
      <br>

      <div class="x_panel">
    <div class="x_title">
    <h2>Lista de los clientes</h2>
    <ul class="nav navbar-right panel_toolbox">
        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
        </li>
        <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><b>OPCIONES</b></a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="<?php echo base_url();?>index.php/cliente/agregarClienteLte">Agregar Cliente</a>
            <a class="dropdown-item" href="<?php echo base_url();?>index.php/cliente/deshabilitados">deshabilitados</a>
            </div>
        </li>
        <li><a class="close-link"><i class="fa fa-close"></i></a>
        </li>
    </ul>
    <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <div class="row">
            <div class="col-sm-12">
            <div class="card-box table-responsive">
    <p class="text-muted font-13 m-b-30">
        The Buttons extension for DataTables provides a common set of options, API methods and styling to display buttons on a page that will interact with a DataTable. The core library provides the based framework upon which plug-ins can built.
    </p>
    <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
        <thead>
        <tr>
            <th>N°</th>
            <th>Ci/Nit</th>
            <th>Razón Social</th>
            <th>FechaRegistro</th>
            <th>Modificar</th>
            <th>Eliminar</th>
        </tr>
        </thead>


        <tbody>
        <?php/*
            $indice=1;
                foreach($cliente->result() as $row)//la variable categoria tiene que se igual al controlador categoria linea 9
                {
*/            ?>
            <tr>
                <td><?php// echo $indice?></td>
                <td><?php// echo $row->ciNit; ?></td>
                <td><?php// echo $row->razonSocial; ?></td>
                <td><?php// echo $row->fechaRegistro; ?></td>
                <!--COLUMNA MODIFICAR-->
                <td class="text-center">
                        <?php
                            echo form_open_multipart('cliente/modificar');//manda al controlador categoria metoodo eliminarbd
                        ?>
                            <input type="hidden" name="idcliente" value="<?php// echo $row->idCliente;?>">
                            <button type="submit" class="btn btn-outline-warning">modificar</button>
                        <?php
                            //echo form_close();
                        ?>
                </td>
                <!--COLUMNA ELIMINAR SOFTDELETE-->
                <td class="text-center">
                        <?php
                            echo form_open_multipart('cliente/deshabilitarbd');//manda al controlador categoria metoodo deshabilitarbd
                        ?>
                            <input type="hidden" name="idcliente" value="<?php // echo $row->idCliente;?>">
                            <button type="submit" class="btn btn-outline-danger">Eliminar</button>
                        <?php
                            echo form_close();
                        ?>
                </td>
            </tr>
            
            <?php/*
                    $indice++;
                }*/
            ?>
        </tbody>
    </table>
    </div>
</div>

    </div>
  </div>
</div>                