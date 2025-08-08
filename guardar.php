<?php
$conexion = new mysqli("localhost", "root", "", "contactos");

if ($conexion->connect_error) {
  die("Error de conexión: " . $conexion->connect_error);
}

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$mensaje = $_POST['mensaje'];

$sql = "INSERT INTO mensajes (nombre, email, mensaje) VALUES (?, ?, ?)";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("sss", $nombre, $email, $mensaje);
$stmt->execute();

echo "Mensaje guardado correctamente.";
?>