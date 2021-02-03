<?php
include("conexion.php");
$nombre = $_GET['nombres'];
print_r[$_GET];
print_r[$_POST];
print_r[$_REQUEST];
?>
<input type="text" value="<?php echo $nombre?>">



<?php
/*
include("conexion.php");
$lugar=$_GET['lugar'];
echo $lugar;*/


           /* if (isset($_GET['add'])){
              $lugar=$_GET['nombre'];
              $apellido=$_GET['apellido'];
              echo $lugar;
              echo  $apellido;
            }*/

/*
include("conexion.php");
$lugar=$_GET['lugar'];
 $sql = "SELECT Brigadas, Fecha, Lugar, Folio, Horario FROM brigadas where Lugar ='$lugar' GROUP BY Lugar";
 $result = mysqli_query($conexion, $sql);

 while($ver = mysqli_fetch_row($result)){
         $datos=$ver[2];  
 }
if($lugar == $datos){
    echo 1;
}*/



?>
