<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<!--
	Copyright (C) 2023	Marco Arias - mail://marcoariasantolin@gmail.com

	This program is free software: you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation, either version 3 of the License, or
	(at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program.  If not, see <http://www.gnu.org/licenses/>.

	Autor:			Marco Antonio Arias Antolín.
	Año:			2023
	Descripción:	Índice de las entregas.
	Uso:			Didáctico.
	-->
	<!-- <link rel="icon" type="image/svg+xml" href="data:image/svg+xml;base64,PHN2ZyB4bWxucz0naHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmcnIGhlaWdodD0nMjAwJyB3aWR0aD0nMjAwJyB2aWV3Qm94PScwIDAgMjAwIDIwMCc+DQoJPHRleHQgeD0nNTAlJyB5PScxMTBweCcgc3R5bGU9J2ZpbGw6I2FkYjViZDtkb21pbmFudC1iYXNlbGluZTpjZW50cmFsO2ZvbnQtc2l6ZTozMzNweDtmb250LWZhbWlseTpDb3VyaWVyO2ZvbnQtd2VpZ2h0OmJvbGQ7dGV4dC1hbmNob3I6bWlkZGxlJz5NPC90ZXh0Pg0KPC9zdmc+"> -->
	<link rel="icon" type="image/svg+xml" href="img/favicon.svg">
	<title>Índice entregas</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="Marco Antonio Arias Antolín">
	<meta name="description" content="Índice de las entregas.">
	<link rel="stylesheet" href="/ConfeccionPublicacionWEB/css/style.css">
	<style>
		body {
			margin: 0;
		}

		header {
			align-items: center;
			display: flex;
			flex-direction: column;
		}

		main {
			display: block;
		}

		iframe {
			border: 0;
			flex: 1;
		}

		nav {
			display: inline-block;
			margin: 0;
			padding: 6px;
		}

		h2 {
			margin: 0;
		}

		nav ul {
			border-radius: .6rem;
			list-style: none;
			margin: 0;
			padding: 0 2rem;
			position: absolute;
			transform-origin: top left;
			transform: scale(0);
			transition: .6s;
		}

		nav li {
			background: var(--bg);
			border: 2px solid var(--color);
			border-bottom: 0;
			padding: 0 3rem;
			text-align: center;
		}

		nav li:last-child {
			border: 2px solid var(--color);
		}

		nav a {
			display: inline-block;
			padding: 6px;
			width: 100%;
		}

		nav:hover ul {
			transform: scale(1) translate(-3rem, -7rem);
		}
	</style>
</head>

<body>
	<header>
		<h1>Índice de las entregas<br>146/FOD/47/2022 IFCD0110</h1>
	</header>
	<main><pre><?php

function listarDirectorio($directorio, $nivel = 0) {
    if (is_dir($directorio)) {
        $archivosHTML = false;
        $carpetas = [];
        $archivos = scandir($directorio);
        $espacios = str_repeat("│   ", $nivel);

        foreach ($archivos as $archivo) {
            if ($archivo != "." && $archivo != "..") {
                $rutaCompleta = $directorio . '/' . $archivo;

                if (is_dir($rutaCompleta)) {
                    $carpetas[] = $archivo;
                } elseif (pathinfo($rutaCompleta, PATHINFO_EXTENSION) == "html") {
                    $archivoHTML = htmlspecialchars($archivo);
                    echo $espacios . "├─ 📄 <a href=\"$rutaCompleta\">$archivoHTML</a><br>";
                    $archivosHTML = true;
                }
            }
        }

        // Mostrar carpetas después de archivos HTML
        foreach ($carpetas as $carpeta) {
            echo $espacios . "├─ 📁 " . $carpeta . "<br>";
            if (listarDirectorio($directorio . '/' . $carpeta, $nivel + 1)) {
                $archivosHTML = true;
            }
        }

        return $archivosHTML;
    }

    return false;
}

$directorioInicial = ".";
listarDirectorio($directorioInicial);

?>

</pre>
	</main>
	<footer>
		<span><span>&copy;</span> Marco Antonio Arias Antolín. 2023</span>
	</footer>
</body>

</html>