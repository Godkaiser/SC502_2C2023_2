<?php
$dbhost = "localhost:3306";
$dbuser = "root";
$dbpass = "Colochosma";
$dbname = "SC502_2C2023_G2";

$conn = mysqli_connect($dbhost,$dbuser, $dbpass,$dbname);
if(!$conn)
{
    die("no hay conexion".mysqli_connect_error());
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