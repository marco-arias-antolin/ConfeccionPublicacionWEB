// Cambiar de tema claro a tema oscuro.
var boton = document.getElementById("boton");
var html = document.documentElement;
var iframes = document.getElementsByTagName("iframe");
boton.onclick = () => {
	if (html.classList.contains("temaOscuro")) {
		msg = "CLARO";
		boton.innerText = "Tema OSCURO";
	}
	else {
		msg = "OSCURO";
		boton.innerText = "Tema CLARO";
	}
	Array.from(iframes).forEach(iframe => {
		iframe.contentWindow.postMessage(msg, "*");
	});
	html.classList.toggle("temaOscuro");
}

// Pone la altura de los dos iframes.
var iframe;
onmessage = (event) => {
	try {
		iframe = setIframe(event.data.origin);
		if (iframe) {
			iframe.style.height = event.data.height + 'px';
		}
	} catch (e) {
		console.log(e);
	}
}
// Pone el iframe correspondiente a la página que envía el mensaje.
function setIframe(origin) {
	if (origin == 'Apartado1520main') {
		iframe = document.getElementById('iframe_1');
	} else if (origin == 'Apartado1520videos') {
		iframe = document.getElementById('iframe_2');
	}
	return iframe;
}