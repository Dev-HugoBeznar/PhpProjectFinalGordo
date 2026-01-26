<body>
    <h1>Formulario de Adición</h1>
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
</body>