<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Creacion de Usuarios.</h4>
            </div>
        </div>
        <!-- /.col-lg-12 -->
    </div>
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <!-- Row -->
    <div class="row">
        <!-- Column -->
        <div class="col-lg-0 col-xlg-3 col-md-12">

        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-12 col-xlg-9 col-md-12">
            <div class="card">
                <div class="card-body">
<?php
    foreach ($infousuario->result() as $row) {
    echo form_open_multipart('administration/usuario/modificarbd');
?>
<input type="hidden" class="form-control p-0 border-0" name="idusuario" value="<?php echo $row->id; ?>"> 
                    <div class="form-group mb-4">
                            <label class="col-md-12 p-0">Nombre Completo</label>
                            <div class="col-md-4 border-bottom p-0">
                                <input type="text" placeholder="Nombres"
                                    class="form-control p-0 border-0" name="nombre" value="<?php echo $row->nombre; ?>"> 
                            </div>
                            <div class="col-md-4 border-bottom p-0">
                                <input type="text" placeholder="Primer Apellido"
                                    class="form-control p-0 border-0" name="apellido1" value="<?php echo $row->primerApellido; ?>"> 
                            </div>
                            <div class="col-md-4 border-bottom p-0">
                                <input type="text" placeholder="segundo Apellido"
                                    class="form-control p-0 border-0" name="apellido2" value="<?php echo $row->segundoApellido; ?>"> 
                            </div>
                        </div>
                            <br>
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">Telefono/Celular</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="text" placeholder="Ingrese el numero de Celular o Telefono." name="celular"
                                    class="form-control p-0 border-0" value="<?php echo $row->celular; ?>"> </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">Cedula de Identidad</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="text" placeholder="Ingrese el numero de Celular o Telefono." name="ci"
                                    class="form-control p-0 border-0" value="<?php echo $row->ci; ?>"> </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">Nombre de Usuario</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="text" placeholder="Ingrese el Nombre de Usuario." name="userName"
                                    class="form-control p-0 border-0" value="<?php echo $row->login; ?>"> </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">Password</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input name="password" type="password" placeholder="Ingrese Nueva Contraseña." class="form-control p-0 border-0">
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">Rol.</label>
                            <div class="col-md-12 border-bottom p-0">
                            <select name="rol" class="form-control p-0 border-1">
                                <option>SELECCIONE EL ROL</option>
                                <option value="ADMINISTRADOR">Administrador</option>
                                <option value="INVITADO">Invitado</option>
                            </select>
                        </div>
                        <div class="form-group mb-4">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-success">Registrar</button>
                            </div>
                        </div>
<?php
echo form_close();
    }
?>

                </div>
            </div>
        </div>
        <!-- Column -->
    </div>
    <!-- Row -->
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Right sidebar -->
    <!-- ============================================================== -->
    <!-- .right-sidebar -->
    <!-- ============================================================== -->
    <!-- End Right sidebar -->
    <!-- ============================================================== -->
</div>