<div class="container">
    <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-10">
            <main class="main">

                <div class="container md-3">
                    <!-- Inicio Div container md-3 -->
                    <div class="row">
                        <!-- Inicio Div row --> 
                        <div class="col-md-12 col-sm-12 ">
                            <!-- Inicio Div col-md-12 col-sm-12  -->
                            <div class="x_panel">
                                <!-- Inicio Div x_panel -->
                                <div class="x_title">
                                    <h2>Datos del Cliente</h2>
                                    <div class="clearfix">
                                    </div>
                                </div>
                                <div class="x_content">
                                    <!-- Inicio Div x_content 
                                    <?php
                                    echo form_open_multipart('venta/index');
                                    ?>
                                    <button type="submit" name="buttonInhabilitados" class="btn btn-outline-success">
                                        <i class="fa fa-arrow-circle-left"></i> Volver a lista de ventas
                                    </button>
                                    <?php
                                    echo form_close();
                                    ?>-->
                                    <br>

                                    <div class="item form-group has-feedback">
                                        <label class="col-form-label col-md-1 label-align">Nit / Carnet Identidad:</label>
                                        <div class="col-md-3">
                                            <input type="search" name="carnet" id="carnet" class="form-control"></input>
                                        </div>
                                        <input hidden name="idCli" id="idCli" value="0">
                                        <!--<input hidden name="idUsuario" id="idUsuario" value="<?php echo $_SESSION['idusuario'] ?>">-->


                                        <label class="col-form-label col-md-1 label-align" for="razon">Razon Social:</label>
                                        <div class="col-md-3">
                                            <input class="form-control" disabled name="razon" id="razon" placeholder="Sin nombre" />
                                            <div id="suggestions">
                                                <ul id="autoSuggestionsList"></ul>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">&nbsp;</label>
                                            <a href="<?php echo base_url(); ?>index.php/administration/cliente/agregar">
                                                <button  class="btn btn-info">
                                                    <span class="fa fa-plus-circle"></span> Agregar Cliente</button>
                                            </a>
                                            
                                        </div>

                                    </div>

                                    <div class="item form-group has-feedback">

                                        <label class="col-form-label col-md-1 label-align" for="telefono">Telefono:</label>

                                        <div class="col-md-3">
                                            <input id="telefono" disabled class="form-control" placeholder="Sin telefono" value=""></input>
                                        </div>

                                        <!--<label class="col-form-label col-md-1 label-align" for="primerapellido">Segundo Apellido:</label>

                                        <div class="col-md-3">
                                            <input id="segundoA" disabled class="form-control" placeholder="Sin segundo apellido" value=""></input>
                                        </div>    -->
                                    </div>
                                </div><!-- Fin Div x_content -->
                            </div><!-- Fin Div x_panel -->
                        </div><!-- Fin Div col-md-12 col-sm-12  -->
                    </div><!-- Fin Div row -->

                    <div class="row">
                        <!-- Inicio Div row -->
                        <div class="col-md-12 col-sm-12 ">
                            <!-- Inicio Div col-md-12 col-sm-12  -->
                            <div class="x_panel">
                                <!-- Inicio Div x_panel -->
                                <div class="x_title">
                                    <h2>Datos de Producto</h2>
                                    <div class="clearfix">
                                    </div>
                                </div>
                                <div class="x_content">
                                    <!-- Inicio Div x_content -->

                                    <div class="item form-group has-feedback">

                                        <label class="col-form-label col-md-1 label-align" for="nombre">Nombre Producto:</label>
                                        <div class="col-md-3">
                                            <input type="search" class="form-control" value="" name="producto" id="producto" placeholder="Escriba nombre del producto" />
                                            <input type="hidden" name="producto1" id="producto1" value="">
                                        </div>

                                        <label class="col-form-label col-md-1 label-align">Marca:</label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" disabled value="" name="marca" id="marca" placeholder="Sin marca" />
                                        </div>
                                    </div>
                                    <div class="item form-group has-feedback">
                                        <label class="col-form-label col-md-1 label-align">Categoria:</label>
                                        <div class="col-md-3">
                                            <input name="categoria" disabled id="categoria" class="form-control" value="" placeholder="Sin categoria"></input>
                                        </div>

                                        <label class="col-form-label col-md-1 label-align">Precio Unitario:</label>
                                        <div class="col-md-3">
                                            <input name="precioU" disabled id="precioU" class="form-control" value="" placeholder="Sin precio unitario"></input>
                                        </div>

                                        <div class="col-md-3">
                                            <button id="agregarTabla" disabled type="text" class="btn btn-success">
                                                <i class="fa fa-plus-circle"></i> Agregar a la tabla
                                            </button>
                                        </div>
                                    </div>
                                </div><!-- Fin Div x_content -->
                            </div><!-- Fin Div x_panel -->
                        </div><!-- Fin Div col-md-12 col-sm-12  -->
                    </div><!-- Fin Div row -->

                    <form id="formulario12" class="formulario12" name="formulario12">

                        <div class="x_content">
                            <div class="table">
                                <table class="table table-striped jambo_table bulk_action" id="tablita">
                                    <thead>
                                        <tr class="headings bg-green">
                                            <th class="column-title">Nombre </th>
                                            <th class="column-title">Marca </th>
                                            <th class="column-title">Categoría </th>
                                            <th class="column-title">Precio </th>
                                            <th class="column-title">Cantidad </th>
                                            <th class="column-title">SubTotal </th>
                                            <th class="column-title no-link last"><span class="nobr">Eliminar</span>
                                            </th>
                                            <th class="bulk-actions" colspan="7">
                                                <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                            </th>
                                        </tr>
                                    </thead>

                                    <tbody id="bodyTabla">


                                    </tbody>
                                </table>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Total</label>
                                    <div class="col-sm-10">
                                        <input type="number" disabled class="form-control" id="total" name="total" placeholder="0">
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-success" disabled >
                                    <i class="fa fa-plus-circle"></i>Insertar
                                </button>
                            </div>
                        </div>
                    </form>
                </div><!-- Fin Div container md-3 -->

            </main>
        </div>
    </div>
