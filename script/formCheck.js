document.addEventListener("DOMContentLoaded", function(){
	let form = document.querySelector("#formLogin");
	form.addEventListener("submit", comprobarLogin);
});

function comprobarLogin(event){
	let mensaje = "";
	let name = document.querySelector("#userName").value;
	let password = document.querySelector("#pass").value;
	let form = document.querySelector("#formLogin");
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
	if (mensaje != "") {
		let p = document.createElement("p");
		p.innerHTML = mensaje.replace(/\n/g, "<br>");
		form.prepend(p);
		event.preventDefault();
	}
}