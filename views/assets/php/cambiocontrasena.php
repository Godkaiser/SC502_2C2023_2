<?php
// Configuración de la base de datos
$servidor = "localhost:3306";
$usuario = "root";
$contrasena = "";
$dbnombre = "SC502_2C2023_G2";

// Conexión a la base de datos
$conn = new mysqli($servidor, $usuario, $contrasena, $dbnombre);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Recuperar datos del formulario
$username = $_POST['username'];
$email = $_POST['email'];
$newPassword = $_POST['password'];

// Actualizar la contraseña en la base de datos
$query = "UPDATE clientes SET contrasena = '$newPassword' WHERE username = '$username' AND email = '$email'";
$result = $conn->query($query);

if ($result) {
    // Enviar correo simulado
    $to = $email;
    $subject = "Cambio de contraseña exitoso";
    $message = "Se ha registrado un cambio de contraseña en tu cuenta.";

    // Mostrar pop-up
    echo '<script>alert("Cambio de contraseña exitoso. Se ha enviado un correo de confirmación.");</script>';
    header("Location: http://localhost/SC502_2C2023_G2/views/assets/Index.html");
} else {
    echo '<script>alert("Error al cambiar la contraseña. Por favor, verifica tus datos.");</script>';
}

$conn->close();
?>
