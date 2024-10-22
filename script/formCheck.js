/*Este fichero comprueba que el login de la pagina esta correctamente formateado*/
/*Si no lo esta, muestra un mensaje de error*/

document.addEventListener("DOMContentLoaded", function(){
	let form = document.querySelector("#formLogin");
	form.addEventListener("submit", comprobarLogin);
});

function comprobarLogin(event){
	/*--------VARIABLES PARA COMPROBAR----------*/
	let mensaje = "";
	let name = document.querySelector("#userName").value;
	let password = document.querySelector("#pass").value;
	let form = document.querySelector("#formLogin");
	
	/*--------QUITAR ESPACIOS EN BLANCO Y TABULACIONES----------*/
	name = name.replaceAll(/\s/g, "");
	name = name.replaceAll(/\t/g, "");
	password = password.replaceAll(/\s/g, "");
	password = password.replaceAll(/\t/g, "");
	
	if (name == "" ) {
		mensaje += "El campo nombre no puede estar vacio\n";
	}
	if (password == "") {
		mensaje += "El campo contraseña no puede estar vacio\n";
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