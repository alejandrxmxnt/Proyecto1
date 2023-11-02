<div class="container">
    <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-10">
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                    Ventas
                    <small>Listado</small>
                    </h1>
                </section>
                <!-- Main content -->
                <section class="content">
                    <!-- Default box -->
                    <div class="box box-solid">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="<?php echo base_url();?>index.php/administration/ventas/viewsAddSale" style="background-color: green; border-color: black;" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span> Agregar Venta</a>
                                </div>
                            </div>
                            <hr>
                            <div class="row" style="background-color: white; border-radius: 10px;">
                                <div class="col-md-12" >
                                    <table id="example1" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Datos Cliente</th> <!--de la tabla cliente-->
                                                <!--<th>Descuento</th>-->
                                                <th>Cantidad</th>
                                                <th>Importe</th>
                                                <th>Fecha</th>
                                                <th>Opciones</th>
                                            </tr> 
                                        </thead>
                                        <tbody>
                                            <?php
                                                $indice=1; 
                                                foreach($ventas->result() as $row)
                                                {//impresion de valores de la data
                                                //acontinuacion de como se carga una tabla
                                            ?>
                                            
                                            <tr>
                                                <!--<th><?php echo $indice; ?></th> -->
                                                <th><?php echo $row->id; ?></th>
                                                <td><?php echo $row->nombre;?></td>
                                                <!--<td><?php echo $row->descuento; ?></td>-->
                                                <td><?php echo $row->total_cantidad; ?></td>
                                                <td><?php echo $row->total; ?></td>
                                                <td><?php echo $row->fechaVenta; ?></td>

                                                <td>
                                                    <div style="margin-bottom: 0; margin-top: 0; align-items: center;">
                                                        <div class="d-flex">
                                                            <?php
                                                                echo form_open_multipart('administration/ventas/reportepdf', array('target' => '_blank'));
                                                            ?>

                                                            <input type="hidden" value="<?php echo $row->id; ?>" name="idventas">
                                                            <button type="submit" class="btn btn-warning">
                                                                <i class="fas fa-file-pdf"></i>
                                                            </button>

                                                            <?php
                                                                echo form_close();
                                                            ?>
            
            
                                                            <?php
                                                                echo form_open_multipart('administration/ventas/deshabilitarbd');
                                                            ?>
            
                                                            <input type="hidden" value="<?php echo $row->id; ?>" name="idventas">
                                                            <button type="submit" class="btn btn-danger">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
            
                                                            <?php
                                                                echo form_close();
                                                            ?>
                                                        </div> 
                                                    </div>
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
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
        </div>
    </div>
</div>    








<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Informacion de la venta</h4>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary btn-print"><span class="fa fa-print"> </span>Imprimir</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->