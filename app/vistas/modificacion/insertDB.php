<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "viajes_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id_viaje = $_GET['id_viaje'];

$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];
$fecha_inicio = $_POST['fecha_inicio'];
$fecha_fin = $_POST['fecha_fin'];
$precio = $_POST['precio'];
$destacado = $_POST['destacado'];
$tipo_de_viaje = $_POST['tipo_de_viaje'];
$imagen = $_POST['imagen'];

$stmt = $conn->prepare(
    "UPDATE viajes 
     SET titulo = ?, 
         descripcion = ?, 
         fecha_inicio = ?, 
         fecha_fin = ?, 
         precio = ?, 
         destacado = ?, 
         tipo_de_viaje = ?, 
         imagen = ?
     WHERE id_viaje = ?"
);

$stmt->bind_param(
    "ssssdissi",
    $titulo,
    $descripcion,
    $fecha_inicio,
    $fecha_fin,
    $precio,
    $destacado,
    $tipo_de_viaje,
    $imagen,
    $id_viaje
);

$stmt->execute();

$stmt->close();
$conn->close();

header("Location: modificacionIndividual.php?id_viaje=" . $id_viaje);
exit;
?>