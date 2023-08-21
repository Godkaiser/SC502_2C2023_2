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

  // Utilizar consultas preparadas para evitar inyección SQL
  $sql = "SELECT id FROM clientes WHERE username = ? AND contrasena = ?";
  $stmt = mysqli_prepare($conn, $sql);
  
  if ($stmt) {
      mysqli_stmt_bind_param($stmt, "ss", $username, $password);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);
      
      if (mysqli_stmt_num_rows($stmt) == 1) {
          // Inicio de sesión exitoso
          header("Location: http://localhost/SC502_2C2023_G2/views/assets/InicioU.html");
      } else {
          // Mostrar una alerta en caso de datos incorrectos
          echo "<script>alert('Alguno de sus datos son erróneos. Por favor, verifique nuevamente sus datos.'); window.location.href='http://localhost/SC502_2C2023_G2/views/assets/Login.html';</script>";
      }
      
      mysqli_stmt_close($stmt);
  } else {
      echo "Error en la consulta preparada: " . mysqli_error($conn);
  }
}

// Cerrar la conexión
mysqli_close($conn);
?>
