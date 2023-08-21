<?php
// Establecer conexión a la base de datos
$servidor = "localhost:3306";
$usuario = "root";
$contrasena = "";
$dbnombre = "SC502_2C2023_G2";

$conn = mysqli_connect($servidor, $usuario, $contrasena, $dbnombre);


if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombreServicio = $_POST["Nombre_Servicio"];
    $descripcion = $_POST["descripcion_servicio"];

    // Procesar la imagen y guardarla en la base de datos
    if (isset($_FILES["imagen"]) && $_FILES["imagen"]["error"] == 0) {
        $imagenData = file_get_contents($_FILES["imagen"]["tmp_name"]);
        $imagenData = mysqli_real_escape_string($conn, $imagenData);

        // Insertar datos en la tabla Servicios
        $insertQuery = "INSERT INTO Servicios (Nombre_Servicio, descripcion_servicio, ImagenSer) VALUES ('$nombreServicio', '$descripcion', '$imagenData')";
        mysqli_query($conn, $insertQuery);

        // Redirigir a la página de administración de servicios
        header("Location: http://localhost/SC502_2C2023_G2/views/assets/ServicioAdmin.html");
    }
}

$conn->close();
?>