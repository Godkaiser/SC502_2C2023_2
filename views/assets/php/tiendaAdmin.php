<?php
$host = "localhost"; // Nombre de host de la base de datos
$db_user = "root"; // Nombre de usuario de la base de datos
$db_password = "Colochosma"; // Contraseña de la base de datos
$db_name = "SC502_2C2023_G2"; // Nombre de la base de datos

// Conexión a la base de datos
$connection = new mysqli($host, $db_user, $db_password, $db_name);

// Verificar si hay errores de conexión
if ($connection->connect_error) {
    die("Error de conexión: " . $connection->connect_error);
}

// obtener datos del formulario
$name = $_POST['name'];
$price = $_POST['price'];
$description = $_POST['description'];

// validar datos

// insertar los datos en la base de datos (FALTAAAAAA)
// ...

// enviar la respuesta al cliente
$response = array('success' => true);
header('Content-Type: application/json');
echo json_encode($response);
?>
