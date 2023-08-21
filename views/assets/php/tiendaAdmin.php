<?php
$servidor = "localhost:3306";
$usuario = "root";
$contrasena = "";
$dbnombre = "SC502_2C2023_G2";

$conn = mysqli_connect($servidor, $usuario, $contrasena, $dbnombre);

if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $nombre = $_POST['nombre_producto'];
    $precio = $_POST['precio_producto'];
    $categoria = $_POST['categoria_producto'];

    if (isset($_FILES["imagen_producto"]) && $_FILES["imagen_producto"]["error"] == 0) {
        $imagenData = file_get_contents($_FILES["imagen_producto"]["tmp_name"]);
        $imagenData = mysqli_real_escape_string($conn, $imagenData);

        // Insertar datos en la tabla productos
        $insertQuery = "INSERT INTO productos (nombre, precio, ImagenPro, categoria) VALUES ('$nombre', $precio, '$imagenData', '$categoria')";
        mysqli_query($conn, $insertQuery);
        header("Location: http://localhost/SC502_2C2023_G2/views/assets/TiendaAdmin.html");
    }


}

$conn->close();
?>