</div>
<!--FIN DE FORMULARIO-->

<!--MODAL AGREGAR CLIENTE-->
<div class="modal fade" id="modal-default1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <?php 
                echo form_open_multipart('cliente/agregarbd2');
            ?>
            <div class="modal-header">
                <h4 class="modal-title">Agregar Cliente</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="text-muted font-13 m-b-30">
                    Usted va a insertar un nuevo cliente, por favor llene el siguiente campo:
                </p>
                <div class="item form-group has-feedback">
                  <label class="col-form-label col-md-1 label-align" for="razonsocial">Razon Social:</label>
                  <div class="col-md-3">
                      <input type="text" name="RazonSocial" class="form-control has-feedback-left"
                      value="<?php echo set_value('RazonSocial');?>">
                      <span class="fa fa-male form-control-feedback left" aria-hidden="true"></span>
                      <?php echo form_error('RazonSocial'); ?>
                  </div>
                  <label class="col-form-label col-md-1 label-align" for="cinit">CI/NIT:</label>
                  <div class="col-md-3">
                      <input type="text" name="CiNit" class="form-control has-feedback-left"
                      value="<?php echo set_value('CiNit');?>">
                      <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                      <?php echo form_error('CiNit');   ?>
                  </div>
                  <label class="col-form-label col-md-1 label-align" for="telefono">Nro. Celular:</label>
                  <div class="col-md-3">
                      <input type="text" name="Telefono" class="form-control has-feedback-left"
                      value="<?php echo set_value('Telefono');?>">
                      <span class="fa fa-mobile-phone form-control-feedback left" aria-hidden="true"></span>
                      <?php echo form_error('Telefono'); ?>
                  </div>
                </div> 
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">
                    <i class="fa fa-plus-circle"></i>  Insertar
                </button>
            </div>
        <?php 
            echo form_close();
        ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--FIN DE MODAL 1-->



