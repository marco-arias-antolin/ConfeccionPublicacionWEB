window.onload = function () {
	// Obtener el elemento canvas
	var canvas = document.getElementById('snow');
	var ctx = canvas.getContext('2d');

	// Configurar el tamaño del canvas
	canvas.width = window.innerWidth;
	canvas.height = window.innerHeight;

	// Crear un array para almacenar los copos de nieve
	var snowflakes = [];

	// Función para crear un copo de nieve
	function createSnowflake() {
		var x = Math.random() * canvas.width;
		var y = 0;
		var radius = Math.random() * 4 + 1;
		var speed = Math.random() * 3 + 1;
		var opacity = Math.random() * 0.5 + 0.5;

		snowflakes.push({
			x: x,
			y: y,
			radius: radius,
			speed: speed,
			opacity: opacity
		});
	}

	// Función para dibujar los copos de nieve en el canvas
	function drawSnowflakes() {
		ctx.clearRect(0, 0, canvas.width, canvas.height);

		ctx.fillStyle = 'white';
		ctx.beginPath();
		for (var i = 0; i < snowflakes.length; i++) {
			var snowflake = snowflakes[i];
			ctx.moveTo(snowflake.x, snowflake.y);
			ctx.arc(snowflake.x, snowflake.y, snowflake.radius, 0, Math.PI * 2, true);
		}
		ctx.fill();
	}

	// Función para actualizar la posición de los copos de nieve
	function updateSnowflakes() {
		for (var i = 0; i < snowflakes.length; i++) {
			var snowflake = snowflakes[i];
			snowflake.y += snowflake.speed;

			if (snowflake.y > canvas.height) {
				snowflakes.splice(i, 1);
				i--;
			}
		}
	}

	// Función de animación
	function animateSnowflakes() {
		createSnowflake();
		drawSnowflakes();
		updateSnowflakes();
		requestAnimationFrame(animateSnowflakes);
	}

	// Iniciar la animación
	animateSnowflakes();
};
