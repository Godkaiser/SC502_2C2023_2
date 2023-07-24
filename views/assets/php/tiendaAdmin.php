<?php
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
