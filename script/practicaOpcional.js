/*-------------------------------------------------------*/
/*--------Fichero para la practica opcional de JS--------*/
/*-------------------------------------------------------*/

document.addEventListener("DOMContentLoaded", function () {
	let form = document.querySelector("#formRegister");
	form.addEventListener("submit", comprobarRegister);
});

function comprobarRegister(event) {
	let isFormValid = true; 

	// Variables de los inputs
	let nameInput = document.querySelector("#userName");
	let name = nameInput.value.trim();

	let passwordInput = document.querySelector("#pass");
	let password = passwordInput.value.trim();

	let password2Input = document.querySelector("#pass2");
	let password2 = password2Input.value.trim();

	let emailInput = document.querySelector("#email");
	let email = emailInput.value.trim();

	let sexInput = document.querySelector("#sex");
	let sex = sexInput.value.trim();

	let birthInput = document.querySelector("#birth");
	let birth = birthInput.value.trim();

	// Función para mostrar un mensaje de error sobre un input específico
	function mostrarError(input, mensaje) {
		let error = document.createElement("p");
		error.className = "error-message";
		error.innerText = mensaje;
		input.before(error);
		input.style.backgroundColor = 'red';
		error.style.color = 'red';
		isFormValid = false;
	}

	// Función para limpiar los mensajes de error de un input específico
	function limpiarError(input) {
		let error = input.previousElementSibling;
		if (error && error.classList.contains("error-message")) {
			error.remove();
		}
		input.style.backgroundColor = '#e6e6e6';
	}

	// Limpiar mensajes de error anteriores
	document.querySelectorAll(".error-message").forEach((msg) => msg.remove());

	/*-----------------------------------*/
	/*--------COMPROBAR NOMBRE----------*/
	/*-----------------------------------*/
	if (name === "" || name.length < 3 || name.length > 15 || !/^[a-zA-Z][a-zA-Z0-9]*$/.test(name)) {
		mostrarError(nameInput, "El nombre solo puede contener letras y números; no puede comenzar con un número; mínimo 3 caracteres y máximo 15.");
	} else {
		limpiarError(nameInput);
	}

	/*-------------------------------------*/
	/*--------COMPROBAR CONTRASEÑA--------*/
	/*-------------------------------------*/
	if (password === "" || password.length < 6 || password.length > 15 || !/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d_-]{6,15}$/.test(password)) {
		mostrarError(passwordInput, "La contraseña debe tener una letra mayúscula, una minúscula y un número; mínimo 6 caracteres y máximo 15.");
	} else {
		limpiarError(passwordInput);
	}

	/*-----------------------------------------*/
	/*--------COMPROBAR CONFIRMACIÓN CONTRASEÑA*/
	/*-----------------------------------------*/
	if (password2 !== password || password2 === "") {
		mostrarError(password2Input, "Las contraseñas no coinciden.");
	} else {
		limpiarError(password2Input);
	}

	/*-----------------------------------*/
	/*--------COMPROBAR EMAIL-----------*/
	/*-----------------------------------*/
	let mal = false;  // Variable auxiliar para detectar errores en el email
	if (email && email.length <= 254) {
		let partes = email.split("@");
		if (partes.length !== 2) {
			mostrarError(emailInput, "El email debe tener una parte local y un dominio separados por '@'.");
			mal = true;
		} else {
			let [parteLocal, dominio] = partes;

			// Validación de la parte local
			if (
				parteLocal.length < 1 ||
				parteLocal.length > 64 ||
				!/^[a-zA-Z0-9!#$%&'*+/=?^_`{|}~.-]+$/.test(parteLocal) ||
				parteLocal.startsWith('.') ||
				parteLocal.endsWith('.') ||
				parteLocal.includes('..')
			) {
				mostrarError(emailInput, "La parte local no es válida: debe tener entre 1 y 64 caracteres, sin puntos al inicio o final ni consecutivos.");
				mal = true;
			} else {
				// Validación del dominio
				let subdominios = dominio.split(".");
				for (let subdominio of subdominios) {
					if (
						subdominio.length < 1 ||
						subdominio.length > 63 ||
						!/^[a-zA-Z0-9-]+$/.test(subdominio) ||
						subdominio.startsWith('-') ||
						subdominio.endsWith('-')
					) {
						mostrarError(emailInput, "Cada subdominio debe tener entre 1 y 63 caracteres sin guiones al inicio o final.");
						mal = true;
						break;
					}
				}
			}
		}
	} else {
		mostrarError(emailInput, "El email no es válido o excede la longitud máxima de 254 caracteres.");
		mal = true;
	}

	if (!mal) limpiarError(emailInput);

	/*---------------------------------*/
	/*--------COMPROBAR SEXO----------*/
	/*---------------------------------*/
	if (sex === "") {
		mostrarError(sexInput, "El campo sexo no puede estar vacío.");
	} else {
		limpiarError(sexInput);
	}

	/*------------------------------------------------*/
	/*--------COMPROBAR FECHA DE NACIMIENTO----------*/
	/*------------------------------------------------*/
	let birthDateInvalid = false;
	if (!birth) {
		mostrarError(birthInput, "La fecha de nacimiento no puede estar vacía.");
		birthDateInvalid = true;
	} else {
		let birthdate = new Date(birth);

		// Verificar si la fecha es válida
		if (isNaN(birthdate.getTime())) {
			mostrarError(birthInput, "La fecha de nacimiento no es válida debe seguir el formato dd/mm/AAAA.");
			birthDateInvalid = true;
		} else {
			let today = new Date();
			if (birthdate > today) {
				mostrarError(birthInput, "La fecha de nacimiento no puede ser mayor que la fecha actual.");
				birthDateInvalid = true;
			} else {
				const differenceInMilliseconds = today - birthdate;
				const millisecondsInAYear = 1000 * 60 * 60 * 24 * 365.25;
				const age = differenceInMilliseconds / millisecondsInAYear;

				if (age < 18) {
					mostrarError(birthInput, "Debes tener al menos 18 años.");
					birthDateInvalid = true;
				}
			}
		}
	}

	if (!birthDateInvalid) limpiarError(birthInput);

	/*--------EVITAR EL ENVÍO SI HAY ERRORES----------*/
	if (!isFormValid) event.preventDefault();
}
