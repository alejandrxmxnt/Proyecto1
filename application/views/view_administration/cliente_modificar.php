<div class="container">
    <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-10">
            <div class="regform">
                <h1>REGISTRO CLIENTE</h1>
            </div>

            <div class="main">
            <?php
                foreach ($infocliente->result() as $row) {
                echo form_open_multipart('administration/cliente/modificarbd');
            ?>
            <input type="hidden" class="form-control p-0 border-0" name="idcliente" value="<?php echo $row->id; ?>">

                <div id="name">
                    <h2 class="name">Nombre Completo:</h2>
                    <input type="text" placeholder="Ingrse nombres" class="Nombres" name="nombre" value="<?php echo $row->nombre; ?>"> <br>
                    <label class="firstlabel">Nombres</label>
                    <input type="text" placeholder="Ingrese Apellido" class="Apellido1" name="apellido1" value="<?php echo $row->primerApellido; ?>"> 
                    <label class="ape1">Primer Apellido</label>
                    <input type="text" placeholder="Ingrese Apellido" class="Apellido2" name="apellido2" value="<?php echo $row->segundoApellido; ?>">
                    <label class="ape2">Segundo Apellido</label> 
                </div>
                <br>
                <div>
                <h2 class="name">Telefono/Celular</h2>
                    <input type="text" placeholder="Ingrese el numero." name="celular" class="Telefono" value="<?php echo $row->telefono; ?>">

                <h2 class="name">Cedula de Identidad</h2>
                    <input type="text" placeholder="Cedula de indentidad." name="cinit" class="Ci" value="<?php echo $row->ciNit; ?>">
                </div>
                    <h2 class="name">Direccion</h2>
                    <input type="text" placeholder="Ingrese una direccion." name="direccion" class="UserName" value="<?php echo $row->direccion; ?>">

                    <h2 class="name">Razon Social</h2>
                    <input type="text" placeholder="Ingrese la Razon Social." name="razonSocial" class="Password" value="<?php echo $row->razonSocial; ?>">

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

