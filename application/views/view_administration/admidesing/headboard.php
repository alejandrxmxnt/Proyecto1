<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MUEBLERIA LARA</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> <!--NUEVA LINEA PARA LOS ALERTs-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!--
    <link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" /> -->
    <!-- Favicon icon -->
    <link rel="icon" type="Usuario" sizes="16x16" href="<?php echo base_url();?>img/logos/logomuebleria.jpeg">
    <!-- Custom CSS 
    <link href="<?php echo base_url();?>bootstrap/plugins/bower_components/chartist/dist/chartist.min.css" rel="stylesheet">
    -->
<!--
    <link rel="stylesheet" href="<?php echo base_url();?>bootstrap/plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css">
     Custom CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="<?php echo base_url();?>bootstrap/css/style.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url();?>bootstrap/css/tablas/tablas.css">
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
        /*Vista desde Tablet*/
        /*
        @media screen and (max-width: 1024px) {
            body {
                background-image: url('<?php // echo base_url();?>img/fondos/fondoTablet.jpeg');
                background-repeat: no-repeat;
                background-size: 100% 100%;
                transition: 0.5s;
                opacity: 1;
            }
        }*/
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