<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "proyectos";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //Defino variables con sus nombres para poder añadirlo posteriormente a la tabla
    $nombreProyecto = $_POST['proyecto'];
    $nombreIMG = $_FILES['img']['name'];
    $descripcion = $_POST['short_desc'];
    //Subo archivo a la carpeta
    $target_path = "proyectos/";
    $target_path = $target_path . basename($_FILES['img']['name']);
    move_uploaded_file($_FILES['img']['tmp_name'], $target_path);
    //Inserto datos en SQL
    $sql = "INSERT INTO proyectos (title, image, description) VALUES ('$nombreProyecto', '$nombreIMG', '$descripcion')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('¡El proyecto ha sido agregado con exito!');</script>";
    } else {
        echo "<script>alert('Se ha producido un error, revise la conexion con el servidor de mysql');</script>";
    }

}
$conn->close();
?>

<html lang="es" data-bs-theme="dark">

<head>
    <title>Añadir Proyecto
    </title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link href="./assets/bootstrap\css\bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <!--Inicio Librerias JS-->
    <script src="./js/popper.min.js"></script>
    <script src="./assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="./js/jquery-3.7.1.min.js"></script>
    <!--Fin Librerias JS-->
    <header class="p-3 mb-3 border-bottom sticky-top bg-secondary text-center">
        <a href="./" class="nav-link px-2 link-body-emphasis"><i class="bi bi-person-lines-fill"></i> Volver a la pagina
            principal</a>
    </header>
    <main>
        <div class="container" id="contacto">
            <h1 class="text-center">Añadir nuevo proyecto</h1>
            <br><br>
            <div class="row align-items-center">
                <div class="col ">
                    <form class="was-validated" id="proyectForm" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="validationCustom01" class="form-label">Nombre del proyecto</label>
                            <input type="text" class="form-control" id="proyecto" name="proyecto" maxlength="20"
                                required>
                            <div class="valid-feedback">Valido</div>
                        </div>
                        <div class="mb-3">
                            <label for="validationCustom01" class="form-label">Imagen</label>
                            <input type="file" id="img" name="img" class="form-control" maxlength="100" required>
                        </div>
                        <div class="mb-3">
                            <label for="validationCustom02" class="form-label">Descripcion</label>
                            <input type="text" class="form-control" id="short_desc" name="short_desc" maxlength="120"
                                required>
                            <div class="valid-feedback">correcto</div>
                        </div><br>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Añadir Proyecto</button>
                            <button type="reset" class="btn btn-primary">Limpiar formlario</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>

</html>