<?php
class Captura extends CI_Model{
	function getCaptura($id){
		$query = $this->db->query("SELECT * FROM captura WHERE idcaptura = $id AND recaptura = 0");
		$result = $query->result_array();
		return $result[0];
	}
	
	function getCapturas($idLinea){
		$query = $this->db->query("SELECT idcaptura,captura.lote as lote,  captura.idlinea, captura.responsable1, captura.responsable2, captura.responsable3, pasodeformado, ok, nook, tmh, tmp, tmm, sh, sp, sm, horas_laboradas, captura.idproduccion, captura.fecha, piezas, captura.lote FROM captura LEFT JOIN produccion ON captura.idproduccion = produccion.idproduccion WHERE captura.idlinea = $idLinea AND recaptura = 0");		
		return $query->result_array();
	}
	
	function getAllCapturas(){
		$query = $this->db->query("SELECT idcaptura,captura.lote as lote,  captura.idlinea, captura.responsable1, captura.responsable2, captura.responsable3, pasodeformado, ok, nook, tmh, tmp, tmm, sh, sp, sm, horas_laboradas, captura.idproduccion, captura.fecha, piezas, lote FROM captura LEFT JOIN produccion ON captura.idproduccion = produccion.idproduccion WHERE recaptura = 0 ORDER BY captura.fecha DESC");
		return $query->result_array();
	}
	
	function getCapturasTime($idLinea){
		//filters the last week
		$lastWeekDate = date("Y-m-d",strtotime("-1 week"));
		$query = $this->db->query("SELECT * FROM captura WHERE idlinea = $idLinea AND recaptura = 0 AND fecha > '$lastWeekDate' ORDER BY fecha DESC");
		return $query->result_array();
	}
	
	function getFilteredCapturas($idLinea, $inicio, $fin){
		$query = $this->db->query("SELECT * FROM captura WHERE idlinea = $idLinea AND recaptura = 0 AND fecha > '$inicio' AND fecha < '$fin'");
		return $query->result_array();
	}

	function getRecapturas($idLinea){
		$query = $this->db->query("SELECT idcaptura,captura.lote as lote,  captura.idlinea, captura.responsable1, captura.responsable2, captura.responsable3, pasodeformado, ok, nook, tmh, tmp, tmm, sh, sp, sm, horas_laboradas, captura.idproduccion, captura.fecha, motivo_recaptura, piezas, lote, idturno FROM captura LEFT JOIN produccion ON captura.idproduccion = produccion.idproduccion WHERE captura.idlinea = $idLinea AND recaptura = 1 ORDER BY captura.fecha DESC");
		return $query->result_array();
	}
	
	function getAllRecapturas(){
		$query = $this->db->query("SELECT captura.idcaptura, captura.idlinea, idturno, produccion.fecha FROM captura LEFT JOIN produccion ON captura.idproduccion = produccion.idproduccion WHERE recaptura = 1 ORDER BY captura.fecha DESC");
		$tempresult1 = $query->result_array();
		foreach($tempresult1 as $k => $t){
			$query2 = $this->db->query("SELECT turno.nombre FROM produccion LEFT JOIN turno ON produccion.idturno = turno.idturno WHERE produccion.idturno = ".$t['idturno']);
			$tempresult2 = $query2->result_array();
			$tempresult1[$k]['nombreturno']=$tempresult2[0]['nombre'];
			
			$query3 = $this->db->query("SELECT linea.nombre FROM linea LEFT JOIN captura ON linea.idlinea = captura.idlinea WHERE linea.idlinea = ".$t['idlinea']);
			$tempresult3 = $query3->result_array();
			$tempresult1[$k]['nombrelinea']=$tempresult3[0]['nombre'];
		}
		return $tempresult1;
	}
	
	function getFilteredRecapturas($idLinea, $inicio, $fin){
		$query = $this->db->query("SELECT * FROM captura WHERE idlinea = $idLinea AND recaptura = 1 AND fecha > '$inicio' AND fecha < '$fin'");
		return $query->result_array();
	}
	
