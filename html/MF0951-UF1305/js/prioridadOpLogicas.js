// Prioridad de las operaciones lógicas && y ||
var resultado = document.getElementById('resultado');
if (resultado == null) {
	document.body.insertAdjacentHTML(
		'afterbegin',
		'<p id="resultado"></p>'
	);
	resultado = document.getElementById('resultado');
}
var vaqueros, cortos, largos, azules;
var s = "Prioridad de las operaciones lógicas && y ||:\n\n";
for (let i = 0; i < 16; i++) {
	let t = i.toString(2).padStart(4, '0');
	[vaqueros, cortos, largos, azules] = t.split('').map(x => (x == 1) ? 'true ' : false);
	s += `${vaqueros} && ${cortos} || ${largos} && ${azules} = ${vaqueros && cortos || largos && azules} \n`;
}
resultado.innerText = s;
s = "\n";
for (let i = 0; i < 16; i++) {
	let t = i.toString(2).padStart(4, '0');
	[vaqueros, cortos, largos, azules] = t.split('').map(x => (x == 1) ? 'true ' : false);
	s += `(${vaqueros} && ${cortos}) || (${largos} && ${azules}) = ${(vaqueros && cortos) || (largos && azules)} \n`;
}
resultado.innerText += s;