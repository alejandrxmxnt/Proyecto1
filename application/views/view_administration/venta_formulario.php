<!--
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
-->
<style>
  p{
      color: black;
      font-weight: 200;
      padding-top: -1px;
  }
</style>
<div class="container">
  <div class="row">
    <div class="col-md-2">
    </div>
    <div class="col-md-10">
      <main class="main">
        <h2 class="titulos_centro" style="color: white; font-weight: 700; text-align: center;"> REGISTRO DE VENTAS </h2>
        <?php
                  echo form_open_multipart('administration/venta/agregarbd', array('id' => 'formulario', 'class' => 'formulario', 'method' => 'post', 'autocomplete'=>'off'));
              ?>
              <!--INSERTAR EL CI DE UN CLIENTE O NIT-->
                      <div class="formulario__grupo" id="grupo__ciCliente">
                          <label for="ciCliente" class="formulario__label">CI / NIT:</label>
                          <div class="formulario__grupo-input">
                            <!--OBLIGAGORIO TENER UN CLIENTE-->
                            <input type="text" class="formulario__input" name="idCliente" id="idCliente" placeholder="Ingrese CI / NIT">
                            <datalist>
                              <option>asdf</option>
                              <option>ghjkl</option>
                              <option>6543</option>
                            </datalist>
                          </div>
                          <p></p>
                      </div>
                      <!--FIN DE INSERTAR CI O NIT DE CLIENTE-->

                      <!--ENCASO DE NO EXISTIR DIRECCIONAR A FORMULARIO DE REGISTRO-->
                      <div class="formulario__grupo" id="grupo__registrarCliente">
                        <label for="registrarCliente" class="formulario__label">Nuevo</label>
                        <div class="formulario__grupo-input">
                          <a href="<?php echo base_url(); ?>index.php/administration/cliente/agregar">
                            <button type="button" class="btn btn-primary" name="registrarCliente" id="registrarCliente">Registrar</button>
                          </a>
                        </div>
                        <p></p>
                    </div>                  
                    <!--FIN DE AGREGADO DE CLIENTE-->

                      <!-- GRUPO DE DATOS DE CLIENTE -->
                      <div class="formulario__grupo" id="grupo__razonSocial">
                          <label for="razonSocial" class="formulario__label">Razón Social: </label>
                          <label for="datos" class="formulario__label">Datos: </label>
                          <label for="fechaVenta" class="formulario__label">Fecha de Venta: </label>
                          <p><?php echo form_error('primerApellido'); ?></p>
                      </div>
                      <!--FIN DE GRUPO DE DATOS DE CLIENTE-->

                      <!--BUSCADOR DE PRODUCTO BOTON QUE LLAMA A UN MODAL-->
                      <div class="formulario__grupo">
                        <label for=""  class="formulario__label">Buscar producto</label>
                        <button type="button" class="btn btn-primary" id="btn-buscar-producto" data-toggle="modal" data-target="#modal-buscar-producto">
                          Buscar Producto
                        </button>
                      </div>
                      <!--DEFINICION DEL MODAL -->

                        <!-- GRUPO PARA LOS DETALLES DE VENTA -->
                        <div class="formulario__grupo" id="grupo__detalleVenta">
                          <label for="detalleVenta" class="formulario__label">Detalle de venta:</label>
                          <div class="formulario__grupo-input">
                              <!--Tabla de ventas-->
                              <table class="table" id="my-table">
                                <thead>
                                  <tr>
                                    <th>#</th>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>P/U</th>
                                    <th>subtotal</th>
                                    <th>Eliminar</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  
                                  <tr>
                                    <th></th>
                                    <td></td>
                                    <td><input type="text" class="formulario__input" name="stock" id="stock" placeholder="" required></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                  </tr>
                                </tbody>
                              </table>

                          </div>
                        <p></p>
                      </div>
                      <!--FIN DE TABLA DETALLE DE LOS PRODUCTOS AGREGADOS -->

                      <!-- BOTON PARA REGISTRAR LA VENTA -->
                    <div class="formulario__grupo formulario__grupo-btn-enviar">
                      <button type="submit" class="formulario__btn">Registrar</button>
                    </div>
                    <!--FIN DE boton-->
            <?php
              echo form_close();
            ?>
      </main>
    </div>
  </div>
</div>
<!--FIN DE FORMULARIO-->

