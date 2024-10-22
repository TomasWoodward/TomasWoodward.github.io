/*Este fichero comprueba que el login de la pagina esta correctamente formateado*/
/*Si no lo esta, muestra un mensaje de error*/

document.addEventListener("DOMContentLoaded", function(){
	let form = document.querySelector("#formLogin");
	form.addEventListener("submit", comprobarLogin);
});

function comprobarLogin(event){
	/*--------VARIABLES PARA COMPROBAR----------*/
	let mensaje = "";
	let nameInput = document.querySelector("#userName");
	let name = nameInput.value;

	let passwordInput = document.querySelector("#pass");
	let password = passwordInput.value;

	let form = document.querySelector("#formLogin");
	
	/*--------QUITAR ESPACIOS EN BLANCO Y TABULACIONES----------*/
	name = name.replaceAll(/\s/g, "");
	name = name.replaceAll(/\t/g, "");
	password = password.replaceAll(/\s/g, "");
	password = password.replaceAll(/\t/g, "");
	
	if (name == "" ) {
		mensaje += "El campo nombre no puede estar vacio\n";
		nameInput.style.backgroundColor = 'red';
	}else{
		nameInput.style.backgroundColor = '#e0e0e0';
	}

	if (password == "") {
		mensaje += "El campo contraseña no puede estar vacio\n";
		passwordInput.style.backgroundColor = 'red';
	}else{
		passwordInput.style.backgroundColor = '#e0e0e0';
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