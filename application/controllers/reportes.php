<?php
  class Reportes extends CI_Controller {
    function index(){
        $data = $this->base->getBaseArray();
        if($this->session->userdata('rol') == '' || $this->session->userdata('rol') == 'usuario')
            redirect('login/denied');
        $data['userstring'] = "Bienvenido ".$this->session->userdata('nombre')." ".$this->session->userdata('apellidos');
        $this->load->view("header_general", $data);
        $this->load->view("reportes", $data);
        $this->load->view("footer_general");
    }   
    
    function general(){
        $data = $this->base->getBaseArray();
        if($this->session->userdata('rol') == '' || $this->session->userdata('rol') == 'usuario')
            redirect('login/denied');
        $data['userstring'] = "Bienvenido ".$this->session->userdata('nombre')." ".$this->session->userdata('apellidos');
        $this->load->view("header_general", $data);
        $this->load->model("Consulta","",TRUE);
        $data['consultas'] = $this->Consulta->getConsultas();
        $this->load->view("reporte_general", $data);
        $this->load->view("footer_general");   
    }
  }
?>
