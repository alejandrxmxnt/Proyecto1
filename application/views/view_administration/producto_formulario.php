<style>
    p{
        color: red;
        font-weight: 200;
        padding-top: -1px;
    }
    /* ----- MEDIAQUERIES ------ */ 
    @media screen and (max-width: 1024px) {
        main {
            max-width: 800px;
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
        #grupo__nombre {
            grid-column: 1;
        }
        #grupo__descripcion{
            grid-column: 1;
            width: 100%;
            height: 200px;
            min-width: 80%;
            resize: vertical;
            top: -50px; /*separacion de un texto con otro por asi desirce interlineado*/
            color: black;
        }
        #grupo__precioUnitario {
            grid-column: 1;
        }
        #grupo__stock {
            grid-column: 1;
        }
        #grupo__foto {
            grid-column: 1;
        }
        .formulario__btn {
            grid-column: 1;
            text-align: center;
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
                <h1>Registro de Productos</h1>
            </div>

            <main class="main">
                <?php
                    echo form_open_multipart('administration/producto/agregarbd', array('id' => 'formulario', 'class' => 'formulario', 'method' => 'post'));
                ?>
                    <!-- Grupo: PRODUCTO -->
                    <!-- Grupo: Nombre -->
                    <div class="formulario__grupo" id="grupo__nombre">
                        <label for="nombre" class="formulario__label">Nombre:</label>
                        <div class="formulario__grupo-input">
                            <input type="text" class="formulario__input" name="nombre" id="nombre" placeholder="Ingrese el Nombre" value="<?php echo set_value('nombre'); ?>" required>
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                        </div>
                        <p><?php echo form_error('nombre'); ?></p>
                    </div>
                    <!-- Grupo: Descripcion -->
                    <div class="formulario__grupo" id="grupo__descripcion">
                        <label for="descripcion" class="formulario__label">Descripción:</label>
                        <div class="formulario__grupo-input">
                            <textarea class="formulario__input" name="descripcion" id="descripcion" value="<?php// echo set_value('descripcion'); ?>" placeholder="Descripcion de producto"></textarea>    
                            <!-- <input type="text" class="formulario__input" name="descripcion" id="descripcion" placeholder="Descripción"> -->
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                        </div>
                        <p><?php// echo form_error('descripcion'); ?></p>
                    </div>
                    <!-- Grupo: Segundo Precio Unitario -->
                    <div class="formulario__grupo" id="grupo__precioUnitario">
                        <label for="precioUnitario" class="formulario__label">Precio Unitario Bs.:</label>
                        <div class="formulario__grupo-input">
                            <input type="text" class="formulario__input" name="precioUnitario" id="precioUnitario" value="<?php echo set_value('precioUnitario'); ?>" placeholder=" Bs.">
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                        </div>
                        <p><?php echo form_error('precioUnitario'); ?></p>
                    </div>
                    <!-- Grupo: Stock -->
                    <div class="formulario__grupo" id="grupo__stock">
                        <label for="stock" class="formulario__label">Stock:</label>
                        <div class="formulario__grupo-input">
                            <input type="text" class="formulario__input" name="stock" id="stock" value="<?php echo set_value('stock'); ?>" placeholder="Stock Disponible" >
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                        </div>
                        <p><?php echo form_error('stock'); ?></p>
                    </div>
                    <!-- Grupo: Codigo Producto -->
                    <div class="formulario__grupo" id="grupo__codigo">
                        <label for="codigo" class="formulario__label">Codigo:</label>
                        <div class="formulario__grupo-input">
                            <input type="text" class="formulario__input" name="codigo" id="codigo" value="<?php echo set_value('codigo'); ?>" placeholder="Codigo Producto">
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                        </div>
                        <p><?php echo form_error('codigo'); ?></p>
                    </div>
                    <!-- Grupo: CARGA DE IMAGENES -->
                    <div class="formulario__grupo" id="grupo__foto">
                        <label for="foto" class="formulario__label">Seleccione imagenes para subir:</label>
                        <div class="formulario__grupo-input">                 
                            <input type="file" name="foto" id="foto" class="formulario__input" value="<?php// echo set_value('foto'); ?>" multiple>
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                        </div> 
                        <p><?php// echo form_error('foto'); ?></p>
                    </div>

                    <div class="formulario__grupo formulario__grupo-btn-enviar">
                            <button type="submit" class="formulario__btn">Registrar</button>
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
                    