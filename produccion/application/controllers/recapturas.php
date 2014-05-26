<?php
class Recapturas extends CI_Controller{
	function index(){
		redirect("recapturas/selector");
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
	   $data['producciones']=$this->Produccion->getCapturados();
       $this->load->view("selector_recapturas", $data);
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
       $this->load->view("recaptura", $data);
       $this->load->view("footer_general"); 
		
	}
	
	
	function save(){
		$this->load->model("Captura");
		$this->Captura->savere($_POST);
		redirect("capturas/selector");
	}
	
		
} 
?>
