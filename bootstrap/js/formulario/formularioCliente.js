const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');

const expresiones = {
	nombre: /^[a-zA-ZÀ-ÿ\s]{1,50}$/, // Letras y espacios, pueden llevar acentos.
    primerApellido: /^[a-zA-ZÀ-ÿ\s]{1,50}$/, // Letras y espacios, pueden llevar acentos.
    segundoApellido: /^[a-zA-ZÀ-ÿ\s]{1,50}$/, // Letras y espacios, pueden llevar acentos.
	ciNit: /^[a-zA-Z0-9\-]{4,16}$/, // Letras, numeros, guion y guion_bajo
    telefono: /^\d{7,20}$/, // 7 a 14 numeros.
    direccion: /^[a-zA-ZÀ-ÿ\s\-\.\,]{1,1000}$/, // Letras y espacios, pueden llevar acentos.
    razonSocial: /^[a-zA-Z0-9\_\-]{4,16}$/ // Letras, numeros, guion y guion_bajo	
}

const campos = {
    nombre: false,
    primerApellido: false,
    segundoApellido: false,
    ciNit: false,
    telefono: false,
    direccion: false,
    razonSocial: false
}

const validarFormulario = (e) => {
	switch (e.target.name) {
        case "nombre":
			validarCampo(expresiones.nombre, e.target, 'nombre');
		break;
        case "primerApellido":
			validarCampo(expresiones.primerApellido, e.target, 'primerApellido');
		break;
        case "segundoApellido":
			if(validarCampo(expresiones.segundoApellido, e.target, 'segundoApellido') || validarCampo(segundoApellido = "")){
				campos.segundoApellido=true;
			}
			//validarCampo(expresiones.segundoApellido, e.target, 'segundoApellido');
		break;
        case "ciNit":
			validarCampo(expresiones.ciNit, e.target, 'ciNit');
		break;
        case "telefono":
			validarCampo(expresiones.telefono, e.target, 'telefono');
		break;
        case "direccion":
			validarCampo(expresiones.direccion, e.target, 'direccion');
		break;
        case "razonSocial":
			validarCampo(expresiones.razonSocial, e.target, 'razonSocial');
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
	if(campos.nombre && campos.primerApellido && campos.segundoApellido && campos.telefono && campos.ciNit && campos.direccion && campos.razonSocial ){
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

