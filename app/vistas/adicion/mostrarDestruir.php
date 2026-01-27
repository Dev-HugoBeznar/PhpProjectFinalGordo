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

    $titulo = $viaje["titulo"];
    $fecha = $viaje["fecha_inicio"];
    $precio = $viaje["precio"];
    $imagen = $viaje["imagen"];
    $descripcion = $viaje["descripcion"];
    $tipo = $viaje["tipo_de_viaje"];
} else {
    echo "Viaje no encontrado";
}

$src = "";

if (!empty($imagen)) {
    if (filter_var($imagen, FILTER_VALIDATE_URL)) {
        $src = $imagen;
    } else {
        $src = "../../assets/imagenes/" . $imagen;
    }
}

$stmt->close();
?>


<div class="containerRow" style=" align-items: center; justify-content:space-between; height: 300px;">
    <img src="<?php echo $src; ?>" style=" width: 20%; height: auto; padding: 10px;">
    <div class="containerColumn"
        style=" padding: 10px; background-color: #e3f4f9; width: 60%; border-radius: 15px; border: 1px solid #000000;">
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

        <hr style="width: 90%; border-color: #e3f4f9;">

        <div class="containerRow">
            <p style="padding: 20px; width: 65%;"><?php echo $descripcion; ?></p>
            <p style="padding: 20px;">
                <?php echo $tipo; ?>
            </p>
        </div>
    </div>
    <hi>futuro borrar</hi>
</div>