<style>
    .section-title {
        font-weight: 700;
        color: black;
    }

    .img-wrap {
        width: 100%;
        height: 100%;
    }

    #contenidos {
        align-content: center;
    }

    .img-wrap {
        text-align: center; /* Alinea el texto y elementos inline al centro */
        display: flex; /* Activa el modelo de caja flexible para alinear elementos hijos */
        justify-content: center; /* Alinea elementos hijos horizontalmente al centro */
        align-items: center; /* Alinea elementos hijos verticalmente al centro */
    }

    @media screen and (max-width: 1024px) {
        .img-wrap {
        width: 50;
        height: 50;
    }
    }
</style>
<!-- Start Why Choose Us Section -->
<div class="why-choose-section">
			<div class="container">
				<div class="row justify-content-between align-items-center" id="contenidos">
					<div class="col-lg-6 col-md-6 col-sm-6">
                        <?php
                            $indice=1;
                            foreach($infocatalogo->result() as $row)
                            {//impresion de valores de la data
                            //acontinuacion de como se carga una tabla
                        ?>

                        <!--CARGA DE TITULO DE PRODUCTO--> 
						<h2 class="section-title">
                            <?php 
                                $nombreProducto = $row->nombre;
                                echo strtoupper($nombreProducto);
                            ?>
                    
                        </h2>
                        <!--CARGA DE DETALLE-->
						<p><?php echo $row->descripcion;?></p>
                        <br>
                        <!--CARGA DE STOCK DISPONIBLE-->
                        <b>Stock Disponible: </b>
                        <p><?php 
                                $disponible = $row->stock;
                                if($disponible > 0) {
                                    echo $disponible;
                                }else{
                                    echo "(AGOTADO)";
                                }
                            ?>
                        </p>
                    </div>
					<div class="col-lg-6 col-md-6 col-sm-6">
						<div class="img-wrap">
                            <!--Carga de imagen de producto-->
                            <?php 
                                $foto=$row->foto;
                                if($foto=="")//si foto esta igual a vacion sin imagen
                                {//cargar una imagen en caso de no tener una imagen que sea vacio
                                    ?>
                                    <img width="100" src="<?php echo base_url(); ?>uploads/productos/vacio.jpg" alt="Image" class="img-fluid">
                                    <?php
                                }else {//caso contrario se proyectara la imagen
                                    ?>
                                    <img width="100" src="<?php echo base_url(); ?>uploads/productos/<?php echo $foto; ?>" style="width: auto;">
                                    <?php
                                }
                            ?>
							<!--<img src="images/why-choose-us-img.jpg" >-->
						</div>
					</div>

                    <?php
                        $indice++;
                        }
                    ?>
				</div>
			</div>
		</div>