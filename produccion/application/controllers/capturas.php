<?php
class Capturas extends CI_Controller{
	function index(){
		redirect("capturas/selector");
	}
	
    /*Muestra un documento pdf*/
	function selector(){
		$data = $this->base->getBaseArray();
        if($this->session->userdata('rol') == '')
            redirect('login/denied');
        $data['userstring'] = "Bienvenido ".$this->session->userdata('nombre')." ".$this->session->userdata('apellidos');
		
	   $data = $this->base->getBaseArray();
       $this->load->view("headermobile", $data);
	   $this->load->model("Produccion");
	   $data['producciones']=$this->Produccion->getNonCaptuded();
       $this->load->view("selector", $data);
       $this->load->view("footer_general"); 
    }
	
	function captura($idCap){
		$data = $this->base->getBaseArray();
        if($this->session->userdata('rol') == '')
            redirect('login/denied');
        $data['userstring'] = "Bienvenido ".$this->session->userdata('nombre')." ".$this->session->userdata('apellidos');
		
	   $data = $this->base->getBaseArray();
       $this->load->view("headermobile", $data);
	   $this->load->model("Produccion");
	   $captura = $this->Produccion->getProduccion($idCap);
	   $idLin = $captura['idlinea'];
	   $this->load->model("Linea");
	   $data['linea'] = $this->Linea->getLinea($idLin);
	   $this->load->model("Error");
	   $data['errores'] = $this->Error->getErrores();
	   $data['produccion'] = $captura;
	   $data['idproduccion'] = $idCap;
       $this->load->view("captura", $data);
       $this->load->view("footer_general"); 
	}
	
	
	function save(){
		$this->load->model("Captura");
		$this->Captura->save($_POST);
		redirect("capturas/selector");
	}
	
		
} 
?>
