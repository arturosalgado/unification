<?php

class Errores extends CI_Controller{
	function index(){
		 $data = $this->base->getBaseArray();
        if($this->session->userdata('rol') == '' || $this->session->userdata('rol') == 'usuario')
            redirect('login/denied');
        $data['userstring'] = "Bienvenido ".$this->session->userdata('nombre')." ".$this->session->userdata('apellidos');
            $this->load->view("header_general", $data);
            $this->load->model("Error", '', TRUE);
        $data['errores']=$this->Error->getErrores();
        $this->load->view("errores", $data);
        $this->load->view("footer_general");
	}
	
	function nuevo(){
		$data = $this->base->getBaseArray();
        if($this->session->userdata('rol') == '' || $this->session->userdata('rol') == 'usuario')
            redirect('login/denied');
        $data['userstring'] = "Bienvenido ".$this->session->userdata('nombre')." ".$this->session->userdata('apellidos');
            $this->load->view("header_general", $data);
            $this->load->view("new_error", $data);
            $this->load->view("footer_general"); 
	}
	
	function saveError(){
		$this->load->model('Error', '', TRUE);
		$this->Error->saveError($_POST);
        redirect('errores');
	}
	
	function delete($id){
		$this->db->query("DELETE FROM error WHERE iderror = $id");
        redirect('errores');
	}
	
	function edit($id){
		$data = $this->base->getBaseArray();
        if($this->session->userdata('rol') == '' || $this->session->userdata('rol') == 'usuario')
            redirect('login/denied');
        $data['userstring'] = "Bienvenido ".$this->session->userdata('nombre')." ".$this->session->userdata('apellidos');
          $data['idlinea']=$id;
          $this->load->view("header_general", $data);
          $this->load->model("Error", '', TRUE);
          $data['error']=$this->Error->getError($id);
		  $data['id'] = $id;
          $this->load->view("edit_error", $data);
          $this->load->view("footer_general"); 
	}
	
	function editError(){
		$this->load->model('Error', '', TRUE);
        $this->Error->update($_POST);
		redirect('errores');
	}
}

?>