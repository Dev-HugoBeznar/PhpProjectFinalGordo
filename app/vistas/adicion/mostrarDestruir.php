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


<div class="containerRow"
    style=" align-items: center; justify-content:space-between; height: 300px; width: 80%; background-color: lightblue; padding: 15px; border: 1px solid #000000; border-radius: 15px;">
    <img src="<?php echo $src; ?>" style=" width: 30%; height: 90%; padding: 10px; border-radius: 20px;">
    <a href="../modificacion/modificacionIndividual.php?id_viaje=<?php echo $id_viaje; ?>" style="width: 50%;">
        <div class="containerColumn"
            style=" padding: 10px; background-color: #e3f4f9; border-radius: 15px; border: 1px solid #000000;">
            <div class="containerRow" style="with: 100%; justify-content: space-around;">
                <h2 style="padding: 5px;">
                    <?php echo $titulo; ?>
                </h2>

                <h3 style="padding: 10px;">
                    <?php echo $fecha; ?>
                </h3>

                <h3 style="padding: 10px;">
                    <?php echo $precio; ?> €
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
    </a>
    <button onclick="window.location.href='../../clases/borrarViaje.php?id_viaje=<?php echo $id_viaje; ?>'"
        class="boton" style="background-color: #FF8787; color: white; cursor: pointer;">
        Eliminar viaje
    </button>
</div>