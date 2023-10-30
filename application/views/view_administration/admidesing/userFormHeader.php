<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MUEBLERIA LARA</title>
    <!--
    <link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" /> -->
    <!-- Favicon icon -->
    <link rel="icon" type="Usuario" sizes="16x16" href="<?php echo base_url();?>img/logos/logomuebleria.jpeg">
    <!-- Custom CSS 
    <link href="<?php// echo base_url();?>bootstrap/plugins/bower_components/chartist/dist/chartist.min.css" rel="stylesheet">
    -->
    <!--LIBRERIA NUEVA PARA PLUGINS DE VALIDACIONES
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/validationEngine.jquery.min.css" integrity="sha512-fvBUZJJBrJrzrFYM/EN2isPokoNnx331y30ZXIxRRlop1aq6rT6d8oY6WJVsiXZoso0dIZ2nbQjtGLi6Kkxr/Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    -->
    
    <!--
    <link rel="stylesheet" href="<?php echo base_url();?>bootstrap/plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css">
     Custom CSS -->
    <link href="<?php echo base_url();?>bootstrap/css/style.min.css" rel="stylesheet">
    <!--Estilo propio del formulario
    <link rel="stylesheet" href="<?php echo base_url();?>bootstrap/css/form/usuarioForm.css"> -->
    <link rel="stylesheet" href="<?php echo base_url();?>bootstrap/css/form/estilosUsuario.css">
    <!-- Imagen de fondo --> 
    <style>
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
        @media screen and (max-width: 1024px) {
            body {
                background-image: url('<?php echo base_url();?>img/fondos/fondoCelular.jpeg');
                background-repeat: no-repeat;
                background-size: 100% 100%;
                transition: 0.5s;
                opacity: 1;
            }
        }
    </style>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>

<body class="bodyy">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>

        <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin5">