<?php
  class Linea extends CI_Model{
    function __construct()
    {
        parent::__construct();
    }
    
    function getLineas($filtro = ""){
        if($filtro != "")
            $query = $this->db->query("SELECT idlinea as id, l.nombre as nombre, l.descripcion as descripcion, l.creacion as creacion, l.creador as creador from linea as l WHERE $filtro");
        else
            $query = $this->db->query("SELECT idlinea as id, l.nombre as nombre, l.descripcion as descripcion, l.creacion as creacion, l.creador as creador from linea as l");
        return $query->result_array();
    }
    
    function getLinea($idlinea){
        $query = $this->db->query("SELECT idlinea as id, l.nombre as nombre, l.descripcion as descripcion, l.creacion as creacion, l.creador as creador from linea as l WHERE l.idlinea = $idlinea ");
        $result = $query->result_array();
        return $result[0];  
    }
    
    function saveLinea($data){
       $nombre = $data['nombre'];
       $descripcion = $data['descripcion'];
       $creacion = $data['creacion'];
	   $creador = $data['creador'];
       $query = $this->db->query("INSERT INTO `linea` (`nombre`, `descripcion`, `creacion`, `creador`) VALUES ('$nombre', '$descripcion ', '$creacion', '$creador');");
       return $query;
    }
    
    function update($data){
       $id = $data['idlinea'];
       $nombre = $data['nombre'];
       $descripcion = $data['descripcion'];
       $creacion = $data['creacion'];
       $query = $this->db->query("UPDATE linea SET nombre='$nombre', descripcion='$descripcion', creacion='$creacion' WHERE idlinea = $id");
       return $query;
    }
    
    function updateArea($data){
                
    }  
  }
?>
