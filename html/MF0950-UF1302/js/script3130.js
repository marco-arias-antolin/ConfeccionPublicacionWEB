var boton = document.getElementById('botonJS');
boton.onclick = () => {
	boton.classList.toggle("activado");
}

// Detección del navegador:
// https://codepedia.info/detect-browser-in-javascript
var browserName = (function (agent) {
	switch (true) {
		case agent.indexOf("edge") > -1: return "MS Edge";
		case agent.indexOf("edg/") > -1: return "Edge ( chromium based)";
		case agent.indexOf("opr") > -1 && !!window.opr: return "Opera";
		case agent.indexOf("chrome") > -1 && !!window.chrome: return "Chrome";
		case agent.indexOf("trident") > -1: return "MS IE";
		case agent.indexOf("firefox") > -1: return "Mozilla Firefox";
		case agent.indexOf("safari") > -1: return "Safari";
		default: return "other";
	}
})(navigator.userAgent.toLowerCase());
document.getElementById('navegador').innerText = browserName;

/* Para una detección más completa se puede usar:
 https://github.com/WhichBrowser/Parser-PHP
This is an extremely complicated and almost completely useless browser sniffing
library. Useless because you shouldn't use browser sniffing. So stop right now
and go read something about feature detecting instead.
I'm serious. Go away. You'll thank me later.
*/
