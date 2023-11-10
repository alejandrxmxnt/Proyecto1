<style>
    #EstilosReporte {
        background-color: #333; /* Color de fondo negro con transparencia */
        text-align: center; /* Alineación al centro horizontal */
        display: flex; /* Modelo de caja flexible para centrar verticalmente */
        justify-content: center; /* Alineación vertical al centro */
        align-items: center; /* Alineación vertical al centro */
        height: 60px;

    }
    .title-fechas {
        color: #fff;
        font-weight: 600;
    }
    .table-fondo {
        background-color: #333;
        opacity: 0.9;
        border-radius: 5px;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-10">
            <div class="regform">
                <h1 style="color: white; font-weight: 700; text-align: center;">REPORTE CATEGORIA MAS VENDIDOS</h1>
            </div>
            <main class="main">
      
            

            <div class="x_panel">
                    <div class="x_content">
                    <div class="row">
                        <!-- Inicio Div row 2 -->
                        <div class="col-sm-12">
                            <!-- Inicio Div col-sm-12 2 -->
                            <div class="card-box table-responsive table-fondo">
                                <?php
                                    echo form_open_multipart('administration/reportes/reporteProducto');
                                    ?>
                                    <br>
                                    <div style="margin-left: 20px;">
                                        <button type="submit" class="btn btn-round  btn-success">
                                            <i class="fa fa-search"></i> NUEVA BUSQUEDA
                                        </button>
                                    </div>
                                    
                                    <?php
                                    echo form_close();
                                    ?>
                                    <br><br>
                                <!-- Inicio Div card-box table-responsive -->
                                <?php echo form_open_multipart('administration/reportes/reporteFechasPdf');?>
                                <form  method="POST">
                                    <div class="item form-group has-feedback" id="EstilosReporte">
                                        <label class="col-form-label col-md-1 label-align title-fechas">Fecha Inicio: </label>
                                        <div class="col-md-2">
                                            <input type="date" value="<?php echo $inicio; ?>" name="inicio" id="inicio" class="form-control"></input>
                                        </div>
                                        <label class="col-form-label col-md-1 label-align title-fechas">Fecha Fin: </label>
                                        <div class="col-md-2">
                                            <input type="date" value="<?php echo $fin; ?>" name="fin" id="fin" class="form-control"></input>
                                        </div>
                                        <div class="col-md-3">
                                            <button type="submit" class="btn btn-danger" name="enviar" formtarget="_blank"><i class="fa fa-file-pdf-o"></i>  REPORTE PDF</button>
                                        </div>
                                    </div><br>
                                </form>
                                <?php echo form_close(); ?>
                                <br>
                                <!-- la tabla de abajo tenia un id por defecto que ordenaba los tr el id se llama  datatable-buttons-->
                                <table class="table" id="my-table">
                                      <tr class="header-row" id="header-row">
                                          <th>#</th>
                                          <th>CATEGORIA</th>
                                          <th>PRODUCTO</th>
                                          <th>VENDIDOS</th>
                                          <th>RECAUDADO Bs.</th>
                                      </tr>
                                      <?php
                                      $indice = 1;
                                      foreach ($fecha->result() as $row) {
                                        
                                      ?>
                                          <tr>
                                                <td><?php echo $indice; // echo $row->id; ?></td>
                                                <td style="text-align: left;"><?php echo $row->nombre_categoria; ?></td>
                                                <td><?php echo $row->nombre_producto; ?></td>
                                                <td><?php echo $row->total_vendido; ?></td>
                                                <td> 
                                                    <?php 
                                                        $total = $row->recaudacion_total; 
                                                        $totalBs=number_format($total, 2,',','.');
                                                        echo $totalBs;
                                                    ?>
                                                </td>                                                
                                          </tr>
                                      <?php
                                      $indice++;
                                      }
                                      ?>
                              </table>
                                <div class="item form-group has-feedback">

                                </div>
                            </div><!-- Inicio Div card-box table-responsive -->
                        </div><!-- Fin Div col-sm-12 2 -->
                    </div>
                    </div>
                </div>



            </main>
        </div>
    </div>
</div>