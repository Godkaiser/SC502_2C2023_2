<?php
$dbhost = "localhost:8080";
$dbuser = "root";
$dbpass = "";
$dbname = "test";

$conn = mysqli_connect($dbhost,$dbuser, $dbpass,$dbname);
if(!$conn)
{
    die("no hay conexion".mysqli_connect_error());
}
$nombre = $_POST["username"];
$pass = $_POST["password"];

 echo "bienvenido".$nombre

$query = mysqli_query($conn, "select * from login where usuario = '".$nombre."' and password = '".$pass."'");

if($nr == 1)
{
  echo "bienvenido".$nombre;
}
else if($nr == 0)
{
    echo "no ingreso, usuario no existe ";
}

?>