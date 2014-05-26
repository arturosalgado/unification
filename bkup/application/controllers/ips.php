<?php
class Ips extends CI_Controller{
    function index(){
          $data = $this->base->getBaseArray();
        if($this->session->userdata('rol') == '' || $this->session->userdata('rol') == 'usuario' || $this->session->userdata('rol') == 'admin')
            redirect('login/denied');
        $data['userstring'] = "Bienvenido ".$this->session->userdata('nombre')." ".$this->session->userdata('apellidos');
            $this->load->view("header_general", $data);
            $this->load->model("Ip", '', TRUE);
            $data['ips']=$this->Ip->getIps();
            $this->load->view("ips", $data);
            $this->load->view("footer_general");
    }
    
    function nuevo(){
          $data = $this->base->getBaseArray();
        if($this->session->userdata('rol') == '' || $this->session->userdata('rol') == 'usuario')
            redirect('login/denied');
        $data['userstring'] = "Bienvenido ".$this->session->userdata('nombre')." ".$this->session->userdata('apellidos');
            $this->load->view("header_general", $data);
            $this->load->model("Ip", '', TRUE);
            $this->load->model("Area", '', TRUE);
            $data['areas']=$this->Area->getAreas();
            $this->load->view("new_ip", $data);
            $this->load->view("footer_general"); 
    }
    
    function saveNew(){
        $this->load->model('Ip', '', TRUE);
        $this->Ip->saveIp($_POST);
        redirect('ips');
    }
    
    function edit($id){
       $data = $this->base->getBaseArray();
       if($this->session->userdata('rol') == '' || $this->session->userdata('rol') == 'usuario')
          redirect('login/denied');
       $data['userstring'] = "Bienvenido ".$this->session->userdata('nombre')." ".$this->session->userdata('apellidos');
       $data['idip']=$id;
       $this->load->view("header_general", $data);
       $this->load->model("Ip", '', TRUE);
       $data['ip']=$this->Ip->getIp($id);
       $this->load->model("Area", '', TRUE);
       $data['areas']=$this->Area->getAreas();
       $this->load->view("edit_ip", $data);
       $this->load->view("footer_general");
    }
    
    function editIp(){
        $this->load->model('Ip', '', TRUE);
        $this->Ip->update($_POST);
        redirect('ips');
    }
    
    function delete($id){
        $this->db->query("DELETE FROM ip WHERE idip = $id");
        redirect('ips');
    }
} 
?>
