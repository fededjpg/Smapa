<?php
include("conexion.php");

$brigada = $_POST['brigada'];
$fecha = $_POST['fecha'];
$lugar = $_POST['lugar'];
$folio = $_POST['folio'];
$horario = $_POST['horario'];
if(empty($brigada) || empty($fecha) || empty($lugar) || empty($folio) || empty($horario)){
    echo 2;
}else{


$sql = "UPDATE $table1 SET Brigadas = '$brigada',
                        Fecha = '$fecha', 
                        Lugar = '$lugar', 
                        Horario= '$horario'
                        WHERE Folio= '$folio'";
                $resultado = mysqli_query($conexion,$sql);
                if($resultado == 1){
                    echo 1;
                }
            }
                
?>