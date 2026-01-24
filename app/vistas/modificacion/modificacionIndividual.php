<?php include '..\..\assets\estilos\generalCss.php' ?>

<html>

<head>
    <meta charset="UTF-8">

</head>

<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "viajes_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);

}




$stmt = $conn->prepare("SELECT * FROM viajes WHERE id_viaje = ?");
$stmt->bind_param("i", $id_viaje);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $viaje = $result->fetch_assoc();

    $titulo = $viaje["titulo"] . "<br>";
    $descripcion = $viaje["descripcion"] . "<br>";
    $fechaIni = $viaje["fecha_inicio"] . "<br>";
    $fechaFin = $viaje["fecha_fin"] . "<br>";
    $precio = $viaje["precio"] . "€<br>";
    $destacado = $viaje["destacado"] . "<br>";
    $tipo = $viaje["tipo_de_viaje"] . "<br>";
    $imagen = $viaje["imagen"];
} else {
    echo "Viaje no encontrado";
}

$stmt->close();
?>


<?php include './modificacionHeather.php' ?>


<div style="height: 800px;">
    <h1>JODER
        <?php echo $id_viaje; ?>
    </h1>
</div>



<?php include './modificacionFooter.php' ?>

</html>