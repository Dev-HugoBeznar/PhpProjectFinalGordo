<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "viajes_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!isset($_GET['id_viaje'])) {
    die("ID de viaje no especificado");
}

$id_viaje = $_GET['id_viaje'];

$stmt = $conn->prepare("DELETE FROM viajes WHERE id_viaje = ?");
$stmt->bind_param("i", $id_viaje);
$stmt->execute();

$stmt->close();
$conn->close();

header("Location: ../public/adicion.php");
exit;
?>