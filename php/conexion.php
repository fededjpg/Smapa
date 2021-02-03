<?php
/**
 * dato de nuestro localhost
 */
$host = "localhost";
$userdb= "root";
$pass="";
$database = "registros";
/**
 * nombre de nuestra tabla de la base de datos...
 */
$table1= "brigadas";

error_reporting(0);
/**
 * iniciamos la conexion a la base de datos
 */
$conexion = mysqli_connect($host, $userdb, $pass, $database);

/**
 * si la base de datos no se logra conectar tendremos este error
 */

if($conexion->connect_errno){

    echo "Error en la conexion";
}



?>