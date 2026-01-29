<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "viajes_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];
$fecha_inicio = $_POST['fecha_inicio'];
$fecha_fin = $_POST['fecha_fin'];
$precio = $_POST['precio'];
$destacado = $_POST['destacado'];
$tipo_de_viaje = $_POST['tipo_de_viaje'];
$plazas = $_POST['plazas'];
$imagen = $_POST['imagen'];

$stmt = $conn->prepare(
    "INSERT INTO viajes (
        titulo,
        descripcion,
        fecha_inicio,
        fecha_fin,
        precio,
        destacado,
        tipo_de_viaje,
        plazas,
        imagen
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)"
);

$stmt->bind_param(
    "ssssdisis",
    $titulo,
    $descripcion,
    $fecha_inicio,
    $fecha_fin,
    $precio,
    $destacado,
    $tipo_de_viaje,
    $plazas,
    $imagen
);

$stmt->execute();

$stmt->close();
$conn->close();

header("Location: ../public/adicion.php");
exit;
?>