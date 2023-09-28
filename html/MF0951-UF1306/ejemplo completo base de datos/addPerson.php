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
        <section class="container my-3 w-75">
            <form name="formPerson" id="formPerson" action="savePerson.php" method="post" class="border border-dark rounded bg-secondary p-5">
                <h2 class="text-white border-bottom border-white">Entrada de Personas a la Base de Datos</h2>
                <div class="row align-items-center">
                    <div class="col-md-12 col-lg-4">
                        <img src="images/persona.png" alt="Persona" class="logos">
                    </div>
                    <div class="col-lg-8 text-white">
                        <label class="form-label">NIF/NIE <span class="text-danger">(*)</span></label>
                        <input type="text" required name="nif" id="nif" class="bg-dark form-control w-25 text-white">
                        <div class="col-lg-8 text-white">
                        <label class="form-label">Apellidos <span class="text-danger">(*)</span></label>
                        <input type="text" required name="apellidos" id="apellidos" class="bg-dark form-control text-white">
                        <label class="form-label">Nombre <span class="text-danger">(*)</span></label>
                        <input type="text" required name="nombre" id="nombre" class="bg-dark form-control text-white">
                        <label class="form-label">Fecha de Nacimiento <span class="text-danger">(*)</span></label>
                        <input type="date" required name="fechaNacimiento" id="fechaNacimiento" class="bg-dark form-control text-white">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="lopd" name="lopd" required>
                            <label class="form-check-label text-white">
                                He leído la política de protección de datos
                            </label>
                        </div>
                        <input type="submit" class="btn btn-light mt-2" value="GRABAR DATOS" name="saveData" id="saveData">
                        <div class="mt-4">
                            <span class="text-bg-danger p-2">(*) Datos Obligatorios</span>
                        </div>
                    </div>
                    </div>
                    
                </div>
                
            </form>
        </section>
    <?php require_once("footer.html"); ?>   
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    </body>
</html>