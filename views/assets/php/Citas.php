<?php

$servidor = "localhost:3306";
$usuario = "root";
$contrasena = "";
$dbnombre = "SC502_2C2023_G2";




// Conexión a la base de datos//

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
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
