<!-- Bootstrap 
<link href="<?php echo base_url() ?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
-->
<!--scrip para el funcionamiento necesario-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="container">
    <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-10">
            <div class="regform">
                <h1>Formulario de ventas</h1>
            </div>
            <main class="main">

                <div class="col-sm-12">
                    <div class="card-box table-responsive"> 
                        <div class="x_panel">
                            <!--BOTON DE RETROCEDER RETORNA A LISTA DE VENTAS-->
                            <div class="x_title">
                                <a href="<?php echo base_url();?>index.php/administration/ventas/index">
                                    <button type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Volver"><i class="fa fa-mail-reply-all"></i></button>
                                </a>
                                <div class="clearfix"></div>
                            </div>
                            <!--INICIA CONTENIDO DE PROCESO DE VENTA-->
                            <div class="x_content">
                                <br>
                                <?php
                                echo form_open_multipart('admininistration/ventas/realizarTransaccionVenta', array('id' => 'ventaForm', 'class' => 'needs-validation', 'method' => 'post'));
                                ?>
                                <!--
                                <form action="<?php// echo base_url();?>index.php/admininistration/ventas/realizarTransaccionVenta" id="ventaForm" class="needs-validation" method="post">
-->
                                    <div class="form-group row">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Seleccione un cliente:</label>
                                        <div class="col-md-9 col-sm-9 col-xs-9">
                                            <!--Lista de clientes por el momento es busqueda manual de lista-->
                                            <select class="form-control" name="idcliente" id="idcliente" required="required">
                                                <option value="" disabled selected>Lista de clientes</option>
                                                <?php 
                                                foreach ($clientes->result() as $row){ 
                                                ?>
                                                    <option value="<?php echo $row->id; ?>"><?php echo $row->ciNit; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select> <!--Fin de seleccion de clientes-->
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Seleccione un producto:</label> 
                                        <div class="col-md-5 col-sm-5 col-xs-5">
                                            <input type="hidden" name="detalle_data" id="detalle_data" value="">
                                            <!--Seleccionar productos en lista-->
                                            <select class="form-control" name="producto" id="producto" required="required">
                                                <option value="" disabled selected>Listado de productos</option>
                                                <?php
                                                foreach ($productos->result() as $row){
                                                ?>
                                                    <option value="<?php echo $row->id; ?>">
                                                        <?php echo $row->nombre; ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                            <!--Fin de busqueda de productos en lista-->
                                        </div>
                                        <!--agregar mediante este boton a la tabla-->
                                        <div class="col-md-4 col-sm-4 col-xs-4">
                                            <button id="btn-agregar" type="button" class="btn btn-success">Agregar</button>
                                        </div>
                                        <!--Fin de boton para agregado a la tabla-->
                                    </div>

                                    <div class="x_title">
                                        <h2>Tabla de ventas <small></small></h2>
                                        <ul class="nav navbar-right panel_toolbox">
                                        </ul>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div id="tabla-ventas">
                                        <table class="table table-striped" id="tabla-ventas">
                                            <thead>
                                                <tr>
                                                    <th>N°</th>
                                                    <th></th>
                                                    <th>Producto</th>
                                                    <th>Producto</th>
                                                    <th>Precio</th>
                                                    <th>Stock</th>
                                                    <th>Cantidad</th>
                                                    <th>Importe</th>
                                                    <th>Quitar Producto</th>
                                                </tr>
                                            </thead>
                                            <tbody class="list-product">
                                                <tr id="fila-ejemplo" style="display: none;">
                                                    <td></td>
                                                    <td><input type="hidden" class="producto-id" name="producto_id[]"></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td><input style="width: 100px;" type="number" required="required" value="0" class="form-control cantidad" name="cantidad[]" id="cantidad"></td>
                                                    <td></td>
                                                    <td><button class="btn btn-danger btn-remove"><span class="glyphicon glyphicon-trash"></span></button></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2" style="text-align: center;">
                                            <input type="number" name="total" id="total" class="form-control" style="text-align: center;"><strong><samp>TOTAL(Bs.)</samp></strong>
                                        </div>
                                        <div class="col-md-8"></div>
                                        <div class="col-md-2">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2" style="text-align: center;">
                                        </div>
                                        <div class="col-md-8"></div>
                                        <div class="col-md-2">
                                            <button type="submit" class="btn btn-info btn-block" id="btn-guardar"><strong>Guardar</strong></button>
                                            <br>
                                        </div>
                                    </div>
                                    <!--
                                </form> 
-->
                                <?php echo form_close(); ?>                              
                            </div>
                        </div>
                    </div>
                </div>

            </main>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {

        var contadorFilas = 1;

        function calcularImporte(fila) {
            var cantidad = parseInt(fila.find("td:eq(6) input").val());
            var precioUnitario = parseFloat(fila.find("td:eq(4)").text());
            var importe = cantidad * precioUnitario;
            fila.find("td:eq(7)").text(importe);
            return importe;
        }

        function calcularTotal() {
            var total = 0;
            $(".added-row").each(function() {
                total += calcularImporte($(this));
            });
            $("#total").val(total);
        }

        $(document).on("input", ".cantidad", function() {
            var fila = $(this).closest("tr");
            calcularImporte(fila);

            calcularTotal();
        });

        $("#btn-agregar").on("click", function() {
            var producto_id = $("#producto").val();

            if (producto_id) {

                var fila = $("#fila-ejemplo").clone().removeAttr("id");

                $.getJSON('<?php echo base_url() ?>index.php/ajax/obtenerProductoPorId/' + producto_id, function(data) {
                    if (data) {

                        fila.find("td:eq(0)").text(contadorFilas);
                        fila.find("td:eq(1) input").val(producto_id);
                        fila.find("td:eq(2)").text(data[0].nombre);
                        fila.find("td:eq(3)").text(data[0].descripcion);
                        fila.find("td:eq(4)").text(data[0].precioUnitario);
                        fila.find("td:eq(5)").text(data[0].stock);
                        fila.find("td:eq(6) input").val(1);
                        fila.find("td:eq(7)").text(data[0].precioUnitario);

                        contadorFilas++;

                        fila.addClass("added-row");

                        fila.show();
                        $(".list-product").append(fila);

                        calcularImporte(fila);
                        calcularTotal();
                    } else {
                        alert("No se encontraron detalles del producto.");
                    }
                }).fail(function(jqXHR, textStatus, errorThrown) {
                    console.log("Error en la solicitud AJAX: " + errorThrown);
                });
            } else {
                alert("Seleccione un Producto.");
            }
        });

        $(document).on("click", ".btn-remove", function() {
            var fila = $(this).closest("tr");
            fila.remove();

            calcularTotal();
        });

        calcularTotal();
    });


    $("#btn-guardar").on("click", function() {
        var datos = []; // Array para almacenar los datos de todas las filas

        // Recorre cada fila con la clase "added-row"
        $(".list-product .added-row").each(function() {
            var fila = $(this);
            var cantidad = parseInt(fila.find("td:eq(6) input").val());
            var precioUnitario = parseFloat(fila.find("td:eq(4)").text());
            var importe = cantidad * precioUnitario; // Calcula el importe

            var filaData = {
                idProducto: fila.find("td:eq(1) input").val(),
                precioUnitario: precioUnitario,
                cantidad: cantidad,
                importe: importe
            };
            datos.push(filaData);
        });

        // Muestra el contenido del array en un alert
        //alert(JSON.stringify(datos, null, 2));

        // Convierte el array a una cadena JSON
        var datosJSON = JSON.stringify(datos);

        // Asigna la cadena JSON al campo de entrada
        $("#detalle_data").val(datosJSON);
    });
</script>

<script src="<?php echo base_url() ?>assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>