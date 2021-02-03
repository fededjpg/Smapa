<?php
SESSION_START();
ob_start();

$nom=$_SESSION['nombre'];
$ape=$_SESSION['apellido'];


echo "variable de session: <br>";
echo "el nombre es: $nom <br> El apellido es: $ape <br>";
?>