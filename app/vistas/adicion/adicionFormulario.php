<?php include '../../assets/estilos/generalCss.php' ?>


<?php include '../adicion/adicionHeather.php' ?>


<body class="containerColumnCenter">
    <h1>Formulario de Adición</h1>
    <form action="./insertDB.php?id_viaje=<?php echo $id_viaje; ?>" method="post" enctype="multipart/form-data"
        class="menuModificacion">

        <label class="labelTipos">Título:</label>
        <input type="text" class="formTextFormat" name="titulo" value="titulo" required><br>

        <label class="labelTipos">Descripción:</label>
        <textarea class="formTextFormat" name="descripcion" required>descripcion</textarea><br>

        <label class="labelTipos">Fecha de inicio:</label>
        <input type="date" class="formTextFormat" name="fecha_inicio" value="" required><br>

        <label class="labelTipos">Fecha de fin:</label>
        <input type="date" class="formTextFormat" name="fecha_fin" value="" required><br>

        <label class="labelTipos">Precio:</label>
        <input type="number" class="formTextFormat" name="precio" value="0.00" required><br>

        <label class="labelTipos">Destacado (1 para sí, 0 para no):</label>
        <input type="number" class="formTextFormat" name="destacado" value="0" required><br>

        <label class="labelTipos">Tipo de viaje:</label>
        <input type="text" class="formTextFormat" name="tipo_de_viaje" value="tipo" required><br>

        <!-- en las que estan por defecto se usan archivos ya en el proyecto,
         hay que cambiar para que se adapte a tambien url -->
        <label class="labelTipos">Imagen url:</label>
        <textarea class="formTextFormat" name="imagen" required></textarea><br>


        <input type="submit" value="Añadir Viaje" class="boton" style="margin-top: 20px;">
    </form>
</body>

<?php include '../adicion/adicionFooter.php' ?>