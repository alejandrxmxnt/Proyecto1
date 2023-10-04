const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');

const expresiones = {
	nombre: /^[a-zA-ZÀ-ÿ\s]{1,50}$/, // Letras y espacios, pueden llevar acentos.
    descripcion: /^[a-zA-ZÀ-ÿ\s]{1,1999}$/, // Letras y espacios, pueden llevar acentos.
    precioUnitario: /^\d{1,15}$/, // 7 a 14 numeros.
    stock: /^\d{1,10}$/, // 7 a 14 numeros.
	codigo: /^[a-zA-Z0-9\-]{1,50}$/, // Letras, numeros, guion y guion_bajo	
}

const campos = {
    nombre: false,
    descripcion: false,
    precioUnitario: false,
    stock: false,
    codigo: false
}
const validarFormulario = (e) => {
	switch (e.target.name) {
        case "nombre":
			validarCampo(expresiones.nombre, e.target, 'nombre');
		break;
        case "descripcion":
			validarCampo(expresiones.descripcion, e.target, 'descripcion');
		break;
        case "precioUnitario":
			validarCampo(expresiones.precioUnitario, e.target, 'precioUnitario');
		break;
        case "stock":
			validarCampo(expresiones.stock, e.target, 'stock');
		break;
        case "codigo":
			validarCampo(expresiones.codigo, e.target, 'codigo');
		break;
	}
}

const validarCampo = (expresion, input, campo) => {
	if(expresion.test(input.value)){
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto');
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-correcto');
		document.querySelector(`#grupo__${campo} i`).classList.add('fa-check-circle');
		document.querySelector(`#grupo__${campo} i`).classList.remove('fa-times-circle');
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
		campos[campo] = true;
	} else {
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-incorrecto');
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto');
		document.querySelector(`#grupo__${campo} i`).classList.add('fa-times-circle');
		document.querySelector(`#grupo__${campo} i`).classList.remove('fa-check-circle');
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
		campos[campo] = false;
	}
}

inputs.forEach((input) => {
	input.addEventListener('keyup', validarFormulario);
	input.addEventListener('blur', validarFormulario);
});

formulario.addEventListener('submit', (e) => {
	e.preventDefault();

	//const terminos = document.getElementById('terminos');
	if(campos.nombre && campos.precioUnitario && campos.stock){
		formulario.reset();

		document.getElementById('formulario__mensaje-exito').classList.add('formulario__mensaje-exito-activo');
		setTimeout(() => { //duracion de tiempo de mensaje exitoso
			document.getElementById('formulario__mensaje-exito').classList.remove('formulario__mensaje-exito-activo');
		}, 5000);//tiempo que se ejecuta 5 segundos

		document.querySelectorAll('.formulario__grupo-correcto').forEach((icono) => {
			icono.classList.remove('formulario__grupo-correcto');
		});
		
		//window.location.href = 'cliente_formulario','refresh';
	} else {
		document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
	}
});

