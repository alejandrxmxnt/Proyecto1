<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modal en Ventana Emergente</title>
    <link rel="stylesheet" href="<?php echo base_url();?>bootstrap/css/modal/styles.css">
</head>
<body>
    <button id="btnAbrirModal">Abrir Modal</button>
    <div class="modal" id="miModal">
        <div class="modal-contenido">
            <span class="cerrar" id="btnCerrarModal">&times;</span>
            <h2>Este es mi modal</h2>
            <p>Contenido del modal.</p>
        </div>
    </div>
    <script src="<?php echo base_url();?>bootstrap/js/modal/script.js"></script>
</body>
</html>