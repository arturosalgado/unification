<?php
class Correcciones extends CI_Controller{
	function index(){
		redirect("correcciones/selector");
	}
	
    /*Muestra un documento pdf*/
	function selector(){
		$data = $this->base->getBaseArray();
        if($this->session->userdata('rol') == '')
            redirect('login/denied');
        $data['userstring'] = "Bienvenido ".$this->session->userdata('nombre')." ".$this->session->userdata('apellidos');
		
	   $data = $this->base->getBaseArray();
       $this->load->view("headermobile", $data);
       $this->load->view("selector_correcciones", $data);
       $this->load->view("footer_general"); 
    }
	
	function captura(){
		$data = $this->base->getBaseArray();
        if($this->session->userdata('rol') == '')
            redirect('login/denied');
        $data['userstring'] = "Bienvenido ".$this->session->userdata('nombre')." ".$this->session->userdata('apellidos');
		
	   $data = $this->base->getBaseArray();
       $this->load->view("headermobile", $data);
       $this->load->view("correccion", $data);
       $this->load->view("footer_general"); 
		
	}
	
	
		
} 
?>
