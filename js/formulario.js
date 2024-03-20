const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');

const expresiones = {
	cedula: /^\d{6,12}$/, 
	nombre: /^[a-zA-ZÀ-ÿ\s]{10,30}$/, 
	telefono: /^\d{9,12}$/,
	
	
}

const campos = {
	cedula: false,
	nombre: false,
	telefono: false,
	
}

const validarFormulario = (e) => {
	switch (e.target.name) {
		case "cedula":
			validarCampo(expresiones.cedula, e.target, 'cedula');
		break;
		case "nombre":
			validarCampo(expresiones.nombre, e.target, 'nombre');
		break;
		case "telefono":
			validarCampo(expresiones.telefono, e.target, 'telefono');
		break;
		
		// case "correo":
		// 	validarCampo(expresiones.correo, e.target, 'correo');
		// break;
		// case "telefono":
		// 	validarCampo(expresiones.telefono, e.target, 'telefono');
		// break;
		
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

// const validarPassword2 = () => {
// 	const inputPassword1 = document.getElementById('password');
// 	const inputPassword2 = document.getElementById('password2');

// 	if(inputPassword1.value !== inputPassword2.value){
// 		document.getElementById(`grupo__password2`).classList.add('formulario__grupo-incorrecto');
// 		document.getElementById(`grupo__password2`).classList.remove('formulario__grupo-correcto');
// 		document.querySelector(`#grupo__password2 i`).classList.add('fa-times-circle');
// 		document.querySelector(`#grupo__password2 i`).classList.remove('fa-check-circle');
// 		document.querySelector(`#grupo__password2 .formulario__input-error`).classList.add('formulario__input-error-activo');
// 		campos['password'] = false;
// 	} else {
// 		document.getElementById(`grupo__password2`).classList.remove('formulario__grupo-incorrecto');
// 		document.getElementById(`grupo__password2`).classList.add('formulario__grupo-correcto');
// 		document.querySelector(`#grupo__password2 i`).classList.remove('fa-times-circle');
// 		document.querySelector(`#grupo__password2 i`).classList.add('fa-check-circle');
// 		document.querySelector(`#grupo__password2 .formulario__input-error`).classList.remove('formulario__input-error-activo');
// 		campos['password'] = true;
// 	}
// }

inputs.forEach((input) => {
	input.addEventListener('keyup', validarFormulario);
	input.addEventListener('blur', validarFormulario);
});

formulario.addEventListener('submit', (e) => {
	e.preventDefault();
		var cedula = document.getElementById('cedula').value;
		var nombre = document.getElementById('nombre').value;
		var telefono = document.getElementById('telefono').value;
		var nombre_a = document.getElementById('id_atrac').value;
		var nombre_c = document.getElementById('id_com').value;
		// var fecha_ingreso = document.getElementById('').value;
	
		var validar = "<?php echo $validar; >?";
		console.log(validar);

	const terminos = document.getElementById('terminos');
	if(campos.cedula && campos.nombre && campos.telefono && terminos.checked ){
		formulario.reset();
		console.log(cedula);console.log(nombre);console.log(telefono);console.log(nombre_a);console.log(nombre_C);
		$.post ("registro.php?cod=datos",{doc: doc, eps: eps, nom: nom, pas: pas, email: email, tip_usu: tip_usu, cuidad: cuidad,}, function(document){$("#mensaje").html(document);
		
		}),
		
		document.getElementById('formulario__mensaje-exito').classList.add('formulario__mensaje-exito-activo');
		setTimeout(() => {
			document.getElementById('formulario__mensaje-exito').classList.remove('formulario__mensaje-exito-activo');
		}, 5000);

		if(validar ==1){
			alert ("Registro exitoso")
		}

		else{
			alert("Usuario ya existente");
		}

		document.querySelectorAll('.formulario__grupo-correcto').forEach((icono) => {
			icono.classList.remove('formulario__grupo-correcto');
		});
	} 
});
