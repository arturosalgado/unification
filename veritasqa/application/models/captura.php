<?php 
class Captura extends CI_Model{
	function save($data){
		//saving the capture
		$numControl = explode(",", $data['numControl'], 4);
		$numControl1 = isset($numControl[0])?$numControl[0]:0;
		$numControl2 = isset($numControl[1])?$numControl[1]:0;
		$numControl3 = isset($numControl[2])?$numControl[2]:0;
		$numControl4 = isset($numControl[3])?$numControl[3]:0;
		$comentario = $data['comentario'];
		$idNdp = $data['idNdp'];
		$result = $this->db->query('SELECT MAX(idcaptura) as id FROM captura');
		$arreglo = $result->result_array();
		$maxId = $arreglo[0]['id'];
		$maxId += 1;
		$this->db->query("INSERT INTO captura (idcaptura, operador1, operador2, operador3, operador4, fecha, idndp, comentario) VALUES($maxId, $numControl1, $numControl2, $numControl3, $numControl4, NOW(), $idNdp, '$comentario')");
		
		$i=0;
		foreach($data['feat'] as $feat){
			$featid = $data['featid'][$i];
			$this->db->query("INSERT INTO captura_feature (idfeature, valor, fecha, usuario1, usuario2, usuario3, usuario4, idcaptura) VALUES ($featid, $feat, NOW(), $numControl1, $numControl2, $numControl3, $numControl4, $maxId)");
			$i++;
		}
	}
}
?>