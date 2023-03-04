var boton = document.getElementById("boton");
var html = document.documentElement;
var iframes = document.getElementsByTagName("iframe");

boton.onclick = () => {
	if (html.classList.contains("temaOscuro")) {
		mensaje = "CLARO";
		boton.innerText = "Tema OSCURO";
	}
	else {
		mensaje = "OSCURO";
		boton.innerText = "Tema CLARO";
	}
	Array.from(iframes).forEach(iframe => {
		iframe.contentWindow.postMessage(mensaje, "*");
	});
	html.classList.toggle("temaOscuro");
}