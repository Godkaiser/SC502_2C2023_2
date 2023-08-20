<?php

$servidor = "localhost:3307";
$usuario = "root";
$contrasena = "";
$dbnombre = "SC502_2C2023_G2";




// Conexión a la base de datos//

$conn = new mysqli($servidor, $usuario, $contrasena, $dbnombre);

if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}

//Agregar datos del formulario//

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre= $_POST["nombre"];
    $fecha= $_POST["fecha"];
    $hora= $_POST["hora"];
    $servicio= $_POST["servicio"];

        // Insertar datos en la tabla Citas
        $insertQuery = "INSERT INTO Citas (nombre, fecha, hora, servicio) VALUES ('$nombre', '$fecha', '$hora''$servicio')";
        mysqli_query($conn, $insertQuery);

        // Redirigir a la página de administración de servicios
        header("Location: http://localhost/SC502_2C2023_G2/views/assets/Citas.html");
    }

$conn->close();
?>
?>