<!-- Modal para la búsqueda de producto -->
<div class="modal fade" id="modal-buscar-producto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header" style=" background-color: rgb(223, 100, 9);">
        <h5 class="modal-title" id="exampleModalLabel" style="color: black; font-weight: 700; text-align: ;">Lista de productos</h5>
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Contenido de búsqueda de producto aquí -->
        <table class="table" id="my-table">
          <thead>
            <tr>
              <th>#</th>
              <th>Agregar</th>
              <th>Nombre</th>
              <th>Stock</th>
              <th>Precio U/N</th> 
              <th>Imagen</th>
            </tr>
          </thead>
          <tbody>
  
            <?php
              //$indice=1;
              /*
              foreach($productos->result() as $row){ 
                //impresion de valores de la data
                //acontinuacion de como se carga una tabla
            ?>
            
            <tr>
              <th><?php echo $indice; ?></th>
              <td>
                <?php
                    //echo form_open_multipart('administration/venta/seleccionar');
                ?>
                <input type="text" value="<?php echo $row->id; ?>" name="idlistaProducto">
                <!--
                <button id="btn_seleccionar<?php echo $row->id;?>" value="<?php echo $row->id; ?>" name="idlistaProducto" class="btn btn-primary" style="background-color: rgb(223, 100, 9); color: white; font-weight: 500; border-color: black; border-radius: 25%;"> + </button>
                -->
                <button data-id="<?php echo $row->id; ?>" data-nombre="<?php echo $row->nombre; ?>" name="idlistaProducto" class="btn btn-primary" style="background-color: rgb(223, 100, 9); color: white; font-weight: 500; border-color: black; border-radius: 25%;"> + </button>

                <!--
              <button id="btn_seleccionar<?php echo $row->id;?>" value="<?php echo $row->id; ?>" name="idlistaProducto" class="btn btn-primary" style="background-color: rgb(223, 100, 9); color: white; font-weight: 500; border-color: black; border-radius: 25%;"> + </button>
            -->
                <script>
                  $(document).ready(function () {
                    $('button[name="idlistaProducto"]').click(function () {
                      var idProducto = $(this).val();
                      var nombreProducto = $(this).data('nombre');
                      var cantidad = 1; // Puedes establecer la cantidad inicial aquí.
                      var precioUnitario = $(this).data('precioUnitario'); // Puedes establecer el precio unitario aquí.

                      // Verifica si ya existe una fila con el mismo idProducto.
                      var existingRow = $('#my-table tbody tr[data-id="' + idProducto + '"]');

                      if (existingRow.length > 0) {
                        // Si la fila ya existe, actualiza la cantidad y el subtotal.
                        var cantidadExistente = parseInt(existingRow.find('td:nth-child(3)').text());
                        cantidadExistente += 1;
                        existingRow.find('td:nth-child(3)').text(cantidadExistente);

                        var subtotalExistente = cantidadExistente * precioUnitario;
                        existingRow.find('td:nth-child(5)').text(subtotalExistente);
                      } else {
                        // Si no existe una fila con el mismo idProducto, agrega una nueva fila.
                        var subtotal = cantidad * precioUnitario;

                        $('#my-table tbody').append(
                          '<tr data-id="' + idProducto + '">' +
                          '<th>' + idProducto + '</th>' +
                          '<td>' + nombreProducto + '</td>' +
                          '<td>' + cantidad + '</td>' +
                          '<td>' + precioUnitario + '</td>' +
                          '<td>' + subtotal + '</td>' +
                          '<td><button class="btn btn-danger eliminar" data-id="' + idProducto + '">Eliminar</button></td>' +
                          '</tr>'
                        );
                      }
                    });

                    // Agrega un evento para eliminar filas cuando se hace clic en el botón "Eliminar".
                    $('#my-table').on('click', '.eliminar', function () {
                      $(this).closest('tr').remove();
                    });
                  });
                </script>
            </td>
              <td><?php echo $row->nombre; ?></td>
              <td><?php echo $row->stock; ?></td>
              <td><?php echo $row->precioUnitario; ?></td>
              <td>
                  <?php 
                  $foto=$row->foto;
                  if($foto=="")//si foto esta igual a vacion sin imagen
                  {//cargar una imagen en caso de no tener una imagen que sea vacio
                      ?>
                      <img width="80" src="<?php echo base_url(); ?>uploads/productos/vacio.jpg">
                      <?php
                  }else {//caso contrario se proyectara la imagen
                      ?>
                      <img width="80" src="<?php echo base_url(); ?>uploads/productos/<?php echo $foto; ?>">
                      <?php
                  }
                  ?>
              </td>
            </tr>
  
            <?php
              $indice++;
              } */
            ?>
  
            
          </tbody>
        </table> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<!--FIN DE MODAL-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>

<script>
  let producto = [];
    let cliente = [];

    $("#producto").autocomplete({
        source: function(request, response) {
            // Fetch data
            $.ajax({
                url: "<?= base_url() ?>index.php/venta/productList",
                type: 'post',
                dataType: "json",
                data: {
                    search: request.term
                },
                success: function(data) {
                    console.log(data);
                    response(data);
                },
                error: function(xhr, status) {
                    alert('Disculpe, existió un problema');
                },
            });
        },
        select: function(event, ui) {
            $('#producto').val(ui.item.nombre); // display the selected text
            $('#marca').val(ui.item.marca); // display the selected text
            $('#categoria').val(ui.item.categoria); // display the selected text
            $('#precioU').val(ui.item.precioVenta); // save selected id to input
            $('button[id=agregarTabla]').removeAttr('disabled');
            producto = ui.item;
            return false;
        }
    });
</script>
