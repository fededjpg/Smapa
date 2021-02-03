<?php
include "conexion.php";
session_start();
?>
<div class="row">
	<div class="col-sm-12">
		<table class="table table-hover table-condensed table-bordered" id="tablaDinamicaLoad">
            <caption>
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalNuevo">
                    Agregar nuevo
                    <span class="glyphicon glyphicon-plus"></span>
                </button>
                <form action="Import/import.php" method="post" enctype="multipart/form-data">
				<label for="file">Seleccionar Archivo Excel</label>
				<input type="file" name="file" class="form-control"  accept=".xls,.xlsx" required>
				<button type="submit" name="import" class="btn btn-primary">Importar
                <span class="glyphicon glyphicon-upload"></span>
                </button>
                </form>
    <form action="Export/export.php" method="post">       
    <button class="btn btn-success">
    Exportar Datos
    <span class="glyphicon glyphicon-download" ></span>
    </button>
    </form>
            </caption>
            <thead>
                <tr>
				<th>Brigadas</th>
				<th>Fecha</th>
				<th>Lugar</th>
				<th>Folio</th>
				<th>Horario</th>
                <th>Acciones</th>

			</tr>
			</thead>
            <tbody>
            <?php
$sql = "SELECT Brigadas, Fecha, Lugar, Folio, Horario FROM brigadas";
$result = mysqli_query($conexion, $sql);

while ($ver = mysqli_fetch_row($result)) {
    session_start();
    ob_start();
    $nombre = $_SESSION['map'] = $ver[2];
    $datos = $ver[0] . "||" .
        $ver[1] . "||" .
        $ver[2] . "||" .
        $ver[3] . "||" .
        $ver[4];

    ?>
            <tr>
                <td><?php echo $ver[0] ?></td>
                <td><?php echo $ver[1] ?></td>
                <td id="lugar"><?php echo $ver[2] ?></td>
                <td><?php echo $ver[3] ?></td>
                <td><?php echo $ver[4] ?></td>
                <td>

                <!--BOTON ELIMINAR-->
                <a href="#">                        <!--remove-->
                <i class="text-danger glyphicon glyphicon-trash "
                onclick="preguntarSiNo('<?php echo $ver[3] ?>')">Eliminar</i></a>

                <!--BOTON EDITAR-->
                <a href="#">
                <i onclick="agregarform('<?php echo $datos ?>')" class="text-warning glyphicon glyphicon-pencil"
                data-toggle="modal" data-target="#modalEdicion">Editar</i></a>

                <!--<a href="php/mapa.php" onclick="mapear(' echo $ver[2]?>')" class="btn btn-primary glyphicon glyphicon-map-marker mapeo"></a>-->
                <!--<button  onclick="mapear('php echo $ver[2]?>')" class="btn btn-primary glyphicon glyphicon-map-marker" id="map"></button>-->
                <!--<a href="javascript:mapear('php/mapa.php', 'php echo $ver[2]?>')">Pulseaqu&iacute;</a> -->
<!--               <a href="php/mapa.php"><button class="btn btn-primary glyphicon glyphicon-map-marker" id="map"></button></a>-->

                <!--BOTON MAPEAR-->
              <a href="php/mapa.php?nombres=<?php echo $nombre ?>"><i  class="text-primary glyphicon glyphicon-map-marker" id="map">Localizar</i></a>
                </td>

            </tr>
            <?php

}

?>
            </tbody>
        </table>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaDinamicaLoad').DataTable();
});

</script>