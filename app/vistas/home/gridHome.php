<?php include '../assets/estilos/generalCss.php' ?>

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
    $fecha = $viaje["fecha_inicio"] . "<br>";
    $precio = $viaje["precio"] . "€<br>";
    $imagen = $viaje["imagen"];
} else {
    echo "Viaje no encontrado";
}

$stmt->close();
?>

<?php
if (!empty($imagen)) {
    if (filter_var($imagen, FILTER_VALIDATE_URL)) {
        $src = $imagen;
    } else {
        $src = "../assets/imagenes/" . $imagen;
    }
}
?>

<div class="containerRow" style="justify-content: space-evenly;">

    <img src="<?php echo $src; ?>" style="width: 50%; height: auto; padding: 10px;">
    <div class="containerColumn">
        <h2>
            <?php echo $titulo; ?>
        </h2>

        <h3>
            <?php echo $fecha; ?>
        </h3>

        <h3>
            <?php echo $precio; ?>
        </h3>
    </div>
</div>