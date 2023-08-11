<div class="container">
  <div class="row">
    <div class="col-md-2">
    </div>
    <div class="col-md-10"> <br>
        <h2 class="titulos_centro"> CREAR USUARIO. </h2>
       <form action="<?php echo base_url(); ?>index.php/administration/usuario/agregarbd" method="POST">

          <input type="text" name="nombre" placeholder="Escribir el nombre." class="form-control"> <br>
          <input type="text" name="apellido1" placeholder="Escribir primer Apellido." class="form-control"> <br>
          <input type="text" name="apellido2" placeholder="Escribir segundo Apellido." class="form-control"> <br>
          <input type="text" name="celular" placeholder="Escribir numero celular." class="form-control"> <br>
          <input type="text" name="ci" placeholder="Escribir el Ci." class="form-control"> <br>
          <input type="text" name="nombreUsuario" placeholder="Escribir nombre de usuario." class="form-control"> <br>
          <input type="text" name="contrasenia" placeholder="Escribir la contraseña del usuario." class="form-control"> <br>
          <select name="rol" class="form-control" > <br>
            <option value="" ></option>
          </select> <br>
          <button type="submit" class="btn btn-success" placeholder="ROL DE USUARIO.">
            AGREGAR
          </button>

      </form>  
        
    </div>  
  </div>
</div>