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
        #grupo__nombre, #grupo__primerApellido, #grupo__segundoApellido {
            grid-column: 1;
        }

        #grupo__telefono, #grupo__ciNit {
            grid-column: 1;
        }
        #grupo__correo {
            grid-column: 1;
        }
        #grupo__rol {
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
                <h1>Registro de Usuarios</h1>
            </div>

            <main class="main">
                <?php
                    foreach ($infousuario->result() as $row) {
                    echo form_open_multipart('administration/usuario/modificarbd', array('id' => 'formulario', 'class' => 'formulario', 'method' => 'post'));
                ?>
                    <input type="hidden" class="form-control p-0 border-0" name="idusuario" value="<?php echo $row->id; ?>">
                    <div class="formulario__grupo" id="grupo__nombre">
                        <label for="nombre" class="formulario__label">Nombre:</label>
                        <div class="formulario__grupo-input">
                            <input type="text" class="formulario__input" name="nombre" id="nombre" placeholder="Ingrese el Nombre" value="<?php echo $row->nombre; ?>">
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                        </div>
                        <p><?php // echo form_error('nombre'); ?></p>
                    </div>

                    <!-- Grupo: Primer Apellido -->
                    <div class="formulario__grupo" id="grupo__primerApellido">
                        <label for="primerApellido" class="formulario__label">Primer Apellido:</label>
                        <div class="formulario__grupo-input">
                            <input type="text" class="formulario__input" name="primerApellido" id="primerApellido" placeholder="Primer Apellido" value="<?php echo $row->primerApellido; ?>">
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                        </div>
                        <p><?php // echo form_error('primerApellido'); ?></p>
                    </div>
                    <!-- Grupo: Segundo Apellido -->
                    <div class="formulario__grupo" id="grupo__segundoApellido">
                        <label for="segundoApellido" class="formulario__label">Segundo Apellido:</label>
                        <div class="formulario__grupo-input">
                            <input type="text" class="formulario__input" name="segundoApellido" id="segundoApellido" placeholder="Segundo Apellido" value="<?php echo $row->segundoApellido; ?>">
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                        </div>
                        <p><?php // echo form_error('segundoApellido'); ?></p>
                    </div>
                    <!-- Grupo: Telefono/Celular -->
                    <div class="formulario__grupo" id="grupo__telefono">
                        <label for="telefono" class="formulario__label">Celular/Telefono:</label>
                        <div class="formulario__grupo-input">
                            <input type="text" class="formulario__input" name="telefono" id="telefono" placeholder="Celular/telefono" value="<?php echo $row->celular; ?>">
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                        </div>
                        <p><?php // echo form_error('telefono'); ?></p>
                    </div>
                    <!-- Grupo: Cedula de Identidad -->
                    <div class="formulario__grupo" id="grupo__ciNit">
                        <label for="ciNit" class="formulario__label">Cedula de Identidad:</label>
                        <div class="formulario__grupo-input">
                            <input type="text" class="formulario__input" name="ci" id="ci" placeholder="Cedula de identidad" value="<?php echo $row->ci; ?>">
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                        </div>
                        <p><?php // echo form_error('ci'); ?>.</p>
                    </div>
                    <!-- Grupo: Correo -->
                    <div class="formulario__grupo" id="grupo__correo">
                        <label for="correo" class="formulario__label">Correo Electronico:</label>
                        <div class="formulario__grupo-input">
                            <input type="email" class="formulario__input" name="correo" id="correo" placeholder="correo@correo.com" value="<?php echo $row->correo; ?>">
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                        </div>
                        <p><?php // echo form_error('correo'); ?></p>
                    </div>

                    <div class="formulario__grupo" id="grupo__rol">
                        <label for="rol" class="formulario__label">Rol:</label>
                        <div class="formmulario__grupo-input">
                            <select name="subject" class="option" value="<?php echo $row->rol; ?>">
                                <option value="INVITADO">Invitado</option>
                                <option value="ADMINISTRADOR">Administrador</option>
                            </select>
                        </div>
                    </div>
        
                    <div class="formulario__grupo formulario__grupo-btn-enviar">
                        <button type="submit" class="formulario__btn">Registrar</button>
                    </div>
                <?php
                    echo form_close();
                    }
                ?>
            </main>

        </div>
    </div>
</div>
<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>