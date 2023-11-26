<style>
    /* Mensajes de alerta por error de validacion */
    p{
        color: red;
        font-weight: 200;
        padding-top: -1px;
    }
/* ----- MEDIAQUERIES ------ */ 
    @media screen and (max-width: 1170px) {
    
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
		grid-template-columns: 1fr;
	}
	.detalle{
		grid-column: 1;
		width: 100%;
		height: 200px;
		min-width: 80%;
		resize: vertical;
		top: -50px; /*separacion de un texto con otro por asi desirce interlineado*/
		color: black;
	}

    .formulario__btn {
        width: 100%;
    }

    @media screen and (max-width: 1024px){
        .detalle{
            grid-column: 1;
            width: 100%;
            height: 500px;
            min-width: 80%;
            resize: vertical;
            top: -50px; /*separacion de un texto con otro por asi desirce interlineado*/
            color: black;
	    }
    }
}
</style>
<div class="container">
    <div class="row">
        <div class="col-md-2 columna1">
        </div>
        <div class="col-md-10 columna2">
            <div class="regform">
                <h1 class="titulos_centro">Registro de Categorías</h1>
            </div>

            <main class="main">
                <?php
                    echo form_open_multipart('administration/categoria/agregarbd', array('id' => 'formulario', 'class' => 'formulario', 'method' => 'post'));
                ?>
                        <div class="formulario__grupo" id="grupo__nombre">
                            <label for="nombre" class="formulario__label">Nombre:</label>
                            <div class="formulario__grupo-input">
                                <input type="text" class="formulario__input" name="nombre" id="nombre" placeholder="Ingrese el Nombre" value="<?php echo set_value('nombre'); ?>" onkeypress="return soloLetras(event)">
                            </div>
                            <p><?php echo form_error('nombre'); ?></p>
                        </div>

                        <!-- Grupo: Descripcion -->
                        <div class="formulario__grupo" id="grupo__detalle">
                            <label for="detalle" class="formulario__label">Descripcion:</label>
                            <div class="formulario__grupo-input">
                                <textarea placeholder="Ingrese los detalles de categoria" id="detalle" name="detalle" class="detalle" value="<?php echo set_value('detalle'); ?>" onkeypress="return soloLetras(event)"></textarea>
                                <!-- <input type="text" class="formulario__input" name="primerApellido" id="primerApellido" placeholder="Primer Apellido" value="<?php // echo set_value('primerApellido'); ?>"> -->
                            </div>
                            <p><?php echo form_error('detalle'); ?></p>
                        </div>
            
                        <div class="formulario__grupo formulario__grupo-btn-enviar">
                            <button type="submit" class="formulario__btn">Registrar</button>
                        </div>
                <?php
                    echo form_close();
                ?>
            </main>

        </div>
    </div>
</div>
<!--
<script src="<?php echo base_url();?>bootstrap/js/formulario/formularioCliente.js"></script>  
<script src="<?php echo base_url();?>bootstrap/js/formulario/validacionCliente.js"></script>  -->
<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
