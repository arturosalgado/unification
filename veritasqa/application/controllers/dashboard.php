<?php
  class Dashboard extends CI_Controller {
    function index(){
        session_start();
            echo "<pre>";
            print_r($this->session->all_userdata());
             echo "---------------";
            print_r($_SESSION);
            echo "</pre>";
        
            $data = $this->base->getBaseArray();
            if($this->session->userdata('rol') == '')
                redirect('login/denied');
            $data['userstring'] = "Bienvenido ".$this->session->userdata('nombre')." ".$this->session->userdata('apellidos');
            $this->load->view("header_general", $data);
            if($this->session->userdata('rol')=="admin")
                $this->load->view("dashboardadmin", $data);
            if($this->session->userdata('rol')=="sadmin")
                $this->load->view("dashboard", $data);
			if($this->session->userdata('rol')=="visitor")
			{
				$this->load->model("Linea", '', TRUE);
            	$data['lineas']=$this->Linea->getLineas();
                $this->load->view("visitor", $data);
				}
        	if($this->session->userdata('rol')=="usuario")
            	$this->load->view("dashboardusuario", $data);
            	$this->load->view("footer_general");
    }   
  }
?>
