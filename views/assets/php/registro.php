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
    $name = $_POST["name"];
    $lastname = $_POST["lastname"];
    $username = $_POST["username"];
    $telefono = $_POST["telefono"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    if ($password === "Admin_NancysSalon_123") {
        // Registro de administrador
        $sql = "INSERT INTO roles (nombre) VALUES ('Admin')";
        mysqli_query($conn, $sql);
        $user_id = mysqli_insert_id($conn);

        // Redirigir al admin a Admin.php
        header("Location: http://localhost/SC502_2C2023_G2/views/assets/Admin.php");
    } else {
        // Registro de usuario normal
        $sql = "INSERT INTO clientes (nombre, apellidos, username, email, telefono, contrasena) VALUES ('$name', '$lastname', '$username', '$email', '$telefono', '$password')";
        mysqli_query($conn, $sql);

        // Redirigir al usuario a Index.html
        header("Location: http://localhost/SC502_2C2023_G2/views/assets/InicioU.html");
    }
}

// Cerrar la conexión
mysqli_close($conn);
?>
