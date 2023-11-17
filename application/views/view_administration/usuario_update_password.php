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
                     <input type="hidden" name="idUsuario" id="idUsuario" value="<?php echo $this->session->userdata('id'); ?>"> 
                    <div class="formulario__grupo" id="grupo__usuario">
                        <label for="usuario" class="formulario__label">Contraseña Actual:</label>
                        <div class="formulario__grupo-input">
                        <input type="hidden" name="detalle_data" id="detalle_data" value="">
                            <input type="password" class="formulario__input" name="usuario" id="usuario" placeholder="Contraseña Actual" oninput="generateHash()" value="<?php echo set_value('usuario'); ?>">
                            <input type="hidden" id="hashResult" name="hashResult" readonly>
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                        </div>
                        <p class="formulario__input-error"><?php echo form_error('usuario'); ?></p>
                    </div>

                    <!-- Grupo: Contraseña -->
                    <div class="formulario__grupo" id="grupo__password">
                        <label for="password" class="formulario__label">Contraseña Nueva:</label>
                        <div class="formulario__grupo-input">
                            <input type="password" class="formulario__input" name="password" id="password" placeholder="Contraseña nueva" value="<?php echo set_value('password'); ?>">
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                        </div>
                        <p class="formulario__input-error"><?php echo form_error('password'); ?></p>
                    </div>

                    <!-- Grupo: Contraseña 2 -->
                    <div class="formulario__grupo" id="grupo__password2">
                        <label for="password2" class="formulario__label">Repetir Contraseña:</label>
                        <div class="formulario__grupo-input">
                            <input type="password" class="formulario__input" name="password2" id="password2" placeholder="Contraseña nueva" value="<?php echo set_value('password2'); ?>">
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                        </div>
                        <p class="formulario__input-error"><?php echo form_error('password2'); ?></p>
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
<!--
<script src="<?php echo base_url();?>bootstrap/js/formulario/validarUpdatePassword.js"></script>  -->
<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>

<script>
let hashMD5 = ''; // Variable global para almacenar el hash MD5

function generateHash() {
    var usuario = document.getElementById("usuario").value;
    var password = document.getElementById("hashResult").value;
    /*
    var contrasenia1 = document.getElementById("password").value;
    var contrasenia2 = document.getElementById("password2").value;
    var datosJSON = JSON.stringify(datos);
    var datos = [];*/
    hashMD5 = CryptoJS.MD5(usuario).toString();
    document.getElementById("hashResult").value = hashMD5;
    //validarCampo(expresiones.usuario, document.getElementById('usuario'), 'usuario');
    /*
    if(usuario === password){
        if(contrasenia1 === contrasenia2){
            var filaData = {
                password: contrasenia1
            };
            datos.push(filaData);

            $("#detalle_data").val(datosJSON);
        }
    }else{
        swal("Error!", "La contraseña es incorrecta. Por favor, inténtelo de nuevo.", "error");
    }*/
}
/*
const validarCampo = (expresion, input, campo) => {
    const valorCampo = input.value;

    if (expresion.test(valorCampo) && hashMD5 === CryptoJS.MD5(valorCampo).toString()) {
        document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto');
        document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-correcto');
        document.querySelector(`#grupo__${campo} i`).classList.add('fa-check-circle');
        document.querySelector(`#grupo__${campo} i`).classList.remove('fa-times-circle');
        document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
        campos[campo] = true;
    } else {
        document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-incorrecto');
        document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto');
        document.querySelector(`#grupo__${campo} i`).classList.add('fa-times-circle');
        document.querySelector(`#grupo__${campo} i`).classList.remove('fa-check-circle');
        document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
        campos[campo] = false;
    }
}
const validarPassword2 = () => {
	const inputPassword1 = document.getElementById('password');
	const inputPassword2 = document.getElementById('password2');

	if(inputPassword1.value !== inputPassword2.value){
		document.getElementById(`grupo__password2`).classList.add('formulario__grupo-incorrecto');
		document.getElementById(`grupo__password2`).classList.remove('formulario__grupo-correcto');
		document.querySelector(`#grupo__password2 i`).classList.add('fa-times-circle');
		document.querySelector(`#grupo__password2 i`).classList.remove('fa-check-circle');
		document.querySelector(`#grupo__password2 .formulario__input-error`).classList.add('formulario__input-error-activo');
		campos['password'] = false;
	} else {
		document.getElementById(`grupo__password2`).classList.remove('formulario__grupo-incorrecto');
		document.getElementById(`grupo__password2`).classList.add('formulario__grupo-correcto');
		document.querySelector(`#grupo__password2 i`).classList.remove('fa-times-circle');
		document.querySelector(`#grupo__password2 i`).classList.add('fa-check-circle');
		document.querySelector(`#grupo__password2 .formulario__input-error`).classList.remove('formulario__input-error-activo');
		campos['password'] = true;
	}
}

inputs.forEach((input) => {
	input.addEventListener('keyup', validarFormulario);
	input.addEventListener('blur', validarFormulario);
});

formulario.addEventListener('submit', (e) => {
	e.preventDefault();

	if (campos.usuario && campos.password) {
        formulario.submit(); // Envía el formulario si los campos son válidos
    } else {
        document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
    }
});
*/
</script>
