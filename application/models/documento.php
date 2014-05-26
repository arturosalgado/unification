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

      /** Returns the image of the producton line
       * of the document which id is given */
      function getImgPath($id){
          $query2 = $this->db->query("SELECT imagen FROM linea WHERE idlinea = $id");
          if($query2->num_rows()>0){
            $rpath = $query2->row();
            return $rpath->imagen;
          }
          return "";
      }
	  
	  /** Returns the image of the producton line
       * of the document which id is given */
      function getImgPath2($id){
          $query2 = $this->db->query("SELECT imagen2 FROM linea WHERE idlinea = $id");
          if($query2->num_rows()>0){
            $rpath = $query2->row();
            return $rpath->imagen2;
          }
          return "";
      }

      function getDocumentosUsuario($filtro = "", $nombre){
          $query = "";
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
          $query = "";
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
        $query = $this->db->query("SELECT `documento`.`iddocumento` as id, `documento`.`nombre` as nombre, `documento`.`descripcion` as descripcion, `documento`.`creacion` as creacion, linea.nombre as linea,documento.idarea as area, `documento`.`ruta` as ruta FROM documento inner join linea ON documento.idlinea = linea.idlinea WHERE documento.iddocumento = $iddocumento");
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

       $ruta = $data['filename'];

       

       $query = $this->db->query("INSERT INTO documento(nombre, descripcion, creacion, idlinea, ruta, modificacion, creador, idarea) VALUES ('$nombre', '$descripcion', '$creacion', '$idlinea', '$ruta', '$creacion', '$usuario', $idarea)");

       return $query;
    }
    
    function update($data){
       $id = $data['iddocumento'];
       $nombre = $data['nombre'];
       $descripcion = $data['descripcion'];
       $idarea= $data['idarea'];
       $idlinea = $data['idlinea'];
	   $ruta = $data['file']['name'];
       $modificacion = date("Y/m/d");
	   $ruta = $data['filename'];
	   
	   if($data['updatedoc']){
			$query = $this->db->query("UPDATE documento SET nombre='$nombre', descripcion='$descripcion', modificacion='$modificacion', idlinea=$idlinea, idarea=$idarea, ruta='$ruta' WHERE iddocumento = $id");
		} else {
			$query = $this->db->query("UPDATE documento SET nombre='$nombre', descripcion='$descripcion', modificacion='$modificacion', idlinea=$idlinea, idarea=$idarea WHERE iddocumento = $id");
		} 
      	  
       return $query;
    }
    
    function getPath($id){
        $query = $this->db->query("SELECT ruta FROM documento WHERE iddocumento = $id");
        $result = $query->result_array();
        return $result[0]['ruta'];
    }

      function getFirstPath($idLinea){
          $query = $this->db->query("SELECT ruta FROM documento WHERE idlinea = $idLinea LIMIT 1");
          if($query->num_rows() > 0){
            $result = $query->result_array();
            return $result[0]['ruta'];
          }
      }

      function getPaths($idLinea){
          $query = $this->db->query("SELECT ruta, nombre FROM documento WHERE idlinea = $idLinea");
          $result = $query->result_array();
          return $result;
      }
  }
?>
