<div class="container">
    <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-10">
            <div class="regform">
                <h1>ACTUALIZAR REGISTRO DE CATEGORIAS</h1>
            </div>

            <div class="main">
            <?php
                foreach ($infocategoria->result() as $row) {
                echo form_open_multipart('administration/categoria/modificarbd');
            ?>
            <input type="hidden" class="form-control p-0 border-0" name="idcategoria" value="<?php echo $row->id; ?>">
                <div id="name">
                    <h2 class="name">Nombre</h2>
                    <input type="text" placeholder="Ingrese el nombre" class="Nombres" name="nombre" value="<?php echo $row->nombre; ?>"> <br>
                    <label class="firstlabel">Nombre</label>
                </div>
                <br>
                <div>
                <h2 class="name">Descripcion</h2>
                <textarea placeholder="Ingrese el numero." name="detalle" class="Detalle" ><?php echo $row->descripcion; ?></textarea>
                <label class="description">Descripcion</label>
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
