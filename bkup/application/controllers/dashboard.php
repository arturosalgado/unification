<?php
  class Dashboard extends CI_Controller {
    function index(){


            $data = $this->base->getBaseArray();
            if($this->session->userdata('rol') == '')
                redirect('login/denied');
            $data['userstring'] = "Bienvenido ".$this->session->userdata('nombre')." ".$this->session->userdata('apellidos');
            $this->load->view("header_general", $data);
            if($this->session->userdata('rol')=="admin")
                $this->load->view("dashboardadmin", $data);
            if($this->session->userdata('rol')=="sadmin")
                $this->load->view("dashboard", $data);
        if($this->session->userdata('rol')=="usuario")
            $this->load->view("dashboardusuario", $data);
            $this->load->view("footer_general");
    }   
  }
?>
