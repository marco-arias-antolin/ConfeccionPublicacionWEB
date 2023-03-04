document.documentElement.style.transition = "1.6s";
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