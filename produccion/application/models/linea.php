<?php
  class Linea extends CI_Model{
    function __construct()
    {
        parent::__construct();
    }
    
    function getLineas($filtro = ""){
        if($filtro != "")
            $query = $this->db->query("SELECT idlinea as id, l.nombre as nombre, l.descripcion as descripcion, l.creador as creador, l.proyecto as proyecto from linea as l WHERE $filtro");
        else
            $query = $this->db->query("SELECT idlinea as id, l.nombre as nombre, l.descripcion as descripcion, l.creador as creador, l.proyecto as proyecto from linea as l");
        return $query->result_array();
    }
	
	function getLineasRecap(){
            $query = $this->db->query("SELECT idlinea as id, l.nombre as nombre, l.descripcion as descripcion, l.creador as creador, l.proyecto as proyecto from linea as l");
			$lineas = $query->result_array();
			$filtradas = array();
			$j=0;
			foreach($lineas as $l)
			{
				$q2 = $this->db->query("SELECT * FROM captura WHERE recaptura = 1 AND idlinea = ".$l['id']);
				$recap = $q2->result_array();
				if(count($recap)>0){
					$filtradas[$j] = $l;
					$j++;
				}
			}
        return $filtradas;
    }
	
	//Retorna el total de materiales de una línea
	function getMaterialCount($idLinea){
		$query = $this->db->query("SELECT * from linea");
        $result = $query->result_array();
		$i=0;
		foreach($result as $r){
			if($i>5&&($r==""||$r=="0"||$r==NULL)){
				break;
			}
			$i++;
		}
		return $i - 5;
	}
    
    function getLinea($idlinea){
        $query = $this->db->query("SELECT * from linea WHERE idlinea = $idlinea ");
        $result = $query->result_array();
		if(isset($result[0]))
        	return $result[0];  
		else 
			return $result;
    }
	
	function getProyectos(){
		$query = $this->db->query("SELECT DISTINCT(proyecto) FROM linea");
		$result = $query->result_array();
		return $result;
	}
	
	function getProjectLines($pName){
		$query = $this->db->query("SELECT * FROM linea WHERE proyecto = '$pName'");
		$result = $query->result_array();
		return $result;
	}
    
    function saveLinea($data){
       $nombre = $data['nombre'];
       $descripcion = $data['descripcion'];
	   $proyecto = $data['proyecto'];
	   $creador = $data['creador'];
	   $piezas = $data['piezas'];
	   //splitting the materials
	   $numControl = explode(",", $data['ldm'], 20);
	   $c1 = isset($numControl[0])?$numControl[0]:0;
	   $c2 = isset($numControl[1])?$numControl[1]:0;
	   $c3 = isset($numControl[2])?$numControl[2]:0;
	   $c4 = isset($numControl[3])?$numControl[3]:0;
	   $c5 = isset($numControl[4])?$numControl[4]:0;
	   $c6 = isset($numControl[5])?$numControl[5]:0;
	   $c7 = isset($numControl[6])?$numControl[6]:0;
	   $c8 = isset($numControl[7])?$numControl[7]:0;
	   $c9 = isset($numControl[8])?$numControl[8]:0;
	   $c10 = isset($numControl[9])?$numControl[9]:0;
	   $c11 = isset($numControl[10])?$numControl[10]:0;
	   $c12 = isset($numControl[11])?$numControl[11]:0;
	   $c13 = isset($numControl[12])?$numControl[12]:0;
	   $c14 = isset($numControl[13])?$numControl[13]:0;
	   $c15 = isset($numControl[14])?$numControl[14]:0;
	   $c16 = isset($numControl[15])?$numControl[15]:0;
	   $c17 = isset($numControl[16])?$numControl[16]:0;
	   $c18 = isset($numControl[17])?$numControl[17]:0;
	   $c19 = isset($numControl[18])?$numControl[18]:0;
	   $c20 = isset($numControl[19])?$numControl[19]:0;
	   $query = $this->db->query("INSERT INTO linea (nombre, descripcion, creador, proyecto, piezas, c1, c2, c3, c4, c5, c6, c7, c8, c9, c10, c11, c12, c13, c14, c15, c16, c17, c18, c19, c20) VALUES ('$nombre', '$descripcion', '$creador', '$proyecto', '$piezas', '$c1', '$c2', '$c3', '$c4', '$c5', '$c6', '$c7', '$c8', '$c9', '$c10', '$c11', '$c12', '$c13', '$c14', '$c15', '$c16', '$c17', '$c18', '$c19', '$c20')");
       return $query;
    }
    
    function update($data){
       $id = $data['idlinea'];
       $nombre = $data['nombre'];
       $descripcion = $data['descripcion'];
	   $proyecto = $data['proyecto'];
	   $creador = $data['creador'];
	   $piezas = $data['piezas'];
	   //splitting the materials
	   $numControl = explode(",", $data['ldm'], 20);
	   $c1 = isset($numControl[0])?$numControl[0]:0;
	   $c2 = isset($numControl[1])?$numControl[1]:0;
	   $c3 = isset($numControl[2])?$numControl[2]:0;
	   $c4 = isset($numControl[3])?$numControl[3]:0;
	   $c5 = isset($numControl[4])?$numControl[4]:0;
	   $c6 = isset($numControl[5])?$numControl[5]:0;
	   $c7 = isset($numControl[6])?$numControl[6]:0;
	   $c8 = isset($numControl[7])?$numControl[7]:0;
	   $c9 = isset($numControl[8])?$numControl[8]:0;
	   $c10 = isset($numControl[9])?$numControl[9]:0;
	   $c11 = isset($numControl[10])?$numControl[10]:0;
	   $c12 = isset($numControl[11])?$numControl[11]:0;
	   $c13 = isset($numControl[12])?$numControl[12]:0;
	   $c14 = isset($numControl[13])?$numControl[13]:0;
	   $c15 = isset($numControl[14])?$numControl[14]:0;
	   $c16 = isset($numControl[15])?$numControl[15]:0;
	   $c17 = isset($numControl[16])?$numControl[16]:0;
	   $c18 = isset($numControl[17])?$numControl[17]:0;
	   $c19 = isset($numControl[18])?$numControl[18]:0;
	   $c20 = isset($numControl[19])?$numControl[19]:0;
	   $query = $this->db->query("UPDATE linea SET piezas = '$piezas', nombre = '$nombre', descripcion = '$descripcion', proyecto = '$proyecto', c1 = '$c1', c2 = '$c2', c3 = '$c3', c4 = '$c4', c5 = '$c5', c6 = '$c6', c7 = '$c7', c8 = '$c8', c9 = '$c9', c10 = '$c10', c11 = '$c11', c12 = '$c12', c13 = '$c13', c14 = '$c14', c15 = '$c15', c16 = '$c16', c17 = '$c17', c18 = '$c18', c19 = '$c19', c20 = '$c20' WHERE idlinea = $id");
       return $query;
    }
    
    function updateArea($data){
                
    }
	
	function updateimg($data){
		$id = $data['idlinea'];
		$img = $data['file']['name'];
		$query = $this->db->query("UPDATE linea SET imagen = '$img' WHERE idlinea = $id");
       	return $query;
	}
	
	function updateimg2($data){
		$id = $data['idlinea'];
		$img = $data['file2']['name'];
		$query = $this->db->query("UPDATE linea SET imagen2 = '$img' WHERE idlinea = $id");
       	return $query;
	}
  }
?>
