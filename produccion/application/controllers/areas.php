<?php
class Areas extends CI_Controller{
    function index(){
          $data = $this->base->getBaseArray();
        if($this->session->userdata('rol') == '' || $this->session->userdata('rol') == 'usuario')
            redirect('login/denied');
        $data['userstring'] = "Bienvenido ".$this->session->userdata('nombre')." ".$this->session->userdata('apellidos');
            $this->load->view("header_general", $data);
            $this->load->model("Area", '', TRUE);
            $data['areas']=$this->Area->getAreas();
            $this->load->view("areas", $data);
            $this->load->view("footer_general");
    }
    
    function nueva(){
          $data = $this->base->getBaseArray();
        if($this->session->userdata('rol') == '' || $this->session->userdata('rol') == 'usuario')
            redirect('login/denied');
        $data['userstring'] = "Bienvenido ".$this->session->userdata('nombre')." ".$this->session->userdata('apellidos');
            $this->load->view("header_general", $data);
            $this->load->model("Area", '', TRUE);
            $data['areas']=$this->Area->getAreas();
            $this->load->view("new_area", $data);
            $this->load->view("footer_general"); 
    }
    
    function saveNew(){
        $this->load->model('Area', '', TRUE);
        $this->Area->saveArea($_POST);
        redirect('areas');
    }
    
    function edit($id){
          $data = $this->base->getBaseArray();
        if($this->session->userdata('rol') == '' || $this->session->userdata('rol') == 'usuario')
            redirect('login/denied');
        $data['userstring'] = "Bienvenido ".$this->session->userdata('nombre')." ".$this->session->userdata('apellidos');
          $data['idarea']=$id;
          $this->load->view("header_general", $data);
          $this->load->model("Area", '', TRUE);
          $data['areas']=$this->Area->getAreas();
          $data['area']=$this->Area->getArea($id);
          $this->load->view("edit_area", $data);
          $this->load->view("footer_general"); 
    }
    
    function editArea(){
        $this->load->model('Area', '', TRUE);
        $this->Area->update($_POST);
        redirect('areas');
    }
    
    function delete($id){
        $this->db->query("DELETE FROM area WHERE idarea = $id");
        redirect('areas');
    }
} 
?>
