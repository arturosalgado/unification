<?php
class Error extends CI_Model{
	function __construct()
    {
        parent::__construct();
    }
    
    function getErrores(){
		$query = $this->db->query("SELECT * FROM error");
        return $query->result_array();
	}
	
	function getError($id){
		$query = $this->db->query("SELECT * FROM error WHERE iderror = $id");
		$array = $query->result_array();
        return $array[0];
	}
	
	function saveError($data){
		$codigo = $data['codigo'];
		$descripcion = $data['descripcion'];
		$query = $this->db->query("INSERT INTO error (codigo, descripcion) VALUES ($codigo, '$descripcion')");
	}
		
	function update($data){
		$codigo = $data['codigo'];
		$descripcion = $data['descripcion'];
		$id = $data['iderror'];
		$query = $this->db->query("UPDATE error SET `codigo` = '$codigo', `descripcion` = '$descripcion' WHERE iderror = $id");
	}
}
?>