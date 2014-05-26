<?php
	class Produccion extends CI_Model{
		function getProducciones(){
			$query = $this->db->query("SELECT idproduccion, linea.nombre as linea, responsable1, fecha, linea.piezas from produccion left join linea on produccion.idlinea = linea.idlinea");
			return $query->result_array();			
		}
		
		function getProduccion($id){
			$query = $this->db->query("SELECT idproduccion, linea.nombre as linea, responsable1, responsable2, responsable3, fecha, linea.piezas, linea.idlinea as idlinea, produccion.idturno  from produccion left join linea on produccion.idlinea = linea.idlinea WHERE idproduccion = $id");
			$result = $query->result_array();			
			return $result[0];
		}
		
		function getNonCaptuded(){
			$query = $this->db->query("SELECT idproduccion, produccion.idturno as idturno, linea.nombre as linea, responsable1, fecha, linea.piezas from produccion left join linea on produccion.idlinea = linea.idlinea WHERE capturado = 0");
			return $query->result_array();			
		}
		
		function getCapturados(){
			//eliminando a los que tienen mas de una semana
			$ttime = strtotime("-1 week");
			$date = date("Y-m-d", $ttime);
			$query = $this->db->query("SELECT idproduccion, linea.nombre as linea, responsable1, fecha, linea.piezas from produccion left join linea on produccion.idlinea = linea.idlinea WHERE capturado = 1 and fecha > '$date' ORDER BY fecha DESC");
			return $query->result_array();
		}
		
		function saveNew($data){
			//var_dump($data);
			date_default_timezone_set('America/Mexico_City');
			$hora = date("G");
			$curmins = $hora * 60;
			$mins = date("i");
			$curmins += $mins; 
			$nombrelinea = $data['linea'];
			//getting the id of the line
			$result = $this->db->query("SELECT idlinea FROM linea WHERE nombre = '$nombrelinea'");
			$rarray = $result->result_array();
			$idlinea = $rarray[0]['idlinea'];
			//getting the active turn id (this system must not have a whole day turn
			$queryTurnos = $this->db->query("SELECT * FROM turno");
			$idTurnos = array();
			$i = 0;
			if($queryTurnos->num_rows() > 0){
				foreach($queryTurnos->result_array() as $row){
					list($inicioh, $iniciom) = explode(":", $row['inicio'], 2);
					list($finh, $finm) = explode(":", $row['fin'], 2);
					$inicio = $inicioh*60 + $iniciom;
					$fin = $finh*60 + $finm;
					if($fin > $inicio && ($curmins > $inicio && $curmins < $fin)){
						$idTurnos[$i] = $row['idturno'];
						$i++;
					}else if($fin < $inicio && ($curmins > $inicio || $curmins < $fin)){
						$idTurnos[$i] = $row['idturno'];
						$i++;
					}
				}
			}
			$idturno = $idTurnos[0];
			
			//splitting the resposibles
			$numControl = explode(",", $data['responsable'], 4);
			$numControl1 = isset($numControl[0])?$numControl[0]:0;
			$numControl2 = isset($numControl[1])?$numControl[1]:0;
			$numControl3 = isset($numControl[2])?$numControl[2]:0;
			$numControl4 = isset($numControl[3])?$numControl[3]:0;
			//today
			$fecha = date("Y-m-d");
									
			//saving data into the database
			$query = $this->db->query("INSERT INTO produccion (idlinea, idturno, responsable1, responsable2, responsable3, responsable4, fecha) VALUES($idlinea, $idturno, $numControl1, $numControl2, $numControl3, $numControl4, '$fecha')");
			

		}
		
		function update($data){
			var_dump($data);
			date_default_timezone_set('America/Mexico_City');
			$hora = date("G");
			$curmins = $hora * 60;
			$mins = date("i");
			$curmins += $mins; 
			$nombrelinea = $data['linea'];
			$idproduccion = $data['id'];
			//getting the id of the line
			$result = $this->db->query("SELECT idlinea FROM linea WHERE nombre = '$nombrelinea'");
			$rarray = $result->result_array();
			if(count($rarray) <= 0){
				redirect('producciones');
			}
			$idlinea = $rarray[0]['idlinea'];
			//getting the active turn id (this system must not have a whole day turn
			
			//splitting the resposibles
			$numControl = explode(",", $data['responsable'], 4);
			$numControl1 = isset($numControl[0])?$numControl[0]:0;
			$numControl2 = isset($numControl[1])?$numControl[1]:0;
			$numControl3 = isset($numControl[2])?$numControl[2]:0;
			$numControl4 = isset($numControl[3])?$numControl[3]:0;
			//today
			$fecha = date("Y-m-d");
									
			//saving data into the database
			$query = $this->db->query("UPDATE produccion SET idlinea = $idlinea,  responsable1= $numControl1, responsable2 = $numControl2, responsable3 = $numControl4, responsable4 = $numControl4 WHERE idproduccion = $idproduccion");
			

		}
		
		function setPiezas($idproduccion, $piezas){
			//if($piezas > 0)
				//$this->db->query("UPDATE piezas SET ")
		}
}
?>