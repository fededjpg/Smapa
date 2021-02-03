
<?php 
	require_once "conexion.php";
	$Folio=$_POST['Folio'];

	$sql="DELETE from brigadas where Folio ='$Folio'";
	echo $result=mysqli_query($conexion,$sql);
 ?>