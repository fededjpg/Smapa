<?php
SESSION_START();
ob_start();
$_SESSION['nombre']='FEDERICO';
$_SESSION['apellido'] = 'PEREZ';

echo "<a href='saludo2.php'>ir a pagina 2</a>"

?>