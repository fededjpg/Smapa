<?php
session_start();

if(isset($_SESSION['user'])){
}
else{
    return header("Location:index.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="shortcut icon" href="img/Saneamiento.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/alertify.css">
	<link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/themes/default.css">
  <link rel="stylesheet" type="text/css" href="librerias/select2/css/select2.css">
  <link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="librerias/DataTables/css/dataTables.bootstrap.min.css">


  <!-- <meta name="theme-color" content="#FFF">
  <meta name="MobileOptimized" content="width">
  <meta name="HandheldFriendly" content="true">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

  <link rel="apple-touch-icon" href="./img/Saneamiento.png">
  <link rel="apple-touch-startup-image" href="./img/Saneamiento.png">

  <link rel="manifest" href="./manifest.json"> -->



	<script src="librerias/jquery-3.2.1.min.js"></script>
    <script src="js/funciones.js"></script>
	<script src="librerias/bootstrap/js/bootstrap.js"></script>
	<script src="librerias/alertifyjs/alertify.js"></script>
  <script src="librerias/select2/js/select2.js"></script>
  <script src="librerias/DataTables/js/jquery.dataTables.min.js"></script>
  <script src="librerias/DataTables/js/dataTables.bootstrap.min.js"></script>


</head>
<style>
  .logout{
    display:inline-block;
    float:right;
  }
</style>
<body>
  
  <a href="php/destroySession.php" class="glyphicon glyphicon-log-out btn btn-danger logout">Salir</a>
  <br><br>
<div class="container">
    <div id="buscador"></div>
		<div id="tabla"></div>
	</div>

  <!-- Modal para registros nuevos -->


<div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Agrega Nuevo Dato</h4>
      </div>
      <div class="modal-body">
        	<label>Brigadas</label>
        	<input type="text" name="brigada" id="brigada" class="form-control input-sm" required autofocus>
        	<label>Fecha</label>
        	<input type="date" name="fecha" id="fecha" class="form-control input-sm" required autofocus>
        	<label>Lugar</label>
          <input type="text" name="brigada" id="lugares" class="form-control input-sm" required autofocus>
        	<label>Folio</label>
        	<input type="number" name="folio" id="folio" class="form-control input-sm" required autofocus pattern="[0-9]">
          <label>Horario</label>
        	<input type="text" name="horario" id="horario" class="form-control input-sm" required autofocus>
      </div>
      <div class="modal-footer">
       <button type="button" class="btn btn-secondary" data-dismiss="modal">cerrar</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="guardarnuevo">
        Agregar
        </button>
       
      </div>
    </div>
  </div>
</div>


<!-- Modal para edicion de datos -->

<div class="modal fade" id="modalEdicion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Actualizar datos</h4>
      </div>
      <div class="modal-body">
       <!-- <input type="text" hidden="false" id="folio2" name="folio">-->
          <label>Brigadas</label>
        	<input type="text" name="brigada" id="brigada2" class="form-control input-sm" required autofocus>
        	<label>Fecha</label>
        	<input type="date" name="fecha" id="fecha2" class="form-control input-sm" required autofocus>
        	<label>Lugar</label>
        	<input type="text" name="lugar" id="lugar2" class="form-control input-sm" required autofocus>
        	<label>Folio</label>
        	<input type="text" name="folio" id="folio2" class="form-control input-sm" readonly="readonly" >
          <label>Horario</label>
        	<input type="text" name="horario" id="horario2" class="form-control input-sm" required autofocus>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">cerrar</button>
        <button type="button" class="btn btn-warning" id="actualizadatos" data-dismiss="modal">Actualizar</button>
        
      </div>
    </div>
  </div>
</div>


</body>
<!-- <script src="script.js"></script> -->

</html>

<script type="text/javascript">
	$(document).ready(function(){
		$('#tabla').load('componentes/tabla.php');
    //$('#buscador').load('componentes/buscador.php');
  
	});
</script>

<script>

$(document).ready(function(){
 /* $("a.mapeo").click(function() {
      url = $(this).attr("href");
      window.open(url, '_blank');
      return false;
   });*/

    $('#guardarnuevo').click(function(){
      brigada = $('#brigada').val();
      fecha=$('#fecha').val();
      lugar = $('#lugares').val();
      folio=$('#folio').val();
      horario=$('#horario').val();
      agregardatos(brigada, fecha, lugar, folio, horario);
      console.log(brigada, fecha, lugar, folio, horario);
    })


$('#actualizadatos').click(function(){
    actualizarDatos();
  });

});

</script>
<!--  
<script type="text/javascript">
$(document).ready(function(){
  $('#guardarnuevo').click(function(){
    brigada=$('#brigada').val();
    fecha=$('#fecha').val();
    lugar=$('#lugar').val();
    folio=$('#folio').val();
    horario=$('#horario').val();
    agregardatos(brigada, fecha, lugar, folio, horario);
  });
})
</script>-->