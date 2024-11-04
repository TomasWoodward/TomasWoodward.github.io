/*Este fichero comprueba que el login de la pagina esta correctamente formateado*/
/*Si no lo esta, muestra un mensaje de error*/

document.addEventListener("DOMContentLoaded", function(){
	let form = document.querySelector("#formLogin");
	form.addEventListener("submit", comprobarLogin);
});

function comprobarLogin(event){
	/*--------VARIABLES PARA COMPROBAR----------*/
	let nameInput = document.querySelector("#userName");
	let name = nameInput.value;
	let isFormValid = true; 
	let passwordInput = document.querySelector("#pass");
	let password = passwordInput.value;

	let form = document.querySelector("#formLogin");
	
	/*--------QUITAR ESPACIOS EN BLANCO Y TABULACIONES----------*/
	name = name.replaceAll(/\s/g, "");
	name = name.replaceAll(/\t/g, "");
	password = password.replaceAll(/\s/g, "");
	password = password.replaceAll(/\t/g, "");
	
	if (name == "" ) {
		mostrarError(nameInput, "El campo nombre no puede estar vacio");
	}else{
		limpiarError(nameInput);
	}

	if (password == "") {
		mostrarError(passwordInput, "El campo contraseña no puede estar vacio");
	}else{
		limpiarError(passwordInput);
	}

	if (!isFormValid) {
		event.preventDefault();
	}
	
function mostrarError(input, mensaje) {
	limpiarError(input); // Eliminar cualquier error previo en el mismo campo
	let error = document.createElement("p");
	error.className = "error-message";
	error.innerText = mensaje;
	input.parentNode.insertBefore(error, input); // Insertar el mensaje antes del input
	input.style.backgroundColor = 'red';
	error.style.color = 'red';
	isFormValid = false;
}

function limpiarError(input) {
	let error = input.previousElementSibling;
	if (error && error.classList.contains("error-message")) {
		error.remove();
	}
	input.style.backgroundColor = '#e6e6e6';
}
}