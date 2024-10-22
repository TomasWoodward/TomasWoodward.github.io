document.addEventListener("DOMContentLoaded", function () {
	let form = document.querySelector("#formRegister");
	form.addEventListener("submit", comprobarRegister);
});

function comprobarRegister(event) {
	let mensaje = "";
	let name = document.querySelector("#userName").value;
	let password = document.querySelector("#pass").value;
	let password2 = document.querySelector("#pass2").value;
	let email = document.querySelector("#email").value;
	let sex = document.querySelector("#sex").value;
	let birth = document.querySelector("#birth").value;
	let form = document.querySelector("#formRegister");

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

	if (name == "" || name.length < 3 || name.length > 15 || !/^[a-zA-Z][a-zA-Z0-9]*$/.test(name)) {
		mensaje += "El nombre sólo puede contener letras del alfabeto inglés (en mayúsculas y minúsculas) y números; no puede comenzar con un número; longitud mínima 3 caracteres y máxima 15\n";
	}
	if (password == "" || password.length < 6 || password.length > 15 || !/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d_-]{6,15}$/.test(password)) {
		mensaje += "El campo contraseña sólo puede contener letras del alfabeto inglés (en mayúsculas y minúsculas),números, el guion y el guion bajo(subrayado); al menos debe contener una letra en mayúscula,una letra en minúscula y un número; longitud mínima 6 caracteres y máxima 15\n";
	}
	if (password2 != password) {
		mensaje += "Las contraseñas no coinciden\n";
	}

	let partes = email.split("@");

	if (partes[0] || partes[0].length > 64 || partes[0] < 1 || !/^[!#$%&'*+-/=?^_`{|}~$]/.test(partes[0]) || partes[0].charAt(partes[0].length - 1) == "." || partes[0].charAt(0) == "." || partes[0].includes("..")) {
		mensaje += "La parte-local es una combinación de las letras mayúsculas y minúsculas del alfabetoinglés, los dígitos del 0 al 9, los caracteres imprimibles !#$%&'*+-/=?^_`{|}~ y el punto.El punto no puede aparecer ni al principio ni al final y tampoco pueden aparecer dos omás puntos seguidos."
	}

	if (sex == "") {
		mensaje += "El campo sexo no puede estar vacio\n";
	}

	let birthdate = new Date(birth);
	if (birthdate || !isNaN(birthdate.getTime())) {
		let today = new Date();
		if (birthdate > today) {
			mensaje += "La fecha de nacimiento no puede ser mayor que la fecha actual.\n";
		} else {
			const differenceInMilliseconds = today - birthdate;
			const millisecondsInAYear = 1000 * 60 * 60 * 24 * 365.25;
			const age = differenceInMilliseconds / millisecondsInAYear;

			// Comprobar si el usuario tiene 18 años o más
			if (age <= 18) {
				mensaje += "No tienes 18 años.";
			}
		}
	}

	// if(email =="" || !/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/.test(email) ){
	// 	mensaje += "El formato de un correo electrónico es parte-local@dominio. La longitud máxima de parte-local es 64 caracteres. La longitud máximade dominioes 255 caracteres. Cada una de las partes tiene una longitud mínima de 1 carácter. La parte-local es una combinación de las letras mayúsculas y minúsculas del alfabetoinglés, los dígitos del 0 al 9, los caracteres imprimibles !#$%&'*+-/=?^_`{|}~ y el punto.El punto no puede aparecer ni al principio ni al final y tampoco pueden aparecer dos o más puntos seguidos. El dominio es una secuencia de uno o más subdominio separados por un punto. La longitud máxima de subdominio es 63 caracteres. Un subdominio es una combinación de las letras mayúsculas y minúsculas del alfabetoinglés, los dígitos del 0 al 9 y el guion. El guion no puede aparecer ni al principio ni al final.\n";
	// }






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