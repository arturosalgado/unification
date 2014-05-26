<?php
class Sync extends CI_Controller{
	function index(){
		
		$this->load->Model('Turno');
		$turno = $this->Turno->getCurrent();
		$prod = $this->load->database('produccion', TRUE);
		$fecha = date('Y-m-d');
		$result = $prod->query("SELECT linea.nombre FROM produccion LEFT JOIN linea ON produccion.idlinea = linea.idlinea WHERE idturno = '$turno' AND fecha = '$fecha'");
		$array = $result->result_array();
		
		//Mandamos todos los ndp a desactivado (id 4)
		$qa = $this->load->database('local', TRUE);
		$qa->query('UPDATE ndp SET idturno = 4 WHERE idndp > 0');
		
		//metemos el turno activo en la tabla ndp
		foreach($array as $a){
			$nombrelinea = $a['nombre'];
			$result_ndp = $qa->query("SELECT * FROM ndp WHERE nombre = '$nombrelinea'");
			$array_ndp = $result_ndp->result_array();
			if(count($array_ndp > 0)){
				foreach($array_ndp as $andp){
					$idndp = $andp['idndp'];
					$qa->query("UPDATE ndp SET idturno = '$turno' WHERE idndp = '$idndp'");
				}
			}
		}
		redirect('ndps');
	}
}
?>