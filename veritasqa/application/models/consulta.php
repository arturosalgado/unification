<?php
  class Consulta extends CI_Model{
    function __construct()
    {
        parent::__construct();
    }
    
    function getCapturas($id){
        $query = $this->db->query("SELECT * FROM captura WHERE idndp = $id");
        return $query->result_array();
    }
	
	function getFilteredCapturas($id, $inicio, $fin){
		$query = $this->db->query("SELECT * FROM captura WHERE idndp = $id AND fecha > '$inicio' AND fecha < '$fin'");
		return $query->result_array();
	}
	
	function getDatos($idCaptura){
		$query = $this->db->query("SELECT * FROM captura_feature WHERE idcaptura = $idCaptura");
        return $query->result_array();
	}

    function getUsuario($idusuario){
        $query = $this->db->query("SELECT * FROM usuario WHERE idusuario = $idusuario");
        $result = $query->result_array();
        return $result[0];  
    }
	
	function getFeatCount($id){
		$query = $this->db->query("SELECT COUNT(idndp_feature) as count FROM ndp_feature WHERE id_ndp = $id");
        $result = $query->result_array();
		return $result[0]['count'];
	}
    
    function saveUsuario($data){
       $username = $data['username'];
       $passwd = $data['passwd'];
       $nombre = $data['nombre'];
       $apellidos = $data['apellidos'];
       $rol = $data['rol'];
       $mail = $data['mail'];
       $query = $this->db->query("INSERT INTO usuario(username, passwd, nombre, apellidos, rol, mail) VALUES ('$username', '$passwd', '$nombre', '$apellidos', '$rol', '$mail')");
       return $query;
    }
    
    function update($data){
       $idusuario = $data['idusuario'];
       $username = $data['username'];
       $passwd = $data['passwd'];
       $nombre = $data['nombre']; 
       $apellidos = $data['apellidos'];
       $rol = $data['rol'];
       $mail = $data['mail'];
       if($passwd != "")
        $query = $this->db->query("UPDATE `usuario` SET  `username` = '$username', `passwd` = '$passwd', `nombre` = '$nombre', `apellidos` = '$apellidos', `rol` = '$rol', `mail` = '$mail' WHERE idusuario = $idusuario");
       else
        $query = $this->db->query("UPDATE usuario SET  `username` = '$username', `nombre` = '$nombre', `apellidos` = '$apellidos', `rol` = '$rol', `mail` = '$mail' WHERE idusuario = $idusuario");
       return $query;
    }
    
    
  }
?>
