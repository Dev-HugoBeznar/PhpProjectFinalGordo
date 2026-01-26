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
    $descripcion = $viaje["descripcion"];
    $tipo = $viaje["tipo_de_viaje"];
} else {
    echo "Viaje no encontrado";
}

$stmt->close();
?>


<div class="containerRow" style=" align-items: center; justify-content:space-between;">
    <img src="../../assets/imagenes/<?php echo $imagen; ?>" style=" width: 20%; height: auto; padding: 10px;">
    <div class="containerColumn" style=" padding: 10px;">
        <div class="containerRow" style="with: 100%; justify-content: space-around;">
            <h2 style="padding: 5px;">
                <?php echo $titulo; ?>
            </h2>

            <h3 style="padding: 10px;">
                <?php echo $fecha; ?>
            </h3>

            <h3 style="padding: 10px;">
                <?php echo $precio; ?>
            </h3>
        </div>
        <div class="containerRow">
            <p style="padding: 20px;"><?php echo $descripcion; ?></p>
            <p style="padding: 20px;">
                <?php echo $tipo; ?>
            </p>
        </div>
    </div>
    <hi>boton</hi>
</div>