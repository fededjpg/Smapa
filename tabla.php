<?php
include("conexion.php");

?>
<div class="row">
	<div class="col-sm-12">
		<table class="table table-hover table-condensed table-bordered" id="tablaDinamicaLoad">
        <caption>
			<button class="btn btn-primary" data-toggle="modal" data-target="#modalNuevo">
				Agregar nuevo 
				<span class="glyphicon glyphicon-plus"></span>
			</button>
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

            while($ver = mysqli_fetch_row($result)){

                    $datos=$ver[0]."||".
						   $ver[1]."||".
						   $ver[2]."||".
						   $ver[3]."||".
                           $ver[4];
                        
              
         
            ?>
            <tr>
                <td><?php echo $ver[0]?></td>
                <td><?php echo $ver[1]?></td>
                <td><?php echo $ver[2]?></td>
                <td><?php echo $ver[3]?></td>
                <td><?php echo $ver[4]?></td>
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