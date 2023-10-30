<style>
    p{
        color: red;
        font-weight: 200;
        padding-top: -1px;
    }
    /* ----- MEDIAQUERIES ------ */ 
    @media screen and (max-width: 1024px) {
        main {
            max-width: 800px;
            width: 100%;
            margin: auto;
            padding: 40px;
        }
        /*Modificacion para responsibidad de columnas*/
        .columna1 {
            width: 8.33%;
        }
        .columna2 {
            width: 91.67%;
        }
        
        .formulario {
            grid-template-columns: 1fr; /*Una columna*/
        }
        .formulario__grupo {
            grid-column: 1;
        }
        #grupo__telefono, #grupo__ciNit {
            grid-column: 1;
        }
        #grupo__direccion, #grupo__razonSocial {
            grid-column: 1;
        }

        .formulario__btn {
            width: 100%;
        }
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-2 columna1">
        </div>
        <div class="col-md-10 columna2">
            <div class="regform">
                <h1>Registro de Clientes</h1>
            </div>

            <main class="main">
                
                <?php
                    echo form_open_multipart('administration/cliente/agregarbd', array('id' => 'formulario', 'class' => 'formulario', 'method' => 'post'));
                ?>
                        <div class="formulario__grupo" id="grupo__nombre">
                            <label for="nombre" class="formulario__label">Nombre:</label>
                            <div class="formulario__grupo-input">
                                <input type="text" class="formulario__input" name="nombre" id="nombre" placeholder="Ingrese el Nombre" value="<?php echo set_value('nombre'); ?>" >
                            </div>
                            <p><?php echo form_error('nombre'); ?></p> 
                        </div>

                        <!-- Grupo: Primer Apellido -->
                        <div class="formulario__grupo" id="grupo__primerApellido">
                            <label for="primerApellido" class="formulario__label">Primer Apellido:</label>
                            <div class="formulario__grupo-input">
                                <input type="text" class="formulario__input" name="primerApellido" id="primerApellido" placeholder="Primer Apellido" value="<?php echo set_value('primerApellido'); ?>">
                            </div>
                            <p><?php echo form_error('primerApellido'); ?></p>
                        </div>
                        <!-- Grupo: Segundo Apellido -->
                        <div class="formulario__grupo" id="grupo__segundoApellido">
                            <label for="segundoApellido" class="formulario__label">Segundo Apellido:</label>
                            <div class="formulario__grupo-input">
                                <input type="text" class="formulario__input" name="segundoApellido" id="segundoApellido" placeholder="Segundo Apellido" value="<?php echo set_value('segundoAPellido'); ?>">
                            </div>
                            <p><?php echo form_error('segundoApellido'); ?></p>
                        </div>
                        <!-- Grupo: Telefono/Celular -->
                        <div class="formulario__grupo" id="grupo__telefono">
                            <label for="telefono" class="formulario__label">Celular/Telefono:</label>
                            <div class="formulario__grupo-input">
                                <input type="text" class="formulario__input" name="telefono" id="telefono" placeholder="Celular/Telefono" value="<?php echo set_value('telefono'); ?>" >
                            </div>
                            <p><?php echo form_error('telefono'); ?></p>
                        </div>
                        <!-- Grupo: Cedula de Identidad -->
                        <div class="formulario__grupo" id="grupo__ciNit">
                            <label for="ciNit" class="formulario__label">Cedula de Identidad:</label>
                            <div class="formulario__grupo-input">
                                <input type="text" class="formulario__input" name="ciNit" id="ciNit" placeholder="" value="<?php echo set_value('ciNit'); ?>">
                            </div>
                            <p><?php echo form_error('ciNit'); ?></p>
                        </div>
                        <!-- Grupo: Direccion -->
                        <div class="formulario__grupo" id="grupo__direccion">
                            <label for="direccion" class="formulario__label">Dirección:</label>
                            <div class="formulario__grupo-input">
                                <input type="text" class="formulario__input" name="direccion" id="direccion" placeholder="Avenida/Calle" value="<?php echo set_value('direccion'); ?>">
                            </div>
                            <p><?php echo form_error('direccion'); ?></p>
                        </div>
                        <!-- Grupo: Razon Social -->
                        <div class="formulario__grupo" id="grupo__razonSocial">
                            <label for="razonSocial" class="formulario__label">Razón Social:</label>
                            <div class="formulario__grupo-input">
                                <input type="text" class="formulario__input" name="razonSocial" id="razonSocial" placeholder="" value="<?php echo set_value('razonSocial'); ?>">
                            </div>
                            <p><?php echo form_error('razonSocial'); ?></p>
                        </div>
            
                        <div class="formulario__grupo formulario__grupo-btn-enviar">
                            <button type="submit" class="formulario__btn">Registrar</button>
                        </div>
                <?php
                    echo form_close();
                ?>
            </main>

        </div>
    </div>
</div>
<!--
<script src="<?php echo base_url();?>bootstrap/js/formulario/formularioCliente.js"></script>  
<script src="<?php echo base_url();?>bootstrap/js/formulario/validacionCliente.js"></script>  -->
<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
