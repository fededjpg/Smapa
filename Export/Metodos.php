<?php 
	class Metodos{

		public function obtenerBrigadas(){
			$database = new Database();
			$objConexion = $database->conexion();
			$sql= "SELECT Brigadas, Fecha, Lugar, Folio, Horario FROM brigadas";
			$result = $objConexion->query($sql);
			$array_datos = array();

			while($row = $result->fetch(PDO::FETCH_ASSOC)){
				$array_datos[] = $row;
			}

			return $array_datos;
		}

	}
?>
