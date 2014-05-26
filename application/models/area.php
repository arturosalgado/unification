<?php
  class Area extends CI_Model{
    function __construct()
    {
        parent::__construct();
    }
    
    function getAreas(){
        $query = $this->db->query("SELECT one.idarea as id, one.nombre as nombre, one.descripcion as descripcion, one.creacion as creacion, two.nombre as subarea from area as one left outer join area as two on one.idPadre = two.idarea");
        return $query->result_array();
    }
    
    function getArea($idarea){
        $query = $this->db->query("SELECT one.idarea as id, one.nombre as nombre, one.descripcion as descripcion, one.creacion as creacion, two.nombre as subarea FROM area as one left outer join area as two on one.idPadre = two.idarea WHERE one.idarea = $idarea");
        $result = $query->result_array();
        return $result[0];  
    }
    
    function saveArea($data){
       $nombre = $data['nombre'];
       $descripcion = $data['descripcion'];
       $creacion = $data['creacion'];
       $idPadre = $data['idPadre'];
       $query = $this->db->query("INSERT INTO `area` (nombre, descripcion, creacion, idPadre) VALUES ('$nombre', '$descripcion', '$creacion', '$idPadre')");
       return $query;
    }
    
    function update($data){
       $id = $data['idarea'];
       $nombre = $data['nombre'];
       $descripcion = $data['descripcion'];
       $creacion = $data['creacion'];
       $idPadre = $data['idPadre'];
       $query = $this->db->query("UPDATE area SET nombre='$nombre', descripcion='$descripcion', creacion='$creacion', idPadre=$idPadre WHERE idarea = $id");
       return $query;
    }
    
    function updateArea($data){
                
    }  
  }
?>
