<div class="container">
    <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-10">
            <div class="regform">
                <h1>Actualización Usuarios</h1>
            </div>

            <div class="main">
            <?php
                foreach ($infousuario->result() as $row) {
                echo form_open_multipart('administration/usuario/modificarbd');
            ?>
            <input type="hidden" class="form-control p-0 border-0" name="idusuario" value="<?php echo $row->id; ?>">
                <div id="name">
            <div id="name">
                <h2 class="name">Nombre Completo:</h2>
                <input type="text" placeholder="Ingrse nombres" class="Nombres" name="nombre" value="<?php echo $row->nombre; ?>" autofocus required> <br>
                <label class="firstlabel">Nombres</label>
                <input type="text" placeholder="Ingrese Apellido" class="Apellido1" name="apellido1" value="<?php echo $row->primerApellido; ?>" required> 
                <label class="ape1">Primer Apellido</label>
                <input type="text" placeholder="Ingrese Apellido" class="Apellido2" name="apellido2" value="<?php echo $row->segundoApellido; ?>">
                <label class="ape2">Segundo Apellido</label> 
            </div>
            <br>
            <div>
                <h2 class="name">Telefono/Celular</h2>
                <input type="text" placeholder="Ingrese el numero." name="celular" class="Telefono" value="<?php echo $row->celular; ?>" required>

                <h2 class="name">Cedula de Identidad</h2>
                <input type="text" placeholder="Cedula de indentidad." name="ci" class="Ci" value="<?php echo $row->ci; ?>" required>
            </div>
                <h2 class="name">Correo Electronico</h2>
                <input type="email" placeholder="Ingrese el @gmail.com" name="correo" class="UserName" value="<?php echo $row->correo; ?>" required>
            
                <h2 class="name">Rol</h2>
                    <select name="subject" class="option" value="<?php echo $row->rol; ?>" required>
                        <option value="INVITADO">Invitado</option>
                        <option value="ADMINISTRADOR">Administrador</option>
                    </select>

                    <div class="form-group mb-4">
                        <button type="submit">Registrar</button>
                    </div>
                </div>
                    <?php
                        echo form_close();
                        }
                    ?>
            </div>
        </div>
    </div>
</div>
