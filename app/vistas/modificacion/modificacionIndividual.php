<?php include '..\..\assets\estilos\generalCss.php' ?>

<html>

<head>
    <meta charset="UTF-8">

</head>

<style>
    .labelTipos {
        color: black;
        font-size: 20px;
        font-family: Arial, sans-serif;
    }

    .menuModificacion {
        background-color: lightblue;
        border: 1px solid #646464;
        border-radius: 10px;
        color: black;
        display: flex;
        align-items: center;
        flex-direction: column;
        padding: 90px;
    }
</style>


<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "viajes_db";

$id_viaje = $_GET['id_viaje'];

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
    $descripcion = $viaje["descripcion"];
    $fechaIni = $viaje["fecha_inicio"];
    $fechaFin = $viaje["fecha_fin"];
    $precio = $viaje["precio"];
    $destacado = $viaje["destacado"];
    $tipo = $viaje["tipo_de_viaje"];
    $imagen = $viaje["imagen"];
} else {
    echo "Viaje no encontrado";
}

$stmt->close();
?>


<?php include './modificacionHeather.php' ?>


<div class="containerColumnCenter" style="padding: 50px;">
    <h2 style="font-size: 30px; color: white; font-family: Arial, sans-serif;">Modifica el viaje seleccionado</h2>


    <form action="./insertDB.php?id_viaje=<?php echo $id_viaje; ?>" method="post" enctype="multipart/form-data"
        class="menuModificacion">

        <label class="labelTipos">Título:</label>
        <input type="text" class="formTextFormat" name="titulo" value="<?php echo trim($titulo); ?>" required><br>

        <label class="labelTipos">Descripción:</label>
        <textarea class="formTextFormat" name="descripcion" required><?php echo trim($descripcion); ?></textarea><br>

        <label class="labelTipos">Fecha de inicio:</label>
        <input type="date" class="formTextFormat" name="fecha_inicio" value="<?php echo trim($fechaIni); ?>"
            required><br>

        <label class="labelTipos">Fecha de fin:</label>
        <input type="date" class="formTextFormat" name="fecha_fin" value="<?php echo trim($fechaFin); ?>" required><br>

        <label class="labelTipos">Precio:</label>
        <input type="number" class="formTextFormat" name="precio" value="<?php echo trim($precio); ?>" required><br>

        <label class="labelTipos">Destacado (1 para sí, 0 para no):</label>
        <input type="number" class="formTextFormat" name="destacado" value="<?php echo trim($destacado); ?>"
            required><br>

        <label class="labelTipos">Tipo de viaje:</label>
        <input type="text" class="formTextFormat" name="tipo_de_viaje" value="<?php echo trim($tipo); ?>" required><br>


        <input type="submit" value="Modificar Viaje" class="boton" style="margin-top: 20px;">
    </form>


</div>



<?php include './modificacionFooter.php' ?>

</html>