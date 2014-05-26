<?php
  class Nueva extends CI_Controller{
      function index(){
          $data = $this->base->getBaseArray();
          if($this->session->userdata('rol') == '' || $this->session->userdata('rol') == 'usuario')
              redirect('login/denied');
          $data['userstring'] = "Bienvenido ".$this->session->userdata('nombre')." ".$this->session->userdata('apellidos');
            $this->load->view("header", $data);
            $this->load->view("footer");
      }
  }
?>