<!-- ✅ Load CSS file for jQuery ui  -->
<link href="https://code.jquery.com/ui/1.12.1/themes/ui-lightness/jquery-ui.css" rel="stylesheet" />

<!-- ✅ load jQuery ✅ -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<!-- ✅ load jQuery UI ✅ -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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


    $("#carnet").autocomplete({
        source: function(request, response) {
            // Fetch data
            $.ajax({
                url: "<?= base_url() ?>index.php/venta/clientList",
                type: 'post',
                dataType: "json",
                data: {
                    search: request.term
                },
                success: function(data) {
                    // console.log(data);
                    response(data);
                }
            });
        },
        select: function(event, ui) {
            // Set selection
            $('#carnet').val(ui.item.value); // display the selected text
            $('#telefono').val(ui.item.telefono); // display the selected text
            $('#razon').val(ui.item.razonSocial); // save selected id to input
            $('#idCli').val(ui.item.idCliente); // save selected id to input
            cliente = ui.item;

            return false;
        }
    });

    console.log(producto);
    let count = 0;
    $(document).ready(function() {
        $("#agregarTabla").click(function() {
            // Para este ejemplo, en realidad no envíe el formulario
            event.preventDefault();
            markup = "<tr name='fila' id='fila" + count + "' class='even pointer'>" +
                "<td>" + producto.nombre + "<input class='form-control' name='idProducto[]' hidden type='number' value=" + producto.idProducto + " ></td>" +
                "<td>" + producto.marca + "</td>" +
                "<td>" + producto.categoria + "</td>" +
                "<td name='precio'>" + producto.precioVenta + "</td>" +
                "<td><input class='form-control' name='cantidad[]' onchange='cambiarSubtotal()' type='number' value='1'></td>" +
                "<td ><input class='form-control' name='subtotal[]' id='subtotal'  type='number' value=" + producto.precioVenta + " ></td>" +
                "<td> <input type='button' class='form-control'  onclick='eliminarFila(" + count + ");' value='Eliminar' /></td>" +
                "</tr>";
            tableBody = $("#bodyTabla");
            tableBody.append(markup);
            count += 1;
            cambiarTotal();

        });
    });

    function eliminarFila(index) {
        // console.log("#fila" + index);
        $("#fila" + index).remove();
        cambiarTotal();
    }

    const cambiarSubtotal = () => {

        let cantidad = document.getElementsByName("cantidad[]");
        let precio = document.getElementsByName("precio");
        //let stock = document.getElementsByName("stock[]");
        let subtotal = document.getElementsByName("subtotal[]");


        for (var i = 0; i < cantidad.length; i++) {
                subtotal[i].value = cantidad[i].value * precio[i].innerText;

        }
        cambiarTotal();

    };

    const cambiarTotal = () => {

        let subtotal = document.getElementsByName("subtotal[]");
        let total = document.getElementById('total');

        let count = 0;

        for (var i = 0; i < subtotal.length; i++) {
            count += Number(subtotal[i].value);
        }

        total.value = count;

    };



    // function guardaryeditar() {

    //     console.log(document.getElementsByClassName('formulario'));
    //     //$("#btnGuardar").prop("disabled",true);
    //     let formData = new FormData(document.getElementsByClassName('formulario'));
    //     console.log(formData);
    //     for (let obj of formData) {
    //         console.log(obj);
    //     }
    // }



    const guardaryeditar = (e) => {
        e.preventDefault();
        // const form = document.getElementById("formulario12");
        // console.log(form);
        const formData = new FormData($("#formulario12")[0]);
        //formData.append("subtotal", document.getElementById("subtotal").value);
        formData.append("total", document.getElementById("total").value);
        formData.append("idUsuario", document.getElementById("idUsuario").value);
        formData.append("idSucursal", document.getElementById("idSucursal").value);
        //formData.append("idCli");
        formData.append("idCliente", cliente.idCliente);


        $.ajax({
            url: "<?= base_url() ?>index.php/venta/insertVenta2",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,

            success: function(datos) {
                $('#ModalVenta').modal({
                    show: true
                });
                limpiar();
                console.log(datos);
            },
            error: function(jqXHR, status) {
                var msg = '';
                if (jqXHR.status === 0) {
                    msg = 'Not connect.\n Verify Network.';
                } else if (jqXHR.status == 404) {
                    msg = 'Requested page not found. [404]';
                } else if (jqXHR.status == 500) {
                    msg = 'Internal Server Error [500].';
                } else if (exception === 'parsererror') {
                    msg = 'Requested JSON parse failed.';
                } else if (exception === 'timeout') {
                    msg = 'Time out error.';
                } else if (exception === 'abort') {
                    msg = 'Ajax request aborted.';
                } else {
                    msg = 'Uncaught Error.\n' + jqXHR.responseText;
                }
                console.log(msg);
            },
        });


        // fetch('index.php/venta/insertVenta2', {
        //         method: 'POST',
        //         body: formData
        //     })
        //     .then(function(response) {
        //         if (response.ok) {
        //             return response.text()
        //         } else {
        //             throw "Error en la llamada Ajax";
        //         }

        //     })
        //     .then(function(texto) {
        //         console.log(texto);
        //     })
        //     .catch(function(err) {
        //         console.log(err);
        //     });

        console.log("Form Data");
        for (let obj of formData) {
            console.log(obj);
        }
    };


    function limpiar() {

        $("#carnet").val("");
        $("#idCli").val(0);
        $("#nombre").val("");
        $("#primerA").val("");
        $("#segundoA").val("");
        $("#producto").val("");
        $("#marca").val("");
        $("#precioU").val("");

        $(".even").remove();
        cambiarTotal();

    }
