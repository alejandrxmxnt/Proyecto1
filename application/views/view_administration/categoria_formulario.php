<div class="container">
    <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-10">
            <div class="regform">
                <h1>REGISTRO DE CATEGORIAS</h1>
            </div>

            <div class="main">
            <?php
                echo form_open_multipart('administration/categoria/agregarbd');
            ?>
                <div id="name">
                    <h2 class="name">Nombre</h2>
                    <input type="text" placeholder="Ingrese el nombre" class="Nombres" name="nombre" required> <br>
                    <label class="firstlabel">Nombre</label>
                </div>
                <br>
                <div>
                <h2 class="name">Descripcion</h2>
                <textarea placeholder="Ingrese el numero." name="detalle" class="Detalle"></textarea>
                <label class="description">Descripcion</label>
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