/*Este fichero comprueba que el register de la pagina esta correctamente formateado*/
/*Si no lo esta, muestra un mensaje de error*/

document.addEventListener("DOMContentLoaded", function () {
	let form = document.querySelector("#formRegister");
	form.addEventListener("submit", comprobarRegister);
});

function comprobarRegister(event) {
	/*--------VARIABLES PARA COMPROBAR----------*/
	let mensaje = "";
	console.log("Comprobando formulario de registro...");


	let nameInput = document.querySelector("#userName");
	let name = nameInput.value;

	let passwordInput = document.querySelector("#pass");
	let password = passwordInput.value;

	let password2Input = document.querySelector("#pass2");
	let password2 = password2Input.value;

	let emailInput = document.querySelector("#email");
	let email = emailInput.value;

	let sexInput = document.querySelector("#sex");
	let sex = sexInput.value;

	let birthInput = document.querySelector("#birth");
	let birth = birthInput.value;

	let form = document.querySelector("#formRegister");

	/*--------QUITAR ESPACIOS EN BLANCO Y TABULACIONES----------*/
	name = name.replaceAll(/\s/g, "");
	name = name.replaceAll(/\t/g, "");
	password = password.replaceAll(/\s/g, "");
	password = password.replaceAll(/\t/g, "");
	password2 = password2.replaceAll(/\s/g, "");
	password2 = password2.replaceAll(/\t/g, "");
	sex = sex.replaceAll(/\s/g, "");
	sex = sex.replaceAll(/\t/g, "");
	email = email.replaceAll(/\s/g, "");
	email = email.replaceAll(/\t/g, "");


	/*-----------------------------------*/
	/*--------COMPROBAR NOMBRE----------*/
	/*---------------------------------*/
	if (name == "" || name.length < 3 || name.length > 15) {
		mensaje += "El nombre debe tener entre 3 y 15 caracteres.\n";
		nameInput.style.backgroundColor = 'red';
	} else {
		let esValido = true;
		let primerCaracter = name.charAt(0);

		// Verificar que el primer carácter sea una letra
		if (!((primerCaracter >= 'A' && primerCaracter <= 'Z') || (primerCaracter >= 'a' && primerCaracter <= 'z'))) {
			mensaje += "El nombre debe comenzar con una letra.\n";
			esValido = false;
		}

		// Verificar que los caracteres sean letras o dígitos
		for (let i = 1; i < name.length && esValido; i++) {
			let caracter = name.charAt(i);
			if (!((caracter >= 'A' && caracter <= 'Z') ||
				(caracter >= 'a' && caracter <= 'z') ||
				(caracter >= '0' && caracter <= '9'))) {
				mensaje += "El nombre solo puede contener letras y números.\n";
				esValido = false;
			}
		}

		// Cambiar el color de fondo del input según la validez
		if (esValido) {
			nameInput.style.backgroundColor = '#e0e0e0'; // Válido
		} else {
			nameInput.style.backgroundColor = 'red'; // Inválido
		}
	}

	
	/*-------------------------------------*/
	/*--------COMPROBAR CONTRASEÑA--------*/
	/*-----------------------------------*/
	// Verificar si la contraseña está vacía o no cumple con la longitud mínima/máxima
	if (password == "" || password.length < 6 || password.length > 15) {
		mensaje += "La contraseña debe tener entre 6 y 15 caracteres.\n";
		passwordInput.style.backgroundColor = 'red';
	} else {
		let tieneMayuscula = false;
		let tieneMinuscula = false;
		let tieneNumero = false;
		let caracteresValidos = true;

		// Iterar sobre cada carácter para verificar condiciones
		for (let i = 0; i < password.length && caracteresValidos; i++) {
			let caracter = password.charAt(i);

			// Verificar si es una letra mayúscula
			if (caracter >= 'A' && caracter <= 'Z') {
				tieneMayuscula = true;
			}

			// Verificar si es una letra minúscula
			if (caracter >= 'a' && caracter <= 'z') {
				tieneMinuscula = true;
			}

			// Verificar si es un número
			if (caracter >= '0' && caracter <= '9') {
				tieneNumero = true;
			}

			// Verificar si el carácter es válido (letras, números, guion o guion bajo)
			if (!((caracter >= 'A' && caracter <= 'Z') ||
				(caracter >= 'a' && caracter <= 'z') ||
				(caracter >= '0' && caracter <= '9') ||
				caracter === '-' || caracter === '_')) {
				caracteresValidos = false;
			}
		}

		// Verificar que contenga al menos una mayúscula, una minúscula y un número
		if (!tieneMayuscula) {
			mensaje += "La contraseña debe contener al menos una letra mayúscula.\n";
		}

		if (!tieneMinuscula) {
			mensaje += "La contraseña debe contener al menos una letra minúscula.\n";
		}

		if (!tieneNumero) {
			mensaje += "La contraseña debe contener al menos un número.\n";
		}

		if (!caracteresValidos) {
			mensaje += "La contraseña solo puede contener letras, números, guion y guion bajo.\n";
		}

		// Cambiar el color de fondo del input según la validez
		if (mensaje) {
			passwordInput.style.backgroundColor = 'red';
		} else {
			passwordInput.style.backgroundColor = '#e0e0e0'; // Válido
		}
	}



	if (password2 != password) {
		mensaje += "Las contraseñas no coinciden\n";
		password2Input.style.backgroundColor = 'red';
	} else {
		password2Input.style.backgroundColor = '#e0e0e0';
	}


	/*-----------------------------------*/
	/*--------COMPROBAR EMAIL-----------*/
	/*---------------------------------*/
	let mal = false;
	if (email && email.length < 255) {
		let partes = email.split("@");
		let parteLocal = partes[0];
		let dominio = partes[1];

		/*comprobar que el formato es correcto*/
		if (partes.length !== 2 || partes[0].length < 1 || partes[1].length < 1) {
			mensaje += "El email debe contener una parte-local y un dominio separados por '@'.\n";
			mal = true;
		} else {
			// validar parte-local (1 a 64 caracteres, con caracteres permitidos, sin puntos al inicio/final, sin "..")
			if (parteLocal.length === 0 || parteLocal.length > 64) {
				mensaje += "La parte-local debe tener entre 1 y 64 caracteres.\n";
				mal = true;
			} else {
				let caracteresValidos = true;
				let caracteresPermitidos = "!#$%&'*+/=?^_`{|}~.-"; // Caracteres especiales permitidos

				// Verificar si empieza o termina con un punto
				if (parteLocal.startsWith('.') || parteLocal.endsWith('.')) {
					mensaje += "La parte-local no puede empezar o terminar con un punto.\n";
					mal = true;
				}

				// Verificar si contiene ".." (dos puntos consecutivos)
				if (parteLocal.includes('..')) {
					mensaje += "La parte-local no puede contener puntos consecutivos.\n";
					mal = true;
				}

				// Verificar que todos los caracteres sean válidos (letras, dígitos o caracteres especiales permitidos)
				for (let i = 0; i < parteLocal.length && caracteresValidos; i++) {
					let caracter = parteLocal.charAt(i);
					if (!((caracter >= 'A' && caracter <= 'Z') ||
						(caracter >= 'a' && caracter <= 'z') ||
						(caracter >= '0' && caracter <= '9') ||
						caracteresPermitidos.includes(caracter))) {
						caracteresValidos = false;

					}
				}

				if (!caracteresValidos) {
					mensaje += "La parte-local contiene caracteres no permitidos. Solo se permiten letras, dígitos y los caracteres especiales !#$%&'*+/=?^_`{|}~.-.\n";
					mal = true;
				}
			}

	
			// Comprobar cada subdominio
			let subdominios = dominio.split(".");
			for (let subdominio of subdominios) {
				// Verificar la longitud de cada subdominio (1 a 63 caracteres)
				if (subdominio.length < 1 || subdominio.length > 63) {
					mensaje += "Cada subdominio debe tener entre 1 y 63 caracteres.\n";
					mal = true;
				} else {
					let caracteresValidos = true;
		
					// Verificar si el subdominio empieza o termina con un guion
					if (subdominio.startsWith('-') || subdominio.endsWith('-')) {
						mensaje += "Los subdominios no pueden empezar o terminar con un guion.\n";
						mal = true;
						break;
					}
		
					// Verificar que cada carácter sea válido (letras, dígitos o guion)
					for (let i = 0; i < subdominio.length; i++) {
						let caracter = subdominio.charAt(i);
						if (!((caracter >= 'A' && caracter <= 'Z') || 
							  (caracter >= 'a' && caracter <= 'z') || 
							  (caracter >= '0' && caracter <= '9') || 
							  caracter === '-')) {
							caracteresValidos = false;
							break; // Salir del bucle si se encuentra un carácter inválido
						}
					}
					if (!caracteresValidos) {
						mensaje += "Los subdominios solo pueden contener letras, dígitos y guiones.\n";
						mal = true;

					}
				}
			}
		}
	}
	if (mal) {
		emailInput.style.backgroundColor = 'red';
	} else {
		emailInput.style.backgroundColor
	}

	/*---------------------------------*/
	/*--------COMPROBAR SEXO----------*/
	/*-------------------------------*/
	if (sex == "") {
		mensaje += "El campo sexo no puede estar vacio\n";
		sexInput.style.backgroundColor = 'red';
	} else {
		sexInput.style.backgroundColor = '#e0e0e0';
	}

	/*------------------------------------------------*/
	/*--------COMPROBAR FECHA DE NACIMIENTO----------*/
	/*----------------------------------------------*/

	mal = false;
	    // Verificar que el campo no esté vacío
    if (birth === "") {
        mensaje += "El campo de la fecha no puede estar vacío.\n";
        mal = true;
    } else {
        // Separar la fecha en día, mes y año usando el formato dd/mm/AAAA
        let partesFecha = birth.split("/");
        if (partesFecha.length !== 3) {
            mensaje += "El formato de la fecha debe ser dd/mm/AAAA.\n";
            mal = true;
        } else {
            let dia = parseInt(partesFecha[0], 10);
            let mes = parseInt(partesFecha[1], 10);
            let anio = parseInt(partesFecha[2], 10);

            // Verificar que día, mes y año sean números válidos
            if (isNaN(dia) || isNaN(mes) || isNaN(anio)) {
                mensaje += "El día, mes o año no son válidos.\n";
                mal = true;
            } else {
                // Verificar que el mes esté entre 1 y 12
                if (mes < 1 || mes > 12) {
                    mensaje += "El mes debe estar entre 1 y 12.\n";
                    mal = true;
                } else {
                    // Verificar los días máximos de cada mes (considerando años bisiestos para febrero)
                    let diasMaximos = [31, (anio % 4 === 0 && anio % 100 !== 0 || anio % 400 === 0) ? 29 : 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];

                    if (dia < 1 || dia > diasMaximos[mes - 1]) {
                        mensaje += "El día no es válido para el mes dado.\n";
                        mal = true;
                    } else {
                        // Crear objeto de fecha y comparar con la fecha actual
                        let birthdate = new Date(anio, mes - 1, dia); // Restar 1 al mes porque Date usa índices de 0 a 11
                        let today = new Date();

                        if (birthdate > today) {
                            mensaje += "La fecha de nacimiento no puede ser mayor que la fecha actual.\n";
                            mal = true;
                        } else {
                            const differenceInMilliseconds = today - birthdate;
                            const millisecondsInAYear = 1000 * 60 * 60 * 24 * 365.25;
                            const age = differenceInMilliseconds / millisecondsInAYear;

                            // Comprobar si el usuario tiene 18 años o más
                            if (age < 18) {
                                mensaje += "No tienes 18 años.\n";
                                mal = true;
                            }
                        }
                    }
                }
            }
        }
    }
	if (mal) {
		birthInput.style.backgroundColor = 'red';
	} else {
		birthInput.style.backgroundColor = '#e0e0e0';
	}
	/*--------MOSTRAR MENSAJE DE ERROR----------*/
	if (mensaje != "") {
		if (document.querySelector("#mensaje") != null) {
			document.querySelector("#mensaje").remove();
		}
		let p = document.createElement("p");
		p.setAttribute("id", "mensaje");
		p.innerHTML = mensaje.replace(/\n/g, "<br>");
		form.prepend(p);
		event.preventDefault();
	}
}