<?php
include("conexion.php");

$brigada = $_POST['brigada'];
$fecha = $_POST['fecha'];
$lugar=$_POST['lugar'];
$folio=$_POST['folio'];
$horario=$_POST['horario'];
if(empty($brigada) || empty($fecha) || empty($lugar) || empty($folio) || empty($horario)){
  
}else{
$consulta= "SELECT Brigadas, Fecha, Lugar, Folio, Horario FROM $table1 WHERE folio = '"+$folio+"'";
$resultado = $conexion->query($consulta);

$fila = mysqli_num_rows($resultado);
if($fila==0){
  $query = "INSERT INTO $table1 (Brigadas, Fecha, Lugar, Folio, Horario)
            VALUES ('$brigada', '$fecha','$lugar','$folio','$horario')";
  #echo  $result=mysqli_query($conexion,$query);
  $insert= $conexion->query($query) or die(mysqli_errno());
echo 1;

}
}





// if ($brigada =="" || $fecha =="" || $lugar ==""|| $folio=="" || $horario==""){
//   echo 1;
// }

// else{
//   echo 3;
// }

/*if($brigada =="" || $fecha =="" || $lugar ==""|| $folio=="" || $horario==""){
     echo 1;
}
else{

      $consulta= "SELECT Brigadas, Fecha, Lugar, Folio, Horario FROM $table1 WHERE folio = '"+$folio+"'";
      $resultado = $conexion->query($consulta);
      $fila = mysqli_num_rows($resultado);


if($fila==0){
        $query = "INSERT INTO $table1 (Brigadas, Fecha, Lugar, Folio, Horario)
                  VALUES ('$brigada', '$fecha','$lugar','$folio','$horario')";
        #echo  $result=mysqli_query($conexion,$query);
        $insert= $conexion->query($query) or die(mysqli_errno());
echo 3;

}
else{
  echo 2
}

}*/



/*
if($brigada =="" || $fecha =="" || $lugar ==""|| $folio=="" || $horario==""){
  echo 2;
}else{

 $query = "INSERT INTO $table1 (Brigadas, Fecha, Lugar, Folio, Horario)
          VALUES ('$brigada', '$fecha','$lugar','$folio','$horario')";
        echo  $result=mysqli_query($conexion,$query);
}

*/
?>