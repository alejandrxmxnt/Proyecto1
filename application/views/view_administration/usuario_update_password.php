<style>
    p{
        color: red;
        font-weight: 200;
        padding-top: -1px;
    }
    /* ----- MEDIAQUERIES ------ */ 
    @media screen and (max-width: 1024px) {
        main {
            max-width: 100%;
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

        #grupo__usuario, #grupo__password, #grupo__password2 {
            grid-column: 1;
        }

        .formulario__btn {
            grid-column: 1;
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
                <h1>Actualización de credenciales</h1>
            </div>

            <main class="main">
                <?php
                    echo form_open_multipart('administration/usuario/updatepassword', array('id' => 'formulario', 'class' => 'formulario', 'method' => 'post'));
                ?>
                    <!-- Grupo: PERFIL ACTUALIZAR CONTRASEÑA -->
                    <!-- Grupo: USUARIO -->
                     <input type="hidden" name="idUsuario" value="<?php echo $this->session->userdata('id'); ?>"> 
                    <div class="formulario__grupo" id="grupo__usuario">
                        <label for="usuario" class="formulario__label">Contraseña Actual:</label>
                        <div class="formulario__grupo-input">
                            <input type="password" class="formulario__input" name="usuario" id="usuario" placeholder="Contraseña Actual">
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                        </div>
                        <p class="formulario__input-error">Contraseña no valida.</p>
                    </div>

                    <!-- Grupo: Contraseña -->
                    <div class="formulario__grupo" id="grupo__password">
                        <label for="password" class="formulario__label">Contraseña Nueva:</label>
                        <div class="formulario__grupo-input">
                            <input type="password" class="formulario__input" name="password" id="password" placeholder="Contraseña nueva">
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                        </div>
                        <p class="formulario__input-error">La contraseña tiene que ser de 6 a 20 caracteres.</p>
                    </div>

                    <!-- Grupo: Contraseña 2 -->
                    <div class="formulario__grupo" id="grupo__password2">
                        <label for="password2" class="formulario__label">Repetir Contraseña:</label>
                        <div class="formulario__grupo-input">
                            <input type="password" class="formulario__input" name="password2" id="password2" placeholder="Contraseña nueva">
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                        </div>
                        <p class="formulario__input-error">Ambas contraseñas deben ser iguales.</p>
                    </div>
        
                    <!-- MENSAJE DE ERROR -->
                    <div class="formulario__mensaje" id="formulario__mensaje">
                        <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena los campos. </p>
                    </div>

                    <div class="formulario__grupo formulario__grupo-btn-enviar">
                            <button type="submit" class="formulario__btn">Registrar</button>
                            <!--
                            <button type="submit" class="formulario__btn">Enviar</button>
    -->
                            <p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Formulario enviado exitosamente!</p>
                    </div>
        
                <?php
                    echo form_close();
                ?>
            </main>

        </div>
    </div>
</div>
<!--
<script src="<?php echo base_url();?>bootstrap/js/formulario/formularioCliente.js"></script>   -->
<script src="<?php echo base_url();?>bootstrap/js/formulario/validarUpdatePassword.js"></script> 
<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
