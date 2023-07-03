function calcularEdad1() {
	// Se le pide al usuario que ingrese su nombre
	var nombre = prompt("Por favor, ingresa tu nombre:");

	// Se le pide al usuario que ingrese su año de nacimiento
	var anioNacimiento = prompt("Por favor, ingresa tu año de nacimiento:");

	// Obtiene el año actual
	var anioActual = new Date().getFullYear();

	// Calcula la edad del usuario
	var edad = anioActual - parseInt(anioNacimiento);

	// Muestra por pantalla el saludo con el nombre y la edad del usuario
	alert(`Hola, ${nombre} tiene ${edad} años.`);
}

function calcularEdad2() {
	// Obtener los valores ingresados por el usuario
	var nombre = document.getElementById("nombre").value;
	var anioNacimiento = document.getElementById("anioNacimiento").value;

	// Se comprueba que hay datos.
	if (!nombre || !anioNacimiento) return;

	// Obtiene el año actual
	var anioActual = new Date().getFullYear();

	// Calcula la edad del usuario
	var edad = anioActual - parseInt(anioNacimiento);

	// Mostrar el resultado en el HTML
	var resultado = `Hola, ${nombre} tiene ${edad} años.`;
	document.getElementById("salida").textContent = resultado;
}