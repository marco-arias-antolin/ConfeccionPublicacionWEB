// Definición de la clase ListaTexto
class ListaTexto {
	// Declaración de las variables de instancia
	textoInput;
	formulario;
	borrarBtn;
	lista;

	// Constructor de la clase
	constructor() {
		// Asignación de referencias a los elementos del DOM
		this.textoInput = document.getElementById('textoInput');
		this.formulario = document.getElementById('formulario');
		this.borrarBtn = document.getElementById('borrarBtn');
		this.lista = document.getElementById('lista');

		// Asignación de los manejadores de eventos
		this.formulario.addEventListener('submit', this.insertarTexto);
		this.borrarBtn.addEventListener('click', this.borrarLista);
	}

	// Método para insertar texto en la lista
	insertarTexto = (event) => {
		event.preventDefault();
		const texto = this.textoInput.value.trim();
		if (texto !== '') {
			// Creación de un nuevo elemento de lista
			const nuevoElemento = document.createElement('li');
			nuevoElemento.textContent = texto;
			this.lista.appendChild(nuevoElemento);
			this.textoInput.value = '';
			this.textoInput.focus();
		} else {
			alert('El campo no puede estar vacío.');
		}
	};

	// Método para borrar la lista
	borrarLista = () => {
		while (this.lista.firstChild) {
			this.lista.removeChild(this.lista.firstChild);
		}
	};
}

// Creación de una instancia de la clase ListaTexto
new ListaTexto();
