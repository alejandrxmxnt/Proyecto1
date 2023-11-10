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
                    foreach ($infoproducto->result() as $row) {
                    echo form_open_multipart('administration/producto/modificarbd', array('id' => 'formulario', 'class' => 'formulario', 'method' => 'post'));
                ?>
                <input type="hidden" class="form-control p-0 border-0" name="idproducto" value="<?php echo $row->id; ?>">
                    <!-- Grupo: PRODUCTO -->
                    <!-- Grupo: Nombre -->
                    <div class="formulario__grupo" id="grupo__nombre">
                        <label for="nombre" class="formulario__label">Nombre:</label>
                        <div class="formulario__grupo-input">
                            <input type="text" class="formulario__input" name="nombre" id="nombre" placeholder="Ingrese el Nombre" value="<?php echo $row->nombre; ?>" onkeypress="return soloLetras(event)" required>
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                        </div>
                    </div>
                    <!-- Grupo: Descripcion -->
                    <div class="formulario__grupo" id="grupo__descripcion">
                        <label for="descripcion" class="formulario__label">Descripción:</label>
                        <div class="formulario__grupo-input">
                            <textarea class="formulario__input" name="descripcion" id="descripcion" placeholder="Descripcion de producto"><?php echo $row->descripcion; ?></textarea>    
                            <!-- <input type="text" class="formulario__input" name="descripcion" id="descripcion" placeholder="Descripción"> -->
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                        </div>
                    </div>
                    <!-- Grupo: Segundo Precio Unitario -->
                    <div class="formulario__grupo" id="grupo__precioUnitario">
                        <label for="precioUnitario" class="formulario__label">Precio Unitario Bs.:</label>
                        <div class="formulario__grupo-input">
                            <input type="text" class="formulario__input" name="precioUnitario" id="precioUnitario" value="<?php echo $row->precioUnitario; ?>" placeholder=" Bs." onkeypress="return soloNumeros(event)">
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                        </div>
                    </div>
                    <!-- Grupo: Stock -->
                    <div class="formulario__grupo" id="grupo__stock">
                        <label for="stock" class="formulario__label">Stock:</label>
                        <div class="formulario__grupo-input">
                            <input type="text" class="formulario__input" name="stock" id="stock" value="<?php echo $row->stock; ?>" placeholder="Stock Disponible" onkeypress="return soloNumeros(event)">
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                        </div>
                    </div>
                    <!-- Grupo: Codigo Producto -->
                    <div class="formulario__grupo" id="grupo__codigo">
                        <label for="codigo" class="formulario__label">Codigo:</label>
                        <div class="formulario__grupo-input">
                            <input type="text" class="formulario__input" name="codigo" id="codigo" value="<?php echo $row->codigo; ?>" placeholder="Codigo Producto">
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                        </div>
                    </div>
                    <!-- Grupo: CARGA DE IMAGENES -->
                    <div class="formulario__grupo" id="grupo__foto">
                        <label for="foto" class="formulario__label">Seleccione imagenes para subir:</label>
                        <div class="formulario__grupo-input">                 
                            <input type="file" name="userfile" id="foto" class="formulario__input" value="<?php echo $row->id.".jpg";?>" multiple> 
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                        </div> 
                    </div>
                    <!-- Grupo: SELECCIONAR CATEGORIA -->
                    <div class="formulario__grupo" id="grupo__categoria">
                        <label for="categoria" class="formulario__label">Categoria del producto:</label>
                        <div class="formulario__grupo-input_categoria">           
                            <!--      
                            <input type="file" name="categoria" id="categoria" class="formulario__input" value="<?php// echo set_value('foto'); ?>" multiple>
                            <i class="formulario__validacion-estado fas fa-times-circle"></i> -->
                            <select name="categoria" id="categoria" class="form-control">
                                <option value="<?php echo $row->idCategoria; ?>" disabled selected></option>
                                <?php
                                    foreach($listaCategorias->result() as $row){
                                ?>
                                <option value="<?php echo $row->id; ?>">
                                    <?php
                                        echo $row->nombre;
                                    ?>
                                </option>
                                <?php
                                    }
                                ?>
                            </select>
                        </div> 
                    </div>
<br>
                    <div class="formulario__grupo formulario__grupo-btn-enviar">
                            <button type="submit" class="formulario__btn">Actualizar</button>
                            <!--
                            <button type="submit" class="formulario__btn">Enviar</button>
    -->
                    </div>
        
                <?php
                    echo form_close();
                                }
                ?>
            </main>

        </div>
    </div>
</div>
<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>

                    