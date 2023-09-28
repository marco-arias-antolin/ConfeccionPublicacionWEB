const cambiarTema = document.getElementById('cambiarTema');
cambiarTema.onclick = (event) => {
	if (cambiarTema.innerText == 'Tema Claro') {
		document.body.setAttribute('data-bs-theme', 'light')
		cambiarTema.innerText = 'Tema Oscuro';
	} else {
		document.body.setAttribute('data-bs-theme', 'dark')
		cambiarTema.innerText = 'Tema Claro';
	}
}