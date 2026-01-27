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

<div class="containerRow" style="justify-content: space-evenly; padding: 10px;">

    <img src="<?php echo $src; ?>" style="width: 50%; height: auto; padding: 10px; border-radius: 50000px;">
    <div class="containerColumn" style="background-color: #e3f4f9; border-radius: 10px; border: 1px solid #000000;">
        <h2 style="padding: 15px;">
            <?php echo $titulo; ?>
        </h2>

        <hr style="width: 65%; border-color: #e3f4f9;">

        <h3>
            <?php echo $fecha; ?>
        </h3>

        <hr style="width: 65%; border-color: #e3f4f9;">


        <h3>
            <?php echo $precio; ?>
        </h3>
    </div>
</div>