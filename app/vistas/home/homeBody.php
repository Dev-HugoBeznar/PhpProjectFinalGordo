<?php include '../assets/estilos/generalCss.php' ?>

<body>
    <style>
        .insideGridhome {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: lightblue;
            padding: 20px;
            width: 430px;
            height: 300px;
        }
    </style>



    <div style="background-image: url('../assets/imagenes/beznar.jpg'); width: 100%; height: 100%;"
        class="containerColumn">
        <h2 style="text-align: center; color: white; font-size: 50;">Viaja con nosotros</h2>
        <p style="text-align: center; color: white; padding:80px; font-size: 20;">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
            laborum.</p>
    </div>

    <div class="containerColumn" style="justify-content: center;  padding: 100px">
        <div style="background-color: #FF8787;">
            <h2 style="text-align: center; color: white; font-size: 50;">porque viajar con nosotros</h2>
            <div class="containerRow" style="padding: 25px">
                <p style="text-align: center; color: white; padding:50px; font-size: 20;">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat.
                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                    pariatur.
                    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id
                    est laborum.</p>
                <img src="../assets/imagenes/casaAleatoria.png" style="width: 400px; height: 300px; padding: 10px;">
            </div>
        </div>
    </div>

    <div class="gridhome">
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
            <a class="insideGridhome" href="./modificacion/modificacionIndividual.php?id_viaje=<?php echo $id_viaje; ?>">
                <?php include 'gridHome.php'; ?>
            </a>

            <?php
        }
        ?>
    </div>



</body>