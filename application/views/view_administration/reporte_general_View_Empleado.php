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
                <h1 style="color: white; font-weight: 700; text-align: center;">REPORTE GENERAL POR FECHAS</h1>
            </div>
            <main class="main">
            
                <div class="x_panel">
                    <div class="x_content">
                      <div class="row">
                        <div class="col-sm-12">
                          <!-- Inicio Div col-sm-12 2 -->
                          <div class="card-box table-responsive table-fondo">
                              <?php
                                  echo form_open_multipart('administration/reportes/index');
                                  ?>
                                  <br>
                                  <!--
                                  <div style="margin-left: 20px;">
                                  <button type="submit" class="btn btn-round  btn-success">
                                      <i class="glyphicon glyphicon-arrow-left"></i>Volver
                                  </button>
                                  </div>  -->
                                  <?php
                                  echo form_close();
                                  ?>
                                  <br>
                              <!-- Agarra los valores de fecha inicio y fecha limite -->
                              <?php echo form_open_multipart('administration/reportes/generalfiltro'); ?>
                              <form  method="POST">
                                  <div class="item form-group has-feedback" id="EstilosReporte">
                                      <label class="col-form-label col-md-1 label-align title-fechas">Fecha Inicio: </label>
                                      <div class="col-md-3">
                                          <input type="date" value="<?php echo date('Y-m-d'); ?>" name="inicio" id="inicio" class="form-control"></input>
                                      </div>
                                      <label class="col-form-label col-md-1 label-align title-fechas">Fecha Fin: </label>
                                      <div class="col-md-3">
                                          <input type="date" value="<?php echo date('Y-m-d'); ?>" name="fin" id="fin" class="form-control"></input>
                                      </div>
                                      <div class="col-md-4">
                                          <label for="">&nbsp;</label>
                                          <button type="submit" class="btn btn-info" >
                                              <span class="fa fa-search"></span>Buscar</button>
                                      </div>
                                  </div><br>
                              </form>
                              <?php echo form_close(); ?>
                              <div class="item form-group has-feedback">
                                  <div class="col-md-10"></div>
                                  <div class="col-md-2" style="margin-left: 20px;">
                                      <?php echo form_open_multipart('administration/reportes/generarEmpleadoPdf'); ?>
                                      <button type="submit" class="btn btn-danger" name="enviar" formtarget="_blank"><i class="far fa-file-pdf"></i> GENERAR PDF</button>
                                      <?php echo form_close(); ?>
                                  </div>
                              </div>
                              <br>
                              <!-- la tabla de abajo tenia un id por defecto que ordenaba los tr el id se llama  datatable-buttons-->
                              <table id="datatable" class="table table-striped table-bordered jambo_table bulk_action " style="width:100%" id="my-table">
                                      <tr class="headings table"  >
                                          <th>COMPROBANTE</th>
                                          <th>RAZON SOCIAL</th>
                                          <th>NIT</th>
                                          <th>TOTAL (Bs.)</th>
                                          <th>FECHA VENTA</th>
                                          <th>PDF</th>
                                      </tr>
                                      <?php
                                      foreach ($fechas->result() as $row) {
                                        $numero = $row->id;
                                        $numeroComoCadena = strval($numero);
                                        //$longitud = strlen($numeroComoCadena);
                                        if(strlen($numeroComoCadena) < 8){
                                            $numeroComoCadena = str_pad($numeroComoCadena,8,'0', STR_PAD_LEFT);
                                        }
                                      ?>
                                          <tr class="fila-consejo">
                                              <td><?php echo $numeroComoCadena; ?></td>
                                              <td style="text-align: left;">
                                              <?php 
                                                if($row->primerApellido === ''){
                                                    echo 'Sin nombre';
                                                } else {
                                                    echo $row->nombre.' '.$row->primerApellido.' '.$row->segundoApellido.' '.$row->razonSocial; 
                                                }
                                              ?>
                                            </td>
                                              <td>
                                                <?php 
                                                if($row->ciNit === 'ANONIMO'){
                                                    echo '';
                                                }else {
                                                    echo $row->ciNit; 
                                                }
                                                ?>
                                            </td>
                                              <td> 
                                                <?php 
                                                    $total = $row->total; 
                                                    $totalBs=number_format($total, 2,',','.');
                                                    echo $totalBs;
                                                ?>
                                              </td>                                                
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
                                                </div>
                                              </td>
                                          </tr>
                                      <?php
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
                </div>



            </main>
        </div>
    </div>
</div>

<script src="<?php echo base_url(); ?>bootstrap/js/buscador/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    //Captura del evento de cambio en el campo de busqueda
    $("#searchInput").on("input", function () {
      var valorBusqueda = $(this).val().toLowerCase(); //Obtener el valor de busqueda en minusculas
      //Filtra las filas de la tabla
      $(".fila-consejo").each(function () {
        var textoFila = $(this).text().toLowerCase(); //texto de la fila en minusculas
        if (textoFila.indexOf(valorBusqueda) === -1){
        $(this).hide(); //Oculta la fila si no coincide con la busqueda
      } else {
        $(this).show(); //Muestra la fila si coincide con la busqueda
      }
      });
    });
  });
</script>