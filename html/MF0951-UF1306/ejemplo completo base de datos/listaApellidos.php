<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>EJEMPLOS BD CON PHP</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <link href="css/styles.css" type="text/css" rel="stylesheet">
    </head>
    <body>
        <?php require_once("header.html"); 
              require_once("nav.html"); 
        ?>
        <nav aria-label="breadcrumb" class="container-fluid bg-light">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php" class="text-dark">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Listado Apellidos</li>
            </ol>
        </nav>
        <?php    
              if (!isset($_POST['filtro'])) {
                //Si no existe la variable filtro, mostramos un pequeño formulario para ayudar a mostrar mejor una tabla grande de datos//
                ?>
                <section class="container w-75 mt-2 bg-secondary p-3">
                    <form name="form1" id="form1" method="post" action="listaApellidos.php">
                        <label class="form-label text-white">Introduzca apellidos a buscar</label>
                        <input type="text" required maxlength="100" class="form-control" placeholder="Teclear apellidos o patrón de búsqueda" name="filtro" id="filtro">
                        <input type="submit" class="btn btn-dark" value="Aceptar">
                    </form>
                </section>

                <?php
              }
              else{
                //Sí existe la variable es que el usuario hizo clic y recargo la página, pasamos a mostrar el listado según su petición//
                ?>
                <section class="container-fluid p-0">
                    <h2 class="text-bg-success p-3">Resultados</h2>

                <table class="table">
                    <header class="text-center">
                        <tr class="text-center">
                            <th>NIF</th>
                            <th>Apellidos</th>
                            <th>Nombre</th>
                            <th>Fecha Nacimiento</th>
                            <th>Modificar</th>
                            <th>Eliminar</th>
                        </tr>
                    </header>
                    <tbody>
                        <?php
                            //Abrimos desde aquí PHP para cargar los resultados//
                            //Nos conectamos al SERVER y a la BD//
                            require_once("conexion.php");
                            extract($_POST);
                            //Preparamos la sentencia a ejecutar, en este caso si hay parámetro -> los apellidos//
                            $param = $cnx->prepare("SELECT nif, apellidos, nombre, DATE_FORMAT(fechaNacimiento,'%d-%m-%Y') as 'fecha' FROM personas WHERE apellidos like ? ORDER BY apellidos, nombre");
                            $buscamos = "%".strtoupper($filtro)."%";
                            //Agregamos el comodin para que busque el apellidos tanto como primero como segundo, el comodín % sustituye a un conjunto de caracteres//
                            $param->bind_param("s",$buscamos);
                            //Ejecutamos//
                            $param->execute();
                            $data = $param->get_result();
                            //get result recoge los resultados obtenidos y los carga en la variable data//
                            while ($row = $data->fetch_assoc()) {
                                //fetch assoc devuelve un array o fila que se carga en la variable $row (la podremos llamar como queramos)//
                                extract($row); //Extraemos cada fila y creamos los tr y td//
                                echo "<tr><td class='text-center'>$nif</td><td class='text-center'>$apellidos</td><td class='text-center'>$nombre</td><td class='text-center'>$fecha</td><td class='text-center'><a href='updatePersona.php?id=$nif' class='btn btn-success'>Modificar</a></td><td class='text-center'><a href='deletePersona.php?id=$nif' class='btn btn-danger'>Eliminar</a></td></tr>";
                            }
                            $cnx->close();//Cerramos la conexión//
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="6" class="text-center">
                                <a href="listaApellidos.php" class="btn btn-secondary">Volver</a>
                            </td>
                        </tr>
                    </tfoot>
                </table>
                </section>
                <?php
              }

        ?>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    </body>
</html>