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
                echo form_open_multipart('administration/usuario/agregarbd');
                ?>
                <div id="name">
                    <h2 class="name">Nombre Completo:</h2>
                    <input type="text" placeholder="Ingrese nombres" class="Nombres" name="nombre" value="<?php echo set_value('nombre'); ?>" autofocus required> <br>
                    <?php echo form_error('nombre'); ?>
                    <label class="firstlabel">Nombres</label>
                    <input type="text" placeholder="Ingrese Apellido" class="Apellido1" name="apellido1" value="<?php echo set_value('apellido1'); ?>" required> 
                    <?php echo form_error('apellido1'); ?>
                    <label class="ape1">Primer Apellido</label>
                    <input type="text" placeholder="Ingrese Apellido" class="Apellido2" name="apellido2" value="<?php echo set_value('apellido2'); ?>">
                    <?php echo form_error('apellido2'); ?>
                    <label class="ape2">Segundo Apellido</label> 
                </div>
                <br>
                <div>
                    <h2 class="name">Telefono/Celular</h2>
                    <input type="text" placeholder="Ingrese el numero." name="celular" class="Telefono" value="<?php echo set_value('celular'); ?>" required>
                    <?php echo form_error('celular'); ?>
                    <h2 class="name">Cedula de Identidad</h2>
                    <input type="text" placeholder="Cedula de indentidad." name="ci" class="Ci"  required>
                </div>
                    <h2 class="name">Correo Electronico</h2>
                    <input type="email" placeholder="Ingrese el @gmail.com" name="correo" class="UserName" required>
                    <input type="hidden" name="password" class="Password">
                    <input type="hidden" name="userName" class="Password">
                
                    <h2 class="name">Rol</h2>
                        <select name="subject" class="option" required>
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
