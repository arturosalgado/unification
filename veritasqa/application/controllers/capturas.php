<?php
class Capturas extends CI_Controller{
	function index(){
		redirect("capturas/selector");
	}
	
	function selector(){
		$data = $this->base->getBaseArray();
        if($this->session->userdata('rol') == '')
            redirect('login/denied');
        $data['userstring'] = "Bienvenido ".$this->session->userdata('nombre')." ".$this->session->userdata('apellidos');
		
	   $data = $this->base->getBaseArray();
	   $this->load->model("Ndp");
	   $data['ndps'] = $this->Ndp->getActivos();
       $this->load->view("headermobile", $data);
       $this->load->view("selector", $data);
       $this->load->view("footer_general"); 
    }
	
	function captura($idNdp){
		$data = $this->base->getBaseArray();
        if($this->session->userdata('rol') == '')
            redirect('login/denied');
        $data['userstring'] = "Bienvenido ".$this->session->userdata('nombre')." ".$this->session->userdata('apellidos');
		$this->load->model('Ndp');
	    $data = $this->base->getBaseArray();
		$data['ndp'] = $this->Ndp->getNdp($idNdp);
		$data['idNdp'] = $idNdp;
		$this->load->model("Feature");
		$data['feats'] = $this->Feature->getFeatures($idNdp);
        $this->load->view("headermobile", $data);
        $this->load->view("captura", $data);
        $this->load->view("footer_general"); 
	}
	
	function save(){
		$this->load->Model("Captura");
		$this->Captura->save($_POST);
		redirect('capturas/selector');
	}
} 
?>
