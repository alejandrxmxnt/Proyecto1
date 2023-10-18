
<!-- End Hero Section -->

<div class="untree_co-section product-section before-footer-section" style="background-image: url('<?php echo base_url();?>img/menu/fondo de pantalla catalogo.jpg'); background-repeat: no-repeat;
    background-size: 100% 100%;
    backdrop-filter: blur(3px);  /* borroso */
    transition: 0.5s;
    opacity: 1;">
    <div class="container">
    
        <div class="row">
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
                    <button type="submit" class="btn btn-success" style="background-color: rgb(0, 0, 0, 0.5); border: transparent;">
                        <?php 
                            $foto=$row->foto;
                            if($foto=="")//si foto esta igual a vacion sin imagen
                            {//cargar una imagen en caso de no tener una imagen que sea vacio
                                ?>
                                <img width="100" src="<?php echo base_url(); ?>uploads/productos/vacio.jpg" class="img-fluid product-thumbnail">
                                <?php
                            }else {//caso contrario se proyectara la imagen
                                ?>
                                <img width="100" src="<?php echo base_url(); ?>uploads/productos/<?php echo $foto; ?>" class="img-fluid product-thumbnail">
                                <?php
                            }
                        ?>
                        <!--<img src="images/product-3.png" class="img-fluid product-thumbnail">-->
                        <h3 class="product-title" style="color: black; font-size: 5mm;"><?php echo $row->nombre;?></h3>
                        <strong class="product-price" style="color: black;">Bs. <?php echo $row->precioUnitario;?></strong>
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
