<div class="container">
    <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-10">
            <div class="regform">
                <h1>Registro de Usuarios</h1>
            </div>

            <div class="main">
                <?php
                echo form_open_multipart('administration/usuario/agregarbd', array('id' => 'formulario__usuario'));
                ?>
                <div id="name">
                    <h2 class="name">Nombre Completo:</h2>
                    <input type="text" placeholder="Ingrese nombres" class="Nombres" name="nombre" autofocus> <br>
                    <label class="firstlabel">Nombres</label>
                    <input type="text" placeholder="Ingrese Apellido" class="Apellido1" name="apellido1"> 
                    <label class="ape1">Primer Apellido</label>
                    <input type="text" placeholder="Ingrese Apellido" class="Apellido2" name="apellido2">
                    <label class="ape2">Segundo Apellido</label> 
                </div>
                <br>
                <div>
                    <h2 class="name">Telefono/Celular</h2>
                    <input type="text" placeholder="Ingrese el numero." name="celular" class="Telefono">
                    <?php echo form_error('celular'); ?>
                    <h2 class="name">Cedula de Identidad</h2>
                    <input type="text" placeholder="Cedula de indentidad." name="ci" class="Ci" >
                </div>
                    <h2 class="name">Correo Electronico</h2>
                    <input type="email" placeholder="Ingrese el @gmail.com" name="correo" class="UserName">
                    <input type="hidden" name="password" class="Password">
                    <input type="hidden" name="userName" class="Password">
                
                    <h2 class="name">Rol</h2>
                        <select name="subject" class="option">
                            <option value="INVITADO">Invitado</option>
                            <option value="ADMINISTRADOR">Administrador</option>
                        </select>

                        <div class="form-group mb-4">
                            <button type="submit">Registrar</button>
                        </div>
                    </div>

                <?php
                echo form_close();
                ?>
            </div>
        </div>
    </div>
</div>

<!-- VALIDACION FORMULARIO JQUERY -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/jquery-1.8.2.min.js" integrity="sha512-TioVFI1HfPAFh7BGAsuCB76vIrmMroWB+yRNKnTan26OBCdpdH9DWYoTxZbjW8kCKH3QDItheAEVso5N7+w75g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- PARA EL QUE LOS MENSAJES SANGAN EN ESPAÑOL-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/languages/jquery.validationEngine-es.min.js" integrity="sha512-GCKyaseskD91hTJv68w+ldDh2vU5iURF1/pIDyAY+Bv3MZhceURuVe3GZMgPXYUb+W41oTHz2CRrTOhkdvE6SQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!--LIBRERIA DE JQUERY-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/jquery.validationEngine.min.js" integrity="sha512-MKqdT8JgKftxlK6oK4S+Hh44ivKyaPncl6qN9JZEGKJGQZJMiSoPzehLcbvd/1XMieEP1Q4A3wzzhTrvBUUcUQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script>
    $(document).ready(() => {
        $('#formulario__usuario').validationEngine();
    });
</script>
