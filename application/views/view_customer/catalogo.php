<style>
    #cuadros {
        background-color: rgba(44, 43, 43, 0.596); 
        border: transparent;
        height: 250px;
        width: 250px;
        border-radius: 5px;
    }
    .title-producto {
        color: white;
        font-weight: 700;
        font-size: 5mm;
    }

    .img-wrap {
        text-align: center; /* Alinea el texto y elementos inline al centro */
        display: flex; /* Activa el modelo de caja flexible para alinear elementos hijos */
        justify-content: center; /* Alinea elementos hijos horizontalmente al centro */
        align-items: center; /* Alinea elementos hijos verticalmente al centro */
    }

    .imagen {
        max-width: 100%;
    height: auto;

    }



    /* Imagen de fondo */
    body {
        background-image: url('<?php echo base_url();?>img/fondos/fondoPc.jpeg');
        background-repeat: no-repeat;
        background-size: 100% 100%;
        /*backdrop-filter: blur(3px);   borroso */
        transition: 0.5s;
        opacity: 1;
    }
    /*Vista desde celular 768*/
    @media screen and (max-width: 1023px) {
        body {
            background-image: url('<?php echo base_url();?>img/fondos/fondoCelular.jpeg');
            background-repeat: no-repeat;
            background-size: 100% 100%;
            transition: 0.5s;
            opacity: 1;
        }
    }

</style>
<!-- End Hero Section -->

<div class="untree_co-section product-section before-footer-section">
    <div class="container">
    
        <div class="row img-wrap">
            <?php
                foreach($catalogos->result() as $row)
                {//impresion de valores de la data
            //acontinuacion de como se carga una tabla
            ?>
            <!-- Start Column 1 -->

            <div class="col-12 col-md-4 col-lg-3 mb-5">
            
                
                <?php 
                    echo form_open_multipart('customer/catalogo/infoProducto');
                ?>
                    <input type="hidden" value="<?php echo $row->id; ?>" name="idcatalogo">
                    <button type="submit" class="btn btn-success" id="cuadros">
                        <?php 
                            $foto=$row->foto;
                            if($foto=="")//si foto esta igual a vacion sin imagen
                            {//cargar una imagen en caso de no tener una imagen que sea vacio
                                ?>
                                <img class="imagen" width="100" src="<?php echo base_url(); ?>uploads/productos/vacio.jpg" class="img-fluid product-thumbnail">
                                <?php
                            }else {//caso contrario se proyectara la imagen
                                ?>
                                <img class="imagen" width="100" src="<?php echo base_url(); ?>uploads/productos/<?php echo $foto; ?>" class="img-fluid product-thumbnail">
                                <?php
                            }
                        ?>
                        <!--<img src="images/product-3.png" class="img-fluid product-thumbnail">-->
                        <h3 class="product-title title-producto"><?php echo $row->nombre;?></h3>
                        <strong class="product-price title-precioUnitario">Bs.<?php echo $row->precioUnitario;?></strong>
                    </button>
                        <?php
                            echo form_close();
                        ?>
                
                
            </div> 
            
            <!-- End Column 1 -->

            <?php
                }
            ?>

        </div>
            
    </div>
</div>
