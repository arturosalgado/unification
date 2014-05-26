<?php
class Ndp extends CI_Model{
	function getNdps(){
		$query = $this->db->query("SELECT * FROM ndp");
		$result = $query->result_array();
        return $result;		
	}
	
	function getNdp($id){
		$query = $this->db->query("SELECT * FROM linea WHERE idlinea = $id");
		$result = $query->result_array();
        return $result[0];		
	}
	
	function saveNdp($data){
		$nombre = $data['nombre'];
		$descripcion = $data['descripcion'];
		$imagen = $data['file']['name'];
		$this->db->query("INSERT INTO ndp (nombre, descripcion, imagen) VALUES ('$nombre', '$descripcion', '$imagen')");
	}
}

?>