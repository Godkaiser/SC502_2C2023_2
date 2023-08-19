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
  $username = $_POST["username"];
  $password = $_POST["password"];

  // Verificar si el usuario y la contraseña coinciden con la tabla clientes
  $sql = "SELECT id FROM clientes WHERE username='$username' AND contrasena='$password'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) == 1) {
      // Inicio de sesión exitoso
      header("Location: http://localhost/SC502_2C2023_G2/views/assets/Index.html");
  } else {
      // Mostrar una alerta en caso de datos incorrectos
      echo "<script>alert('Alguno de sus datos son erróneos. Por favor, verifique nuevamente sus datos.');</script>";
  }
}

// Cerrar la conexión
mysqli_close($conn);
?>
