

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
                echo form_open_multipart('administration/cliente/agregarbd');
            ?>
                <div id="name">
                    <h2 class="name">Nombre Completo:</h2>
                    <input type="text" placeholder="Ingrse nombres" class="Nombres" name="nombre"> <br>
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

                <h2 class="name">Cedula de Identidad</h2>
                    <input type="text" placeholder="Cedula de indentidad." name="cinit" class="Ci">
                </div>
                    <h2 class="name">Direccion</h2>
                    <input type="text" placeholder="Ingrese una direccion." name="direccion" class="UserName">

                    <h2 class="name">Razon Social</h2>
                    <input type="text" placeholder="Ingrese la Razon Social." name="razonSocial" class="Password">

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
