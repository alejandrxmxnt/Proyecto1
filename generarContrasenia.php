<?php
//GENERAR CONTRASENIAS 
    function generarContrasenia ($long = 8){
        $caracteres= "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890#$%&/()=?¿";
        $cantidadCaracter = strlen($caracteres);
        $contrasenia = '';
        for($i = 0; $i < $long; $i++){
            $indice = random_int(0, $cantidadCaracter - 1);
            $contrasenia .=$caracteres[$indice];
        }
        return $contrasenia;
    }

$contraseniaSegura = generarContrasenia(8);
echo "Contraseña: $contraseniaSegura";
echo " - ";
echo "Encriptado: ".md5($contraseniaSegura)." - ";
//encriptar password
echo md5('Admin');