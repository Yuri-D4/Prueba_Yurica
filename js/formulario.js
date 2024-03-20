const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');

const expresiones = {
	usuario: /^\d{6,12}$/, 
	nombre: /^[a-zA-ZÀ-ÿ\s]{10,30}$/, 
	telefono: /^\d{9,12}$/,
	
}

const campos = {
	usuario: false,
	nombre: false,
	telefono: false,
    	
}

const validarFormulario = (e) => {
	switch (e.target.name) {
		case "usuario":
			validarCampo(expresiones.usuario, e.target, 'usuario');
		break;
		case "nombre":
			validarCampo(expresiones.nombre, e.target, 'nombre');
		break;
		case "telefono":
			validarCampo(expresiones.telefono, e.target, 'telefono');
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
		var cedula = document.getElementById('usuario').value;
		var nombre = document.getElementById('nombre').value;
		var telefono = document.getElementById('telefono').value;
		var atraccion = document.getElementById('id_atrac').value;
		var comida = document.getElementById('id_com').value;
		// var fecha_ingreso = document.getElementById('').value;
	
		var validar = "<?php echo $validar; >?";
		console.log(validar);

	const terminos = document.getElementById('terminos');
	if(campos.usuario && campos.nombre && campos.telefono && terminos.checked ){
		formulario.reset();
		console.log(cedula);console.log(nombre);console.log(telefono);console.log(atraccion);console.log(comida);
		$.post("registro.php?cod=datos", {cedula: cedula, nombre: nombre, telefono: telefono, atraccion: atraccion, comida: comida}, function(data) {
            $("#mensaje").html(data);
        });
        

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
