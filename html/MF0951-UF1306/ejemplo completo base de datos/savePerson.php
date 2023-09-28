<?php
    //Comprobamos si este documento es cargado desde el form//
    if (!isset($_POST['saveData'])) {
        header("Location: index.php");
    }
?>
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
              //Procedemos a la conexión con el servidor y la BD//
              require_once("conexion.php");
              //Extraemos todos los datos del formulario//
              extract($_POST);
              //vamos a comprobar si existe el nif dentro de nuestra tabla personas para comunicárselo al usuario//
              //Preparamos la sentencia SQL por parámetros//
              $param = $cnx->prepare("SELECT nif FROM personas WHERE nif like ?");
              //Esta Sentencia SQL Buscar un NIF que sea igual al que vamos a suministrar por parámetro ? que se lo vamos a sustituir por el introducido por el formulario en la siguiente sentencia//
              $param->bind_param("s",$nif); //Esta sentencia sustituye la ? por el contenido de la variable $nif e indicamos que es string con la s entrecomillada//
              $param->execute(); //Ejecutamos la sentencia y el resultado se carga en $data//
              if ($param->error) {
                //Si se ha producido un error//
                //Aquí cierro el php ya que voy a usar JS para mostrar el aviso de error
                ?>
                    <script>
                        mensajesError("Error al consultar","Hubo un error al comprobar el NIF de la persona");
                        location.href="addPerson.php";
                    </script>    

                <?php
            }
            else{
                $data = $param->get_result(); //Cogemos los resultados devueltos por la consulta//
                if ($data->num_rows > 0) {
                    //Si nos devuelve un resultado mayor de 0 quiere decir que hemos encontrado ese NIF en la tabla, avisamos//
                    echo "El NIF introducido ya existe<br><a href='addPerson.php' class='btn btn-dark'>VOLVER AL FORMULARIO</a>";
                }
                else{
                    //En caso de que no exista el nif pasamos a su almacenamiento//
                    $param = $cnx->prepare("INSERT INTO personas (nif,apellidos,nombre,fechaNacimiento) VALUES (?,?,?,?)");
                    //Al ya existir para la conexión un prepare simplemente se sustituye la sentencia a ejecutar//
                    //Pasamos a darle los 4 parámetros//
                    $param->bind_param("ssss",strtoupper($nif),strtoupper($apellidos),strtoupper($nombre),$fechaNacimiento);
                    $param->execute();
                    if ($param->error) {
                        echo "Se ha producido un error, inténtalo más tarde<br><a href='addPerson.php' class='btn btn-dark'>VOLVER AL FORMULARIO</a>";
                    }
                    else {
                        echo "El proceso se ha realizado con éxito<br><a href='addPerson.php' class='btn btn-dark'>VOLVER AL FORMULARIO</a>";
                    }
                }
            }
        ?>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function mensajesError(titulo,mensaje){
        Swal.fire({
            title: titulo,
            html: mensaje,
            icon: 'error'
        });
        }
        function mensajesOK(titulo,mensaje){
        Swal.fire({
            title: titulo,
            html: mensaje,
            icon: 'success'
        });
        }
    </script>
    </body>
</html>