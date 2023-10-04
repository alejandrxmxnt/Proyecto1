<style>
    p{
        color: red;
        font-weight: 200;
        padding-top: -1px;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-10">
            <div class="regform">
                <h1>Subir imagenes de producto</h1>
            </div>

            <main class="main">
                <?php
                    echo form_open_multipart('administration/producto/subir', array('id' => 'formulario', 'class' => 'formulario', 'method' => 'post'));
                ?>
                    <!-- Grupo: PRODUCTO -->
                    <input type="hidden" name="id" value="<?php echo $id; ?>"> 

                    <!-- Grupo: CARGA DE IMAGENES -->
                    <div class="formulario__grupo" id="grupo__foto">
                        <label for="foto" class="formulario__label">Seleccione imagenes para subir:</label>
                        <div class="formulario__grupo-input">                 
                            <input type="file" name="userfile" id="foto" class="formulario__input" multiple>
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                        </div> 
                        <p></p>
                    </div>

                    <div class="formulario__grupo formulario__grupo-btn-enviar">
                            <button type="submit" class="formulario__btn">Subir</button>
                            <!--
                            <button type="submit" class="formulario__btn">Enviar</button>
    -->
                    </div>
        
                <?php
                    echo form_close();
                ?>
            </main>

        </div>
    </div>
</div>
<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>










<!--
<div class="container">
    <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-10">
            <div class="regform">
                <h1>AGREGADO DE PRODUCTOS</h1>
            </div>

            <div class="main">
            <?php
                //echo form_open_multipart('administration/producto/agregarbd');
            ?>
                <div id="name">
                    <h2 class="name">Nombre Completo:</h2>
                    <input type="text" placeholder="Ingrese el nombre." class="Nombres" name="nombre"> <br>
                    <label class="firstlabel">Nombre del Producto</label>
                </div>
                <br>
                <div>
                    <h2 class="name">Descripción: </h2>
                    <textarea class="descripcion" name="descripcion" placeholder="Descripcion de producto"></textarea>
                </div>
                <div id="name">
                    <h2 class="name">Datos: </h2>
                    <input type="number" step="0.01" placeholder="P/U" class="PrecioUnitario" name="precioUnitario" required> <br>
                    <label class="firstlabel">Precio Unitario</label>
                    <input type="number" placeholder="Ignrese Stock" class="Stock" name="stock" required> 
                    <label class="ape1">Stock Disponible</label>
                    <input type="text" placeholder="Ingrese el Codigo" class="Codigo" name="codigo">
                    <label class="ape2">Codigo Producto</label> 
                </div>
                <div>
                    <input type="file" name="foto" class="Imagen" multiple>
                    <label class="tituloImagen">Seleccione imagenes para subir</label>
                </div>
                <div>
                    <!--
                    <h2 class="name">Categoria</h2>
                    <select name="opciones" id="opciones">
                       <?php //imprimir las categorias
                       /*while ($row = $result->fetch_assoc()) {
                       echo '<option value="' . $row['nombre'] . '">' . $row['nombre'] . '</option>';
                       }*/
                       ?> 
                    </select> 
                </div>
                <div class="form-group mb-4">
                    <button type="submit">Registrar</button>
                </div>
                </div>

                    <?php
                        //echo form_close();
                    ?>
            </div>
        </div>
    </div>
</div>
                    -->
                    