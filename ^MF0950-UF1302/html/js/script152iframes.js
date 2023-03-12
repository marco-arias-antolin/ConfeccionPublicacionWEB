// Lo pongo aquí porque no tiene hoja de estilos.
document.documentElement.style.transition = "1.6s";
// Cambia el color de letra de la página. El fondo lo hereda.
onmessage = (event) => {
	if (event.data == "CLARO") {
		document.documentElement.style.color = "black";
	} else {
		document.documentElement.style.color = "green";
	}
}
/*
// También se puede agregar el evento de la forma tradicional.
window.addEventListener("message", (event) => {
	// El contenido del mensaje está en event.data
}, false);
*/

// Manda un mensaje con la altura de la página y el origen (dos páginas tienen el mismo script).
origin = this.location.href.split('/');
origin = origin[origin.length - 1].split('.')[0];
var msg = {
	origin: origin,
	height: 0 // Se pone al mandar el mensaje.
}
var video = document.getElementsByTagName('video');
if (video[0]) {
	// Hay que esperar a que se carge el vídeo para tener la altura correcta.
	video[0].onloadedmetadata = () => { sendMsg(); }
} else {
	sendMsg();
}
// Pone la altura y manda el mensaje.
function sendMsg() {
	msg.height = Math.max(document.body.scrollHeight, document.body.offsetHeight,
		document.documentElement.clientHeight, document.documentElement.scrollHeight, document.documentElement.offsetHeight);
	parent.postMessage(msg, '*');
}