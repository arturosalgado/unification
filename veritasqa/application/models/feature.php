<?php
class Feature extends CI_Model{
	function getFeatures($id){
		$query = $this->db->query("SELECT * FROM ndp_feature WHERE id_ndp = $id");
		$result = $query->result_array();
        return $result;  
	}
	
	function getFeature($id){
		$query = $this->db->query("SELECT * FROM ndp_feature WHERE idndp_feature = $id");
		$result = $query->result_array();
        return $result[0];
	}
	
	function saveNew($data){
		$nombre = $data['nombre'];
		$codigo = $data['codigo'];
		$udm = $data['udm'];
		$media = $data['media'];
		$tolerancia = $data['tolerancia'];
		$id = $data['id'];
		$this->db->query("INSERT INTO ndp_feature (nombre, codigo, udm, media, tolerancia, id_ndp) VALUES ('$nombre','$codigo','$udm',$media,$tolerancia,$id)");
}
	function update($data){
		$nombre = $data['nombre'];
		$codigo = $data['codigo'];
		$udm = $data['udm'];
		$media = $data['media'];
		$tolerancia = $data['tolerancia'];
		$id = $data['id'];
		$this->db->query("UPDATE ndp_feature SET nombre = '$nombre', codigo='$codigo', udm='$udm', media=$media, tolerancia=$tolerancia WHERE idndp_feature = $id");
	}
}
?>