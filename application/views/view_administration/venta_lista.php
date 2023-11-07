<style>
    
.titulos_centro {
    color: white;
    text-align: center;
}

/* Estilos para la contenedor de tabla responsive */
.table-responsive {
    max-width: 100%;
    overflow-x: auto;
}

/* Estilos para la tabla */
.table {
    border-collapse: collapse;
    width: 100%;
    opacity: 0.9; /* Transparencia de la tabla */
    border: 15px solid #333; /* Borde de 15px y color oscuro */
    border-radius: 15px; /* Borde redondeado de 15px */
    font-size: 10px; /* Tamaño de letra de 10px */
}

/* Estilos para las filas de la tabla */
.table tr {
    background-color: #f5f5f5;
    line-height: 1; /* Puedes ajustar el valor según tus preferencias, por ejemplo, 1.2 o 1.5 para un interlineado mayor. */
    border-spacing: 5px;
}

/* Estilos para las celdas de la tabla */
.table td, .table th {
    padding: 5px;
    border: 1px solid #ccc;
    text-align: center; /* Alinear el texto al centro */
    font-size: 14px;
    line-height: 1; /* Puedes ajustar el valor según tus preferencias. */
}

/* Estilos para las celdas de encabezado */
.table th {
    background-color: #333; /* Color oscuro para las celdas de encabezado */
    color: #fff; /* Texto en color blanco en las celdas de encabezado */
}

/* Estilos para las celdas de la tabla en modo hover */
.table tr:hover {
    background-color: #e0e0e0;
}
</style>

<div class="container">
    <div class="row">
        <div class="col-md-2 columna1">
        </div>
        <div class="col-md-10 columna2">
            <br>
                <div class="col-md-12">
                    <a href="<?php echo base_url();?>index.php/administration/ventas/viewsAddSale" style="background-color: green; border-color: black;" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span> Agregar Venta</a>
                </div>
                <br>        
                <table class="table" id="my-table">
                    <tr  class="header-row" id="header-row">
                        <th>Comprobante</th>
                        <th>Datos Cliente</th> <!--de la tabla cliente-->
                        <!--<th>Descuento</th>-->
                        <th>Cantidad</th>
                        <th>Importe Bs.</th>
                        <th>Fecha</th>
                        <th>Opciones</th>
                    </tr> 
                    <?php
                        $indice=1; 
                        foreach($ventas->result() as $row)
                        {//impresion de valores de la data
                        //acontinuacion de como se carga una tabla
                        $numero = $row->id;
                        $numeroComoCadena = strval($numero);
                        //$longitud = strlen($numeroComoCadena);
                        if(strlen($numeroComoCadena) < 8){
                            $numeroComoCadena = str_pad($numeroComoCadena,8,'0', STR_PAD_LEFT);
                        }
                    ?>
                    
                    <tr>
                        <!--<th><?php echo $indice; ?></th> -->
                        <th><?php echo $numeroComoCadena; ?></th>
                        <td style="text-align: left;"><?php echo $row->nombre.' '.$row->primerApellido.' '.$row->razonSocial;?></td>
                        <!--<td><?php echo $row->descuento; ?></td>-->
                        <td><?php echo $row->total_cantidad; ?></td>
                        <td><?php echo $row->total; ?></td>
                        <td><?php echo $row->fechaVenta; ?></td>

                        <td>
                            <div class="d-flex" style="display: flex; justify-content: center; align-items: center;">
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
                        </td>
                    </tr>
                    <?php
                        $indice++;
                        }
                    ?>
                </table>
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