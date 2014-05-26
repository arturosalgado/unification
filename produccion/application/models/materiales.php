<?php
class Materiales extends CI_Model{
	//obtiene los materiales de una linea dada
	function getCapturados($idlinea){
		$result = $this->db->query("SELECT * FROM captura_error WHERE idlinea = '$idlinea' AND recaptura = 0");
		return $result->result_array();
	}
	
	function getCapturadosCaptura($idCaptura){
		$result = $this->db->query("SELECT * FROM captura_error WHERE idcaptura = '$idCaptura' AND recaptura = 0");
		return $result->result_array();
	}
}
?>