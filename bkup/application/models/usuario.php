<?php
  class Usuario extends CI_Model{
    function __construct()
    {
        parent::__construct();
    }
    
    function getUsuarios(){
        $query = $this->db->query("SELECT `usuario`.`idusuario`, `usuario`.`username`, `usuario`.`passwd`, `usuario`.`nombre`, `usuario`.`apellidos`, `usuario`.`rol`, `usuario`.`mail`, `area`.`nombre` as area FROM `usuario` LEFT JOIN area ON usuario.idArea = area.idarea");
        return $query->result_array();
    }
    
    function getUsuario($idusuario){
        $query = $this->db->query("SELECT `usuario`.`idusuario`, `usuario`.`username`, `usuario`.`passwd`, `usuario`.`nombre`, `usuario`.`apellidos`, `usuario`.`rol`, `usuario`.`mail`, `area`.`nombre` as area FROM `usuario` LEFT JOIN area ON usuario.idArea = area.idarea WHERE idusuario = $idusuario");
        $result = $query->result_array();
        return $result[0];  
    }
    
    function saveUsuario($data){
       $username = $data['username'];
       $passwd = $data['passwd'];
       $nombre = $data['nombre'];
       $apellidos = $data['apellidos'];
       $idArea = $data['idarea'];
       $rol = $data['rol'];
       $mail = $data['mail'];
       $query = $this->db->query("INSERT INTO usuario(username, passwd, nombre, apellidos, rol, mail, idArea) VALUES ('$username', '$passwd', '$nombre', '$apellidos', '$rol', '$mail', '$idArea')");
       return $query;
    }
    
    function update($data){
       $idusuario = $data['idusuario'];
       $username = $data['username'];
       $passwd = $data['passwd'];
       $nombre = $data['nombre'];
       $apellidos = $data['apellidos'];
       $rol = $data['rol'];
       $idArea = $data['idArea'];
       $mail = $data['mail'];
       if($passwd != "")
        $query = $this->db->query("UPDATE `usuario` SET  `username` = '$username', `passwd` = '$passwd', `nombre` = '$nombre', `apellidos` = '$apellidos', `rol` = '$rol', `mail` = '$mail', idArea = '$idArea' WHERE idusuario = $idusuario");
       else
        $query = $this->db->query("UPDATE `usuario` SET  `username` = '$username', `nombre` = '$nombre', `apellidos` = '$apellidos', `rol` = '$rol', `mail` = '$mail', idArea = '$idArea' WHERE idusuario = $idusuario");
       return $query;
    }
    
    
  }
?>
