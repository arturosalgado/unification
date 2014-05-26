<?php
class Ndp extends CI_Model{
	function getNdps(){
		$query = $this->db->query("SELECT * FROM ndp");
		$result = $query->result_array();
        return $result;		
	}
	
	function getOrderedNdps(){
		$query = $this->db->query("SELECT * FROM ndp ORDER BY cliente");
		$result = $query->result_array();
        return $result;	
	}
	
	function getNdp($id){
		$query = $this->db->query("SELECT * FROM ndp WHERE idndp = $id");
		$result = $query->result_array();
        return $result[0];		
	}
	

	
	function saveNdp($data){
		$nombre = $data['nombre'];
		$descripcion = $data['descripcion'];
		$imagen = $data['file']['name'];
		$inicio = "0000-00-00";
		$fin = "0000-00-00";
		$idturno = $data['idturno'];
		$cliente = $data['cliente'];
		$this->db->query("INSERT INTO ndp (nombre, descripcion, imagen, inicio, fin, idturno, cliente) VALUES ('$nombre', '$descripcion', '$imagen', '$inicio', '$fin', '$idturno', '$cliente')");
	}
	
	function update($data){
		$nombre = $data['nombre'];
		$descripcion = $data['descripcion'];
		$id = $data['idndp'];
		$idturno = $data['idturno'];
		$cliente = $data['cliente'];
		var_dump($data);
		$this->db->query("UPDATE ndp SET nombre = '$nombre', descripcion = '$descripcion',  idturno = '$idturno', cliente = '$cliente' WHERE idndp = $id");
	}
	
	function updateImg($data){
		echo "<pre>";
		print_r($data);
		echo "</pre>";
		$idndp = $data['idndp'];
		$imagen = $data['file']['name'];
		$this->db->query("UPDATE ndp SET imagen = '$imagen' WHERE idndp = $idndp");
	}
	
	function getActivos(){
		date_default_timezone_set('America/Mexico_City'); 
		$query = $this->db->query("SELECT * FROM ndp");
		//leyendo en que turno estamos
		$hora = date("G");
		$curmins = $hora * 60;
		$mins = date("i");
		$curmins += $mins; 
		$idTurnos = array();
		$i = 0;
		$queryTurnos = $this->db->query("SELECT * FROM turno");
		if($queryTurnos->num_rows() > 0){
			foreach($queryTurnos->result_array() as $row){
				list($inicioh, $iniciom) = explode(":", $row['inicio'], 2);
				list($finh, $finm) = explode(":", $row['fin'], 2);
				$inicio = $inicioh*60 + $iniciom;
				$fin = $finh*60 + $finm;
				if($fin > $inicio && ($curmins > $inicio && $curmins < $fin)){
					$idTurnos[$i] = $row['idturno'];
				}else if($fin < $inicio && ($curmins > $inicio || $curmins < $fin)){
					$idTurnos[$i] = $row['idturno'];
				}
			}
		}
		
		$i = 0;
		$whereStmt = "WHERE ";
		foreach($idTurnos as $idt){
			if($i == 0)
				$whereStmt .= "idturno = ".$idt;
			else
				$whereStmt .= "OR idturno = ".$idt;
		}
		
		//generando la lista de ndp activos
		$query = $this->db->query("SELECT * FROM ndp ".$whereStmt);
		$result = $query->result_array();
		
        return $result;
	}
}
?>