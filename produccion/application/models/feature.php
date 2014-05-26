<?php
class Feature extends CI_Model{
	function getFeatures($id){
		$query = $this->db->query("SELECT * FROM ndp_feature WHERE id_ndp = $id");
		$result = $query->result_array();
        return $result;  
	}
	
	function saveNew($data){
		$nombre = $data['nombre'];
		$codigo = $data['codigo'];
		$udm = $data['udm'];
		$minimo = $data['minimo'];
		$maximo = $data['maximo'];
		$id = $data['id'];
		$this->db->query("INSERT INTO ndp_feature (nombre, codigo, udm, minimo, maximo, id_ndp) VALUES ('$nombre','$codigo','$udm',$minimo,$maximo,$id)");
}
}
?>