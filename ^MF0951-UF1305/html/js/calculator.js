var result = document.getElementById("result");

// Agrega el valor al final del resultado actual
function appendToResult(value) {
	result.value += value;
}

function calculateResult() {
	try {
		// Calcula el resultado de la expresión matemática ingresada
		result.value = eval(result.value);
	} catch (error) {
		// En caso de error, muestra "Error" en el resultado
		result.value = "Error";
	}
}

function clearResult() {
	// Limpia el contenido del resultado
	result.value = "";
}

function deleteLastCharacter() {
	// Elimina el último carácter del resultado
	result.value = result.value.slice(0, -1);
}

document.addEventListener("keydown", function (event) {
	var key = event.key;
	var allowedKeys = /^[0-9+\-*/.()]|Enter|Backspace|Delete|ArrowLeft|ArrowRight|ArrowUp|ArrowDown|Home|End|Control|Shift|Alt$/;

	if (!allowedKeys.test(key)) {
		// Evita que se ejecute el comportamiento predeterminado para las teclas no permitidas
		event.preventDefault();
		return;
	}

	if (key === "Enter") {
		// Calcula el resultado cuando se presiona la tecla "Enter"
		calculateResult();
	} else if (key === "Delete") {
		// Limpia el resultado cuando se presiona la tecla "Delete" o "Backspace"
		clearResult();
	} else if (key === "Backspace") {
		// Elimina el último carácter del resultado
		deleteLastCharacter();
	} else if (key === "ArrowLeft" || key === "ArrowRight" || key === "ArrowUp" || key === "ArrowDown" || key === "Control" || key === "Shift" || key === "Alt" || key === "Home" || key === "End") {
		// Permitir las teclas de dirección y las teclas Home/End
	} else if ("0123456789/*-+.()".includes(key)) {
		// Agrega el carácter correspondiente a la tecla presionada al resultado
		appendToResult(key);
	} else {
		appendToResult("Algo va mal");
	}
});
