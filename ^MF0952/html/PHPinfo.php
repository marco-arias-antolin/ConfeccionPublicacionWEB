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
	Descripción:	PHP info
	Uso:			Didáctico.
	-->
	<link rel="icon" type="image/svg+xml" href="data:image/svg+xml;base64,PHN2ZyB4bWxucz0naHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmcnIGhlaWdodD0nMjAwJyB3aWR0aD0nMjAwJyB2aWV3Qm94PScwIDAgMjAwIDIwMCc+DQoJPHRleHQgeD0nNTAlJyB5PScxMTBweCcgc3R5bGU9J2ZpbGw6I2FkYjViZDtkb21pbmFudC1iYXNlbGluZTpjZW50cmFsO2ZvbnQtc2l6ZTozMzNweDtmb250LWZhbWlseTpDb3VyaWVyO2ZvbnQtd2VpZ2h0OmJvbGQ7dGV4dC1hbmNob3I6bWlkZGxlJz5NPC90ZXh0Pg0KPC9zdmc+">
	<title>PHP info</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="Marco Antonio Arias Antolín">
	<meta name="description" content="PHP info.">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
	<style>
		footer {
			transform-origin: bottom;
			transition: .6s;
		}

		footer>span {
			display: inline-block;
			margin: 0 auto;
			width: 66%;
		}

		footer>span>span {
			display: inline-block;
			transform: scale(-1.6, 1.6);
		}

		footer:hover {
			transform: scale(1.16);
		}
	</style>
</head>

<body class="m-5 pb-5" data-bs-theme="dark">
	<header>
		<h1>Información de PHP</h1>
	</header>
	<main>
		<?php
		// Muestra la información de PHP
		phpinfo();
		?>
	</main>
	<footer class="fixed-bottom p-3 text-center bg-dark">
		<span class="border-top border-light rounded"><span>&copy;</span> Marco Antonio Arias Antolín. 2023</span>
	</footer>
	<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/071a33fca8.js" crossorigin="anonymous"></script>
</body>

</html>