	function save($data){
		//marcando la produccion como capturada
		//echo ("UPDATE produccion SET capturado = 1 WHERE idproduccion = "+$data['idprod']);
		$this->db->query("UPDATE produccion SET capturado = 1 WHERE idproduccion = ".$data['idprod']);
		
		//cergando las variables
		$idlinea = $data['idlinea'];
		//splitting the resposibles
		$numControl = explode(",", $data['numControl'], 3);
		$responsable1 = isset($numControl[0])?$numControl[0]:0;
		$responsable2 = isset($numControl[1])?$numControl[1]:0;
		$responsable3 = isset($numControl[2])?$numControl[2]:0;
		$lote = isset($data['lote'])?$data['lote']:"";
		$paso = isset($data['paso'])?$data['paso']:0;
		$ok = isset($data['ok'])?$data['ok']:0;
		$nook = isset($data['nook'])?$data['nook']:0;
		$horas_laboradas = isset($data['horas_laboradas'])?$data['horas_laboradas']:0;
		$idcaptura = isset($data['idcaptura'])?$data['idcaptura']:0;
		
		$tmh = $data['tmh']!=""?$data['tmh']:0;
		$tmp = $data['tmp']!=""?$data['tmp']:0;
		$tmm = $data['tmm']!=""?$data['tmm']:0;
		
		//Guardamos la captura en su respectiva tabla leyendo el id
		$maxid = $this->db->query("SELECT MAX(idcaptura) as id FROM captura");
		$resmax = $maxid->result_array();
		$nextid = $resmax['0']['id'] + 1;
		$fecha = date("Y-m-d");
		$this->db->query("INSERT INTO captura (idcaptura, lote, idlinea, fecha, responsable1, responsable2, responsable3, pasodeformado, ok, nook, tmh, tmp, tmm, horas_laboradas, idproduccion) VALUES($nextid, '$lote', $idlinea, '$fecha', '$responsable1', '$responsable2', '$responsable3', $paso, $ok, $nook, $tmh, $tmp, $tmm, $horas_laboradas, $idcaptura)");
		
		//Iterando en el post buscando campos que comiencen con c_
		foreach($_POST as $key => $dato){
			if(strpos($key, "c_")=="0"&is_int(strpos($key, "c_"))){
				$a_string = explode("_", $key);
				$idmat = $a_string[1];
				$iderror = $a_string[2];
				$cantidad = $dato;
				//separando cada elemento
				//guardandolos en la tabla corresponiente
				if($cantidad>0){
					
				$this->db->query("INSERT INTO captura_error (idlinea, idmat, iderror, cantidad, descripcion, fecha, idcaptura) VALUES ('$idlinea', '$idmat', '$iderror', '$cantidad', '', '$fecha', '$nextid')");
				}
			}
		}
	
		
	}
	
	function savere($data){
		//var_dump($data);
		
		//cergando las variables
		$idlinea = $data['idlinea'];
		//splitting the resposibles
		$numControl = explode(",", $data['numControl'], 3);
		$responsable1 = isset($numControl[0])?$numControl[0]:0;
		$responsable2 = isset($numControl[1])?$numControl[1]:0;
		$responsable3 = isset($numControl[2])?$numControl[2]:0;
		
		$paso = isset($data['paso'])?$data['paso']:0;
		$ok = isset($data['ok'])?$data['ok']:0;
		$nook = isset($data['nook'])?$data['nook']:0;
		$horas_laboradas = isset($data['horas_laboradas'])?$data['horas_laboradas']:0;
		$idcaptura = isset($data['idcaptura'])?$data['idcaptura']:0;
		
		$tmh = $data['tmh']!=""?$data['tmh']:0;
		$tmp = $data['tmp']!=""?$data['tmp']:0;
		$tmm = $data['tmm']!=""?$data['tmm']:0;
		
		$motivo = $data['motivo'];
		
		echo var_dump($tmh);
		//marcando las capturas previas como recapturadas e insertando el motivo
		$this->db->query("UPDATE captura SET recaptura='1', motivo_recaptura='$motivo' WHERE idcaptura = '$idcaptura'");
		
		$this->db->query("UPDATE captura_error SET recaptura = '1' WHERE idcaptura = '$idcaptura'");
		
		//Guardamos la captura en su respectiva tabla leyendo el id
		$maxid = $this->db->query("SELECT MAX(idcaptura) as id FROM captura");
		$resmax = $maxid->result_array();
		$nextid = $resmax['0']['id'] + 1;
		$fecha = date("Y-m-d");
		$this->db->query("INSERT INTO captura (idcaptura, idlinea, fecha, responsable1, responsable2, responsable3, pasodeformado, ok, nook, tmh, tmp, tmm, sh, sp, sm, horas_laboradas, idproduccion) VALUES($nextid, $idlinea, '$fecha', '$responsable1', '$responsable2', '$responsable3', $paso, $ok, $nook, $tmh, $tmp, $tmm, 0, 0, 0, $horas_laboradas, $idcaptura)");
		
		//Iterando en el post buscando campos que comiencen con c_
		foreach($_POST as $key => $dato){
			if(strpos($key, "c_")=="0"&is_int(strpos($key, "c_"))){
				$a_string = explode("_", $key);
				$idmat = $a_string[1];
				$iderror = $a_string[2];
				$cantidad = $dato;
				//separando cada elemento
				//guardandolos en la tabla corresponiente
				if($cantidad>0){
					
				$this->db->query("INSERT INTO captura_error (idlinea, idmat, iderror, cantidad, descripcion, fecha, idcaptura) VALUES ('$idlinea', '$idmat', '$iderror', '$cantidad', '', '$fecha', '$nextid')");
				}
			}
		}
		
	}
}
?>