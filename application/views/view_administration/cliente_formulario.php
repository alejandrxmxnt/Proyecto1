<div class="container">
    <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-10">
            <div class="regform">
                <h1>Registro de Clientes</h1>
            </div>

            <main class="main">
                
                <?php
                    echo form_open_multipart('administration/cliente/agregarbd', array('id' => 'formulario', 'class' => 'formulario', 'method' => 'post'));
                ?>
<!--
                    <form action="<?php echo base_url(); ?>index.php/administration/cliente/agregarbd" method="post" class="formulario" id="formulario">  -->
                        <!-- Grupo: NOMBRE COMPLETO -->
                        <!-- Grupo: Nombre -->
                        <div class="formulario__grupo" id="grupo__nombre">
                            <label for="nombre" class="formulario__label">Nombre:</label>
                            <div class="formulario__grupo-input">
                                <input type="text" class="formulario__input" name="nombre" id="nombre" placeholder="Ingrese el Nombre">
                                <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            </div>
                            <p class="formulario__input-error">Solo se permite letras de la A-Z</p>
                        </div>
                        <!-- Grupo: Primer Apellido -->
                        <div class="formulario__grupo" id="grupo__primerApellido">
                            <label for="primerApellido" class="formulario__label">Primer Apellido:</label>
                            <div class="formulario__grupo-input">
                                <input type="text" class="formulario__input" name="primerApellido" id="primerApellido" placeholder="Primer Apellido">
                                <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            </div>
                            <p class="formulario__input-error">Solo se permite letras de la A-Z.</p>
                        </div>
                        <!-- Grupo: Segundo Apellido -->
                        <div class="formulario__grupo" id="grupo__segundoApellido">
                            <label for="segundoApellido" class="formulario__label">Segundo Apellido:</label>
                            <div class="formulario__grupo-input">
                                <input type="text" class="formulario__input" name="segundoApellido" id="segundoApellido" placeholder="Segundo Apellido">
                                <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            </div>
                            <p class="formulario__input-error">Solo se permite letras de la A-Z.</p>
                        </div>
                        <!-- Grupo: Telefono/Celular -->
                        <div class="formulario__grupo" id="grupo__telefono">
                            <label for="telefono" class="formulario__label">Celular/Telefono:</label>
                            <div class="formulario__grupo-input">
                                <input type="text" class="formulario__input" name="telefono" id="telefono" placeholder="Celular/Telefono" >
                                <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            </div>
                            <p class="formulario__input-error">Solo se permiten numeros y no puede quedar vacio.</p>
                        </div>
                        <!-- Grupo: Cedula de Identidad -->
                        <div class="formulario__grupo" id="grupo__ciNit">
                            <label for="ciNit" class="formulario__label">Cedula de Identidad:</label>
                            <div class="formulario__grupo-input">
                                <input type="text" class="formulario__input" name="ciNit" id="ciNit" placeholder="">
                                <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            </div>
                            <p class="formulario__input-error">La cedula de identidad solo puede contener letras, numeros y guiones.</p>
                        </div>
                        <!-- Grupo: Direccion -->
                        <div class="formulario__grupo" id="grupo__direccion">
                            <label for="direccion" class="formulario__label">Dirección:</label>
                            <div class="formulario__grupo-input">
                                <input type="text" class="formulario__input" name="direccion" id="direccion" placeholder="Avenida/Calle">
                                <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            </div>
                            <p class="formulario__input-error">La dirección solo puede contener letras, numeros y guiones.</p>
                        </div>
                        <!-- Grupo: Razon Social -->
                        <div class="formulario__grupo" id="grupo__razonSocial">
                            <label for="razonSocial" class="formulario__label">Razón Social:</label>
                            <div class="formulario__grupo-input">
                                <input type="text" class="formulario__input" name="razonSocial" id="razonSocial" placeholder="">
                                <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            </div>
                            <p class="formulario__input-error">La cedula de identidad solo puede contener letras, numeros y guiones.</p>
                        </div>
            
                        <div class="formulario__mensaje" id="formulario__mensaje">
                            <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
                        </div>
            
                        <div class="formulario__grupo formulario__grupo-btn-enviar">
                            <button type="submit" class="formulario__btn">Registrar</button>
                            <!--
                            <button type="submit" class="formulario__btn">Enviar</button>
    -->
                            <p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Formulario enviado exitosamente!</p>
                        </div>

                        <!--
                    </form>
    -->
                <?php
                    echo form_close();
                ?>
            </main>

        </div>
    </div>
</div>
<!--
<script src="<?php echo base_url();?>bootstrap/js/formulario/formularioCliente.js"></script>  -->
<script src="<?php echo base_url();?>bootstrap/js/formulario/validacionCliente.js"></script>
<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
