<?php
$host = "localhost"; // Nombre de host de la base de datos
$db_user = "root"; // Nombre de usuario de la base de datos
$db_password = "Colochosma"; // Contraseña de la base de datos
$db_name = "SC502_2C2023_G2"; // Nombre de la base de datos

// Conexión a la base de datos
$connection = new mysqli($host, $db_user, $db_password, $db_name);

// obtener datos del formulario
$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$imagen = $_POST['imagen'];

// Verificar si hay errores de conexión
if (!$connection) {
    echo "Error de conexión: " . mysql_error();
}
else{
    echo "<b><h3>Se ha conectado correctamente al servidor</h3></b>";
}
//Tabla de Base de datos
$datab= "productos"
$db = mysql_select_db($connection,$datab);

if(!$db){
    echo "no se ha podido encontrar la tabla"
} 
else{
    echo "<h3> Tabla Seleccionada:</h3>";
}

//Insertar datos a la Base de Datos
$instruccion_SQL = "INSERT INTO tabla(nombre, precio, imagen) VALUES ('$nombre','$precio','$imagen')";

$resultado = mysqli_query($connection,$instruccion_SQL);


// enviar la respuesta al cliente
$response = array('success' => true);
header('Content-Type: application/json');
echo json_encode($response);
?>
