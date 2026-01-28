<body>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "viajes_db";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Comprobar conexión
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT id_viaje FROM viajes";
    $resultado = $conn->query($sql);

    while ($fila = $resultado->fetch_assoc()) {
        $id_viaje = $fila['id_viaje'];
        ?>
        <div class="containerColumnCenter">

            <?php include 'mostrarDestruir.php'; ?>

        </div>

        <!--
        esto es para que exista un pequño espacio entre cada viaje
        -->
        <div style="height: 10px;"></div>
        <?php
    }
    ?>

    <div class="containerColumnCenter">
        <div style="height: 40px;"></div>
        <a href="../adicion/adicionFormulario.php" class="boton" style="width: 50%;  padding: 18px;">+ + + + Agregar
            nuevo
            viaje + + + +</a>

    </div>
</body>