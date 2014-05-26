<?php
class Turno extends CI_Model{
	function __construct()
    {
        parent::__construct();
    }
    
    function getTurnos(){
		$query = $this->db->query("SELECT * FROM turno");
        return $query->result_array();
	}
	
	function getTurno($id){
		$query = $this->db->query("SELECT * FROM turno WHERE idturno = $id");
		$array = $query->result_array();
        return $array[0];
	}
	
	function saveTurno($data){
		$nombre = $data['nombre'];
		$inicio = $data['inicio'];
		$fin = $data['fin'];
		$query = $this->db->query("INSERT INTO turno (`nombre`, `inicio`, `fin`) VALUES ('$nombre', '$inicio', '$fin')");
	}
	
	function update($data){
		$nombre = $data['nombre'];
		$inicio = $data['inicio'];
		$fin = $data['fin'];
		$id = $data['idturno'];
		$query = $this->db->query("UPDATE turno SET `nombre` = '$nombre', `inicio` = '$inicio', `fin` = '$fin' WHERE idturno = $id");
	}
	
	function getCurrent(){
		date_default_timezone_set('America/Mexico_City'); 
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
					$i++;
				}else if($fin < $inicio && ($curmins > $inicio || $curmins < $fin)){
					$idTurnos[$i] = $row['idturno'];
					$i++;
				}
			}
		}
	return isset($idTurnos[0])?$idTurnos[0]:-1;	
	}
}
?>