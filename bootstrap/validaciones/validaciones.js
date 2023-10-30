/* alert("asdad"); */
function soloLetras(e)
{
	var codigoCar=e.keyCode;
	var letra=String.fromCharCode(codigoCar);
	var caracteresPermitidos=/[A-Za-záéíóúÁÉÍÓÚ]/;
	var caracteresEspeciales=[8,9,13,14,15,32];
	if (caracteresEspeciales.indexOf(codigoCar)==-1)
		return (caracteresPermitidos.test(letra));
	else
		return true;
}

function soloNumeros(e)
{
	var codigoCar=e.keyCode;
	var letra=String.fromCharCode(codigoCar);
	var caracteresPermitidos=/[0-9]/;
	var caracteresEspeciales=[8,9,13,14,15,32];
	if (caracteresEspeciales.indexOf(codigoCar)==-1)
		return (caracteresPermitidos.test(letra));
	else
		return true;
}

function soloCi(e)
{
	var codigoCar=e.keyCode;
	var letra=String.fromCharCode(codigoCar);
	var caracteresPermitidos=/[A-Z0-9]/;
	var caracteresEspeciales=[8,9,13,14,15,32,45];
	if (caracteresEspeciales.indexOf(codigoCar)==-1)
		return (caracteresPermitidos.test(letra));
	else
		return true;
}

function soloUsuario(e) //evento e - usado para la captura de datos por teclado del usuario
{
	// Obtener el código de la tecla presionada.
	var codigoCar=e.keyCode;
	// Convertir el código de la tecla en un carácter.
	var letra=String.fromCharCode(codigoCar);
	// Definir una expresión regular para caracteres permitidos.
	var caracteresPermitidos=/[A-Za-z0-9]/;
	//Definir una lista de códigos de tecla para caracteres especiales permitidos.
	var caracteresEspeciales=[8,9,13,14,15,32,45,95]; //valores de tabla ascii - permitidos creo
	// Validación de entrada.
	if (caracteresEspeciales.indexOf(codigoCar)==-1)
		// Si el código de tecla no está en la lista de caracteres especiales.
    // Se verifica si el carácter (letra) es uno de los caracteres permitidos según la expresión regular.
		return (caracteresPermitidos.test(letra));
	else
	// Si el código de tecla está en la lista de caracteres especiales, se permite.
		return true;
}
