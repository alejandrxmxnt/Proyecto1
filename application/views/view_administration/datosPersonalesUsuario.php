<style>
    p{
        color: red;
        font-weight: 200;
        padding-top: -1px;
    }
    .formulario_label {
        font-size: 100px;
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
                <h1>INFORMACIÓN PERSONAL</h1>
            </div>

            <main class="main">
                <?php
                    echo form_open_multipart('administration/usuario/updatepassword', array('id' => 'formulario', 'class' => 'formulario', 'method' => 'post'));
                    foreach($personal->result() as $row){
                ?>
                    <!-- Grupo: PERFIL ACTUALIZAR CONTRASEÑA -->
                    <!-- Grupo: USUARIO -->
                    <div style="display: flex;">
                        <div style="flex: 1;">
                            <div style="display: flex;">
                                <label class="formulario__label" style="font-weight: 700;">Nombre Completo:</label>
                                <label class="formulario__label"><?php echo $row->nombre,' ', $row->primerApellido,' ',$row->segundoApellido;?></label>
                            </div>
                            <div style="display: flex;">
                                <label class="formulario__label" style="font-weight: 700;">Cedula de Identidad:</label>
                                <label class="formulario__label"><?php echo $row->ci;?></label>
                            </div>
                            <div style="display: flex;">
                                <label class="formulario__label" style="font-weight: 700;">Celular / Telefono:</label>
                                <label class="formulario__label"><?php echo $row->celular;?></label>
                            </div>
                            <div style="display: flex;">
                                <label class="formulario__label" style="font-weight: 700;">Nombre de Usuario:</label>
                                <label class="formulario__label">
                                    <?php 
                                        $user = $this->session->userdata('login');
                                        echo $user;
                                    ?>
                                </label>
                            </div>
                            <div style="display: flex;">
                                <label class="formulario__label" style="font-weight: 700;">ROL:</label>
                                <label class="formulario__label">
                                    <?php
                                        $rol = $this->session->userdata('tipo');
                                        echo $rol;
                                    ?>
                                </label>
                            </div>
                            <div style="display: flex;">
                                <label class="formulario__label" style="font-weight: 700;">Actualizar Credenciales:</label>
                                <a href="<?php echo base_url();?>index.php/administration/usuario/usuario_update_password" class="btn btn-danger text-white" style="font-size: 12px; width: 100px; height: 30px;">
                                    Actualizar</a>
                            </div>
                        </div>
                        <div style="flex: 1;">
                            <img src="<?php echo base_url();?>img/logos/logomuebleria4.jpg" style="max-width: 100%; height: auto;">
                        </div>
                    </div>
                    
                    
                    
                    
                    
                        
                        <br>
                <?php
                    }
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
