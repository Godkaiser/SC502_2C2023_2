<?php
// Establecer conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "SC502_2C2023_G2";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombreServicio = $_POST["name-Servicio"];
    $descripcion = $_POST["descripcion"];

    // Procesar la imagen y guardarla en la base de datos
    if (isset($_FILES["imagen"]) && $_FILES["imagen"]["error"] == 0) {
        $imagenData = file_get_contents($_FILES["imagen"]["tmp_name"]);
        $imagenData = mysqli_real_escape_string($conn, $imagenData);

        // Insertar datos en la tabla Servicios
        $insertQuery = "INSERT INTO Servicios (Nombre_Servicio, descripcion, ImagenSer) VALUES ('$nombreServicio', '$descripcion', '$imagenData')";
        mysqli_query($conn, $insertQuery);

        // Redirigir a la página de administración de servicios
        header("Location: http://localhost/SC502_2C2023_G2/views/assets/ServicioAdmin.html");
    }
}

$conn->close();
?>