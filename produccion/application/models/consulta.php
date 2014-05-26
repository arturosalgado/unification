<?php
  class Consulta extends CI_Model{
    function __construct()
    {
        parent::__construct();
    }
    
    function getConsultas(){
        $query = $this->db->query("SELECT c.idconsulta as idconsulta, d.nombre as documento, c.hora as hora, c.ip as ip FROM consulta as c LEFT JOIN documento as d ON c.iddocumento = d.iddocumento");
        return $query->result_array();
    }
    
    function getUsuario($idusuario){
        $query = $this->db->query("SELECT * FROM usuario WHERE idusuario = $idusuario");
        $result = $query->result_array();
        return $result[0];  
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
