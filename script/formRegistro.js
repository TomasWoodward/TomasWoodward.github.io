document.addEventListener("DOMContentLoaded", function () {
	let form = document.querySelector("#formRegister");
	form.addEventListener("submit", comprobarRegister);
});

function comprobarRegister(event) {
	event.preventDefault(); // Evitar el envío del formulario para mostrar los errores
	const inputs = document.querySelectorAll("#formRegister input");
	inputs.forEach(input => {
		// Quitar mensajes de error previos y resetear estilos
		const errorMessage = input.previousElementSibling;
		if (errorMessage && errorMessage.classList.contains("error-message")) {
			errorMessage.remove();
		}
		input.style.backgroundColor = ''; 
	});

	let hasErrors = false;

	// Validación de nombre
	let nameInput = document.querySelector("#userName");
	let name = nameInput.value.trim();
	if (name === "" || name.length < 3 || name.length > 15) {
		showErrorMessage(nameInput, "El nombre debe tener entre 3 y 15 caracteres.");
		hasErrors = true;
	} else if (!/^[A-Za-z][A-Za-z0-9]*$/.test(name)) {
		showErrorMessage(nameInput, "El nombre debe comenzar con una letra y solo puede contener letras y números.");
		hasErrors = true;
	}

	// Validación de contraseña
	let passwordInput = document.querySelector("#pass");
	let password = passwordInput.value.trim();
	if (password === "" || password.length < 6 || password.length > 15) {
		showErrorMessage(passwordInput, "La contraseña debe tener entre 6 y 15 caracteres.");
		hasErrors = true;
	} else if (!/[A-Z]/.test(password) || !/[a-z]/.test(password) || !/[0-9]/.test(password) || /[^A-Za-z0-9-_]/.test(password)) {
		showErrorMessage(passwordInput, "La contraseña debe contener al menos una letra mayúscula, una minúscula, un número y solo los caracteres guion y guion bajo como especiales.");
		hasErrors = true;
	}

	// Confirmación de contraseña
	let password2Input = document.querySelector("#pass2");
	let password2 = password2Input.value.trim();
	if (password2 !== password) {
		showErrorMessage(password2Input, "Las contraseñas no coinciden.");
		hasErrors = true;
	}

	// Validación de email
	let emailInput = document.querySelector("#email");
	let email = emailInput.value.trim();
	let emailPattern = /^[A-Za-z0-9.!#$%&'*+/=?^_`{|}~.-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/;
	if (email === "" || !emailPattern.test(email)) {
		showErrorMessage(emailInput, "El email no es válido.");
		hasErrors = true;
	}

	// Validación de sexo
	let sexInput = document.querySelector("#sex");
	let sex = sexInput.value.trim();
	if (sex === "") {
		showErrorMessage(sexInput, "El campo sexo no puede estar vacío.");
		hasErrors = true;
	}

	// Validación de fecha de nacimiento
	let birthInput = document.querySelector("#birth");
	let birth = birthInput.value.trim();
	let birthPattern = /^(0[1-9]|[12][0-9]|3[01])\/(0[1-9]|1[012])\/\d{4}$/;
	if (birth === "" || !birthPattern.test(birth)) {
		showErrorMessage(birthInput, "La fecha de nacimiento debe estar en el formato dd/mm/AAAA.");
		hasErrors = true;
	}

	if (!hasErrors) {
		form.submit(); // Si no hay errores, enviar el formulario
	}
}

function showErrorMessage(input, message) {
	const errorMessage = `<div class="error-message" style="color: red; margin-bottom: 4px;">${message}</div>`;
	input.insertAdjacentHTML("beforebegin", errorMessage);
	input.style.backgroundColor = 'red';
}