</script>
<script>/*
    let producto = [];
    let cliente = [];
    //para llamar los valores en javascript se usa el id y dentro del script se los llama usando #nombre
    //para implementar la funcionalidad de autocompletado en un campo de entrada
    $("#producto").autocomplete({ //llama al metodo autocomplete() de jQuery UI - campo de entrada con el id="producto"
        source: function(request, response) { 
            //función que se ejecuta para recuperar las sugerencias de autocompletado basadas en lo que el usuario ha escrito en el campo de entrada.
            // Fetch data - Recuperar data
            $.ajax({ //solicitud AJAX a una URL específica
                url: "<?= base_url() ?>index.php/administration/venta/productList", //direccionar a la funcion
                type: 'post', //Esto indica que se está realizando una solicitud HTTP POST al servidor
                dataType: "json",  //formato JSON
                data: { //envía la información de búsqueda al servidor
                    search: request.term
                },
                success: function(data) { //el servidor responde con datos en formato JSON
                    console.log(data);
                    response(data);
                },
                error: function(xhr, status) {
                    alert('Lo siento, se ha producido un error.');
                },
            });
        },
        //maneja la selección de un elemento de la lista de sugerencias de autocompletado. Cuando el usuario selecciona un elemento, se ejecuta esta función.
        select: function(event, ui) {
            $('#producto').val(ui.item.nombre); // display the selected text
            $('#marca').val(ui.item.marca); // display the selected text
            $('#categoria').val(ui.item.categoria); // display the selected text
            $('#precioU').val(ui.item.precioVenta); // save selected id to input
            $('button[id=agregarTabla]').removeAttr('disabled');
            producto = ui.item; //Almacena el objeto ui.item en una variable llamada "producto"
            return false;  //evitar que un formulario se envíe automáticamente después de la selección.
        }
    });


    $("#carnet").autocomplete({
        source: function(request, response) {
            // Fetch data
            $.ajax({
                url: "<?= base_url() ?>index.php/administration/venta/clientList",
                type: 'post',
                dataType: "json",
                data: {
                    search: request.term
                },
                success: function(data) {
                    // console.log(data);
                    response(data);
                }
            });
        },
        select: function(event, ui) {
            // Set selection
            $('#carnet').val(ui.item.value); // display the selected text
            $('#telefono').val(ui.item.telefono); // display the selected text
            $('#razon').val(ui.item.razonSocial); // save selected id to input
            $('#idCli').val(ui.item.idCliente); // save selected id to input
            cliente = ui.item;

            return false;
        }
    });

    console.log(producto);
    let count = 0;
    $(document).ready(function() {
        $("#agregarTabla").click(function() {
            // Para este ejemplo, en realidad no envíe el formulario
            event.preventDefault();
            markup = "<tr name='fila' id='fila" + count + "' class='even pointer'>" +
                "<td>" + producto.nombre + "<input class='form-control' name='idProducto[]' hidden type='number' value=" + producto.idProducto + " ></td>" +
                "<td>" + producto.marca + "</td>" +
                "<td>" + producto.categoria + "</td>" +
                "<td name='precio'>" + producto.precioVenta + "</td>" +
                "<td><input class='form-control' name='cantidad[]' onchange='cambiarSubtotal()' type='number' value='1'></td>" +
                "<td ><input class='form-control' name='subtotal[]' id='subtotal'  type='number' value=" + producto.precioVenta + " ></td>" +
                "<td> <input type='button' class='form-control'  onclick='eliminarFila(" + count + ");' value='Eliminar' /></td>" +
                "</tr>";
            tableBody = $("#bodyTabla");
            tableBody.append(markup);
            count += 1;
            cambiarTotal();

        });
    });

    function eliminarFila(index) {
        // console.log("#fila" + index);
        $("#fila" + index).remove();
        cambiarTotal();
    }

    const cambiarSubtotal = () => {

        let cantidad = document.getElementsByName("cantidad[]");
        let precio = document.getElementsByName("precio");
        //let stock = document.getElementsByName("stock[]");
        let subtotal = document.getElementsByName("subtotal[]");


        for (var i = 0; i < cantidad.length; i++) {
                subtotal[i].value = cantidad[i].value * precio[i].innerText;

        }
        cambiarTotal();

    };

    const cambiarTotal = () => {

        let subtotal = document.getElementsByName("subtotal[]");
        let total = document.getElementById('total');

        let count = 0;

        for (var i = 0; i < subtotal.length; i++) {
            count += Number(subtotal[i].value);
        }

        total.value = count;

    };


    const guardaryeditar = (e) => {
        e.preventDefault();
        // const form = document.getElementById("formulario12");
        // console.log(form);
        const formData = new FormData($("#formulario12")[0]);
        //formData.append("subtotal", document.getElementById("subtotal").value);
        formData.append("total", document.getElementById("total").value);
        formData.append("idUsuario", document.getElementById("idUsuario").value);
        formData.append("idSucursal", document.getElementById("idSucursal").value);
        //formData.append("idCli");
        formData.append("idCliente", cliente.idCliente);


        $.ajax({
            url: "<?= base_url() ?>index.php/administration/venta/insertVenta2",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,

            success: function(datos) {
                $('#ModalVenta').modal({
                    show: true
                });
                limpiar();
                console.log(datos);
            },
            error: function(jqXHR, status) {
                var msg = '';
                if (jqXHR.status === 0) {
                    msg = 'Not connect.\n Verify Network.';
                } else if (jqXHR.status == 404) {
                    msg = 'Requested page not found. [404]';
                } else if (jqXHR.status == 500) {
                    msg = 'Internal Server Error [500].';
                } else if (exception === 'parsererror') {
                    msg = 'Requested JSON parse failed.';
                } else if (exception === 'timeout') {
                    msg = 'Time out error.';
                } else if (exception === 'abort') {
                    msg = 'Ajax request aborted.';
                } else {
                    msg = 'Uncaught Error.\n' + jqXHR.responseText;
                }
                console.log(msg);
            },
        });

        console.log("Form Data");
        for (let obj of formData) {
            console.log(obj);
        }
    };


    function limpiar() {

        $("#carnet").val("");
        $("#idCli").val(0);
        $("#nombre").val("");
        $("#primerA").val("");
        $("#segundoA").val("");
        $("#producto").val("");
        $("#marca").val("");
        $("#precioU").val("");

        $(".even").remove();
        cambiarTotal();

    }*/
</script>