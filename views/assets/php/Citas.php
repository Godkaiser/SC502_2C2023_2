<?php

$host = "localhost";
$db_user = "root";
$db_password = "Colochosma";
$db_name = "SC502_2C2023_G2";

// Conexión a la base de datos//

$connection = new mysqli($host, $db_user, $db_password, $db_name);

//Agregar datos del formulario//

$nombre = $_POST['nombre'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$servicio = $_POST['servicio'];

if (!$connection) {
    echo "Error de conexión: " . mysql_error();
}
else{
    echo "<b><h3>Se ha conectado correctamente al servidor</h3></b>";
}

$instruccion_SQL = "INSERT INTO tabla(nombre, fecha, hora, servicio) VALUES ('$nombre','$fecha','$hora','$servicio')";

$resultado = mysqli_query($connection,$instruccion_SQL);

$response = array('success' => true);
header('Content-Type: application/json');
echo json_encode($response);
?>