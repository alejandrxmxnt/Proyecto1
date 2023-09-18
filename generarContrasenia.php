<?php

function generarUsuario($nombre, $apellido1, $ci) {
    // Convertir a minúsculas y eliminar espacios
    $nombre = (trim($nombre));
    $apellido = (trim($apellido1));
    $ci = (trim($ci));
    // Obtener la primera letra del nombre y el apellido
    $Nombre = substr($nombre, 0, 3);
    $Apellido = substr($apellido1, 0, 3);
    $numeroCi = substr($ci, 2, 5);
    // Generar el nombre de usuario
    $usuario = $Nombre . $Apellido . $numeroCi;
    return $usuario;
}

function generarContrasenia ($long = 8, $nombre, $apellido1, $ci){//valores a recibir
    $caracteres=($nombre).strtoupper($apellido1).$ci;//para hacer todo mayusculas
    $cantidadCaracter = strlen($caracteres);//cantidad de caracteres
    $contrasenia = '';
    for($i = 0; $i < $long; $i++){
        $indice = random_int(0, $cantidadCaracter - 1);
        $contrasenia .=$caracteres[$indice];
    }
    return $contrasenia;
}
        
$nombre="Adrian";
$apellido1="Montano";
$apellido2="Soliz";
$ci="9483550";

$nombreUsuario = generarUsuario($nombre, $apellido1, $ci);
$contraseniaSegura = generarContrasenia(8,substr($nombre,0,3), substr($apellido1,0,3), substr($ci,2,5));//envio de cartacteres recortados
echo "El nombre de usuario generado es: " . $nombreUsuario;
?>
<br>
<?php
echo "Contraseña: $contraseniaSegura";
?>
<br>
<?php
echo "Encriptado: ".md5($contraseniaSegura);
?>