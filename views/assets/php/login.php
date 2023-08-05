<?php
$servidor = "localhost:3305";
$usuario = "root";
$contrasena = "Colochosma";
$dbnombre = "SC502_2C2023_G2";

$conexion = mysqli_connect($servidor,$usuario, $contrasena, $dbnombre);
if(!$conexion)
{
    die("Conexion Fallida".mysqli_connect_error());
}

$sql = "SELECT * FROM clientes";
$resultado = mysqli_query($conexion, $sql);

if(mysqli_num_rows($resultado)>0){
  while($fila = mysqli_fetch_assoc($resultado)){
    echo "ID: " . $fila["id"]
  }
}

$nombre = $_POST["username"];
$pass = $_POST["password"];

 echo "bienvenido".$nombre

$query = mysqli_query($conn, "select * from login where usuario = '".$nombre."' and password = '".$pass."'");
$nr = mysqli_num_rows($query);
if($nr == 1)
{
  echo "bienvenido".$nombre;
}
else if($nr == 0)
{
    echo "no ingreso, usuario no existe ";
}

?>