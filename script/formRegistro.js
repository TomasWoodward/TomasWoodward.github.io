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

	/*--------COMPROBAR NOMBRE Y CONTRASEÑA----------*/
	if (name == "" || name.length < 3 || name.length > 15 || !/^[a-zA-Z][a-zA-Z0-9]*$/.test(name)) {
		mensaje += "El nombre sólo puede contener letras del alfabeto inglés (en mayúsculas y minúsculas) y números; no puede comenzar con un número; longitud mínima 3 caracteres y máxima 15\n";
		nameInput.style.backgroundColor = 'red';
	}else{
		nameInput.style.backgroundColor = '#e0e0e0';
	}

	if (password == "" || password.length < 6 || password.length > 15 || !/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d_-]{6,15}$/.test(password)) {
		mensaje += "El campo contraseña sólo puede contener letras del alfabeto inglés (en mayúsculas y minúsculas),números, el guion y el guion bajo(subrayado); al menos debe contener una letra en mayúscula,una letra en minúscula y un número; longitud mínima 6 caracteres y máxima 15\n";
		passwordInput.style.backgroundColor = 'red';
	}else{
		passwordInput.style.backgroundColor = '#e0e0e0';
	}

	if (password2 != password) {
		mensaje += "Las contraseñas no coinciden\n";
		password2Input.style.backgroundColor = 'red';
	}else{
		password2Input.style.backgroundColor = '#e0e0e0';
	}

	/*--------SEPARAR EL EMAIL EN LOCAL Y DOMINO----------*/
	let mal = false;
	if (email) {
		let partes = email.split("@");
		let parteLocal = partes[0];
		let dominio = partes[1];
		
		/*comprobar que el formato es correcto*/
		if (partes.length !== 2 || partes[0].length < 1 || partes[1].length < 1) {
			mensaje += "El email debe contener una parte-local y un dominio separados por '@'.\n";
			mal = true;
		}else{
			// validar parte-local (1 a 64 caracteres, con caracteres permitidos, sin puntos al inicio/final, sin "..")
			if (parteLocal.length > 64 || !/^[a-zA-Z0-9!#$%&'*+/=?^_`{|}~.-]+$/.test(parteLocal) || parteLocal.startsWith('.') || parteLocal.endsWith('.') || parteLocal.includes('..')) {
				mensaje += "La parte-local no es válida. Debe tener entre 1 y 64 caracteres, puede contener letras, dígitos y ciertos caracteres especiales, pero no puede empezar o terminar con un punto, ni tener puntos consecutivos.\n";
				mal = true;
			}

			let subdominios = dominio.split(".");

			// Comprobar longitud total del dominio
			if (email.length > 255) {
				mensaje += "El email no puede tener más de 255 caracteres.\n";
				mal = true;
			}

			// Comprobar cada subdominio
			for (let subdominio of subdominios) {
				if (subdominio.length < 1 || subdominio.length > 63 || !/^[a-zA-Z0-9-]+$/.test(subdominio) || subdominio.startsWith('-') || subdominio.endsWith('-')) {
					mensaje += `El subdominio no es válido. Cada subdominio debe tener entre 1 y 63 caracteres, puede contener letras, dígitos y guiones, pero no puede empezar o terminar con un guion.\n`;
					mal = true;
				}
			}
		}
	}
	if (mal) {
		emailInput.style.backgroundColor = 'red';
	}else{
		emailInput.style.backgroundColor
	}
	/*--------COMPROBAR SEXO----------*/
	if (sex == "") {
		mensaje += "El campo sexo no puede estar vacio\n";
		sexInput.style.backgroundColor = 'red';
	}else{
		sexInput.style.backgroundColor = '#e0e0e0';
	}

	/*--------COMPROBAR FECHA DE NACIMIENTO----------*/
	mal = false;
	if (!birth) {
        mensaje += "La fecha de nacimiento no puede estar vacía.\n";
        mal = true;
    } else {
        let birthdate = new Date(birth);

        // Verificar si la fecha es válida
        if (isNaN(birthdate.getTime())) {
            mensaje += "La fecha de nacimiento no es válida.\n";
            mal = true;
        } else {
            let today = new Date();

            // Verificar si la fecha de nacimiento es mayor que la actual
            if (birthdate > today) {
                mensaje += "La fecha de nacimiento no puede ser mayor que la fecha actual.\n";
                mal = true;
            } else {
                const differenceInMilliseconds = today - birthdate;
                const millisecondsInAYear = 1000 * 60 * 60 * 24 * 365.25;
                const age = differenceInMilliseconds / millisecondsInAYear;
				console.log(age);
                // Comprobar si el usuario tiene 18 años o más
                if (age < 18) {
                    mensaje += "No tienes 18 años.\n";
                    mal = true;
                }
            }
        }
    }
	if (mal) {
		birthInput.style.backgroundColor = 'red';
	}else{
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