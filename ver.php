<?php
$conexion = new mysqli("localhost", "root", "", "contactos");

if ($conexion->connect_error) {
  die("Error de conexión: " . $conexion->connect_error);
}

$resultado = $conexion->query("SELECT * FROM mensajes ORDER BY fecha DESC");
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Mensajes Recibidos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
  <h1>Mensajes Recibidos</h1>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Email</th>
        <th>Mensaje</th>
        <th>Fecha</th>
      </tr>
    </thead>
    <tbody>
      <?php while($fila = $resultado->fetch_assoc()): ?>
        <tr>
          <td><?= htmlspecialchars($fila['nombre']) ?></td>
          <td><?= htmlspecialchars($fila['email']) ?></td>
          <td><?= htmlspecialchars($fila['mensaje']) ?></td>
          <td><?= $fila['fecha'] ?></td>
        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</body>
</html>