<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "viajes_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);

}

$buscar = $_POST['buscar'];

$buscar = "%" . $buscar . "%";


$stmt = $conn->prepare("SELECT * FROM viajes WHERE titulo like ?");
$stmt->bind_param("s", $buscar);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows > 0) {

    while ($viaje = $result->fetch_assoc()) {
        echo $viaje["titulo"] . "<br>";
        echo $viaje["id_viaje"] . "<br>";
    }

} else {
    echo "Viaje no encontrado";
}

$src = "";

if (!empty($imagen)) {
    if (filter_var($imagen, FILTER_VALIDATE_URL)) {
        $src = $imagen;
    } else {
        $src = "../assets/imagenes/" . $imagen;
    }
}

$stmt->close();

?>