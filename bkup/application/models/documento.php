<?php
  class Documento extends CI_Model{
    function __construct()
    {
        parent::__construct();
    }
    
    function getDocumentos($filtro = ""){
		$query;
		if($filtro == "")
        $query = $this->db->query("SELECT `documento`.`iddocumento` as id,documento.modificacion as modificacion, documento.creador as creador, `documento`.`nombre` as nombre, `documento`.`descripcion` as descripcion, `documento`.`creacion` as creacion, linea.nombre as linea, `documento`.`ruta` as ruta, documento.idarea as idarea FROM documento left join linea ON documento.idlinea = linea.idlinea ORDER BY linea.nombre");
		else
		$query = $this->db->query("SELECT `documento`.`iddocumento` as id,documento.modificacion as modificacion, documento.creador as creador, `documento`.`nombre` as nombre, `documento`.`descripcion` as descripcion, `documento`.`creacion` as creacion, linea.nombre as linea, `documento`.`ruta` as ruta, documento.idarea as idarea FROM documento left join linea ON documento.idlinea = linea.idlinea WHERE $filtro ORDER BY linea.nombre");
        $array = $query->result_array();
        for($i=0; $i<count($array); $i++){
            $idarea = $array[$i]['idarea'];
            $query2 = $this->db->query("SELECT area.nombre from area WHERE area.idarea = $idarea");
            $array2 = $query2->result_array();
            $array[$i]['area']=$array2[0]['nombre'];
        }
        return $array;
    }

      function getDocumentosUsuario($filtro = "", $nombre){
          $query;
          if($filtro == "")
              $query = $this->db->query("SELECT `documento`.`iddocumento` as id,documento.modificacion as modificacion, documento.creador as creador, `documento`.`nombre` as nombre, `documento`.`descripcion` as descripcion, `documento`.`creacion` as creacion, linea.nombre as linea, `documento`.`ruta` as ruta, documento.idarea as idarea FROM documento left join linea ON documento.idlinea = linea.idlinea WHERE documento.creador = '$nombre'");
          else
              $query = $this->db->query("SELECT `documento`.`iddocumento` as id,documento.modificacion as modificacion, documento.creador as creador, `documento`.`nombre` as nombre, `documento`.`descripcion` as descripcion, `documento`.`creacion` as creacion, linea.nombre as linea, `documento`.`ruta` as ruta, documento.idarea as idarea FROM documento left join linea ON documento.idlinea = linea.idlinea WHERE $filtro AND documento.creador = '$nombre'");
          $array = $query->result_array();
          for($i=0; $i<count($array); $i++){
              $idarea = $array[$i]['idarea'];
              $query2 = $this->db->query("SELECT area.nombre from area WHERE area.idarea = $idarea");
              $array2 = $query2->result_array();
              $array[$i]['area']=$array2[0]['nombre'];
          }
          return $array;
      }

      function getDocumentosAdmin($filtro = "", $idarea){
          $query;
          if($filtro == "")
              $query = $this->db->query("SELECT `documento`.`iddocumento` as id,documento.modificacion as modificacion, documento.creador as creador, `documento`.`nombre` as nombre, `documento`.`descripcion` as descripcion, `documento`.`creacion` as creacion, linea.nombre as linea, `documento`.`ruta` as ruta, documento.idarea as idarea FROM documento left join linea ON documento.idlinea = linea.idlinea WHERE idarea = $idarea");
          else
              $query = $this->db->query("SELECT `documento`.`iddocumento` as id,documento.modificacion as modificacion, documento.creador as creador, `documento`.`nombre` as nombre, `documento`.`descripcion` as descripcion, `documento`.`creacion` as creacion, linea.nombre as linea, `documento`.`ruta` as ruta, documento.idarea as idarea FROM documento left join linea ON documento.idlinea = linea.idlinea WHERE $filtro AND idarea = $idarea");
          $array = $query->result_array();
          for($i=0; $i<count($array); $i++){
              $idarea = $array[$i]['idarea'];
              $query2 = $this->db->query("SELECT area.nombre from area WHERE area.idarea = $idarea");
              $array2 = $query2->result_array();
              $array[$i]['area']=$array2[0]['nombre'];
          }
          return $array;
      }
    
    function getDocumento($iddocumento){
        $query = $this->db->query("SELECT `documento`.`iddocumento` as id, `documento`.`nombre` as nombre, `documento`.`descripcion` as descripcion, `documento`.`creacion` as creacion, linea.nombre as linea, `documento`.`ruta` as ruta FROM documento inner join linea ON documento.idlinea = linea.idlinea WHERE documento.iddocumento = $iddocumento");
        $result = $query->result_array();
        return $result[0];  
    }
    
    function saveDocumento($data){
       $nombre = $data['nombre'];
       $descripcion = $data['descripcion'];
       $creacion = $data['creacion'];
       $idlinea = $data['idlinea'];
       $usuario = $data['creador'];
       $idarea = $data['idarea'];
       $ruta = $data['file']['name'];
       $query1 = $this->db->query("SELECT * FROM documento WHERE nombre = '$nombre'");
       if($query1->num_rows() > 0)
           return;
       $query = $this->db->query("INSERT INTO documento(nombre, descripcion, creacion, idlinea, ruta, modificacion, creador, idarea) VALUES ('$nombre', '$descripcion', '$creacion', '$idlinea', '$ruta', '$creacion', '$usuario', $idarea)");
       return $query;
    }
    
    function update($data){
       $id = $data['iddocumento'];
       $nombre = $data['nombre'];
       $descripcion = $data['descripcion'];
       $idarea= $data['idarea'];
       $idlinea = $data['idlinea'];
        $modificacion = date("Y/m/d");
       $query = $this->db->query("UPDATE documento SET nombre='$nombre', descripcion='$descripcion', modificacion='$modificacion', idlinea=$idlinea, idarea=$idarea WHERE iddocumento = $id");
       return $query;
    }
    
    function getPath($id){
        $query = $this->db->query("SELECT ruta FROM documento WHERE iddocumento = $id");
        $result = $query->result_array();
        return $result[0]['ruta'];
    }

      function getFirstPath($idLinea){
          $query = $this->db->query("SELECT ruta FROM documento WHERE idlinea = $idLinea LIMIT 1");
          $result = $query->result_array();
          return $result[0]['ruta'];
      }

      function getPaths($idLinea){
          $query = $this->db->query("SELECT ruta, nombre FROM documento WHERE idlinea = $idLinea");
          $result = $query->result_array();
          return $result;
      }
  }
?>
