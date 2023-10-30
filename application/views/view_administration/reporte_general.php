<div class="container">
    <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-10">
            <div class="regform">
                <h1>REPORTE GENERAL POR FECHAS</h1>
            </div>
            <main class="main">
            
                <div class="x_panel">
                    <div class="x_content">
                      <div class="row">
                        <div class="col-sm-12">
                          <!-- Inicio Div col-sm-12 2 -->
                          <div class="card-box table-responsive">
                              <?php
                                  echo form_open_multipart('administration/reportes/index');
                                  ?>
                                  <button type="submit" class="btn btn-round  btn-success">
                                      <i class="glyphicon glyphicon-arrow-left"></i>Volver
                                  </button>
                                  <?php
                                  echo form_close();
                                  ?>
                                  <br><br>
                              <!-- Agarra los valores de fecha inicio y fecha limite -->
                              <?php echo form_open_multipart('administration/reportes/generalfiltro'); ?>
                              <form  method="POST">
                                  <div class="item form-group has-feedback">
                                      <label class="col-form-label col-md-1 label-align">Fecha Inicio: </label>
                                      <div class="col-md-3">
                                          <input type="date" value="<?php echo date('Y-m-d'); ?>" name="inicio" id="inicio" class="form-control"></input>
                                      </div>
                                      <label class="col-form-label col-md-1 label-align">Fecha Fin: </label>
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
                                  <div class="col-md-2">
                                      <?php echo form_open_multipart('administration/reportes/generarPdf'); ?>
                                      <button type="submit" class="btn btn-danger" name="enviar" formtarget="_blank"><i class="fa fa-file-pdf-o"></i>GENERAR PDF</button>
                                      <?php echo form_close(); ?>
                                  </div>
                              </div>
                              <br>
                              <!-- la tabla de abajo tenia un id por defecto que ordenaba los tr el id se llama  datatable-buttons-->
                              <table id="datatable" class="table table-striped table-bordered jambo_table bulk_action" style="width:100%">
                                  <thead>
                                      <tr class="headings">
                                          <th>COMPROBANTE</th>
                                          <th>RAZON SOCIAL</th>
                                          <th>NIT</th>
                                          <th>TOTAL (Bs.)</th>
                                          <th>FECHA VENTA</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php
                                      foreach ($fecha->result() as $row) {
                                      ?>
                                          <tr>
                                              <td><?php echo $row->id; ?></td>
                                              <td><?php echo $row->nombre.' '.$row->primerApellido.' '.$row->segundoApellido.' '.$row->razonSocial; ?></td>
                                              <td><?php echo $row->ciNit; ?></td>
                                              <td> <?php echo 'Bs. '.$row->total; ?></td>                                                
                                              <td><?php echo $row->fechaVenta; ?></td>
          
                                          </tr>
                                      <?php
                                      }
                                      ?>
                                  </tbody>
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