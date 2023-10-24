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
                                                        <?php
                                                            echo form_open_multipart('administration/ventas/reportepdf', array('target' => '_blank'));
                                                        ?>

                                                        <input type="hidden" value="<?php echo $row->id; ?>" name="idventas">
                                                        <button type="submit" class="btn btn-warning">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-filetype-pdf" viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd" d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5ZM1.6 11.85H0v3.999h.791v-1.342h.803c.287 0 .531-.057.732-.173.203-.117.358-.275.463-.474a1.42 1.42 0 0 0 .161-.677c0-.25-.053-.476-.158-.677a1.176 1.176 0 0 0-.46-.477c-.2-.12-.443-.179-.732-.179Zm.545 1.333a.795.795 0 0 1-.085.38.574.574 0 0 1-.238.241.794.794 0 0 1-.375.082H.788V12.48h.66c.218 0 .389.06.512.181.123.122.185.296.185.522Zm1.217-1.333v3.999h1.46c.401 0 .734-.08.998-.237a1.45 1.45 0 0 0 .595-.689c.13-.3.196-.662.196-1.084 0-.42-.065-.778-.196-1.075a1.426 1.426 0 0 0-.589-.68c-.264-.156-.599-.234-1.005-.234H3.362Zm.791.645h.563c.248 0 .45.05.609.152a.89.89 0 0 1 .354.454c.079.201.118.452.118.753a2.3 2.3 0 0 1-.068.592 1.14 1.14 0 0 1-.196.422.8.8 0 0 1-.334.252 1.298 1.298 0 0 1-.483.082h-.563v-2.707Zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638H7.896Z"/>
                                                            </svg>
                                                        </button>

                                                        <?php
                                                            echo form_close();
                                                        ?>
        
        
                                                        <?php
                                                            echo form_open_multipart('administration/ventas/deshabilitarbd');
                                                        ?>
        
                                                        <input type="hidden" value="<?php echo $row->id; ?>" name="idventas">
                                                        <button type="submit" class="btn btn-danger">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                                                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                                                            </svg>
                                                        </button>
        
                                                        <?php
                                                            echo form_close();
                                                        ?>
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