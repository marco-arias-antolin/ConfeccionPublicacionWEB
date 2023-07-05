function esParOImpar() {
	var numero = prompt("Introduce un número entero");
	var resultado = parImpar(numero);
	alert("El número " + numero + " es " + resultado);

	function parImpar(numero) {
		if (numero % 2 == 0) {
			return "par";
		} else {
			return "impar";
		}
	}
}

// Cambio del color del botón
// El botón que cambia de color
const menuBtn = document.getElementById('menuBtn');
// Los botones que hacen que cambie de color
const botones = document.getElementsByClassName('cambiarColor');
// Recorro los botones que cambian el color
for (let btn of botones) {
	// Añado el evento para cambiar la clase
	btn.onclick = (event) => {
		// Reemplazo la clase que tiene el botón por la clase con el color deseado
		menuBtn.classList.replace(menuBtn.classList[1], event.srcElement.classList[1]);
	}
}