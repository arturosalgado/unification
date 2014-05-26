<?php

class Errores extends CI_Controller{
	function index(){
		 $data = $this->base->getBaseArray();
        if($this->session->userdata('rol') == '' || $this->session->userdata('rol') == 'usuario')
            redirect('login/denied');
        $data['userstring'] = "Bienvenido ".$this->session->userdata('nombre')." ".$this->session->userdata('apellidos');
            $this->load->view("header_general", $data);
            $this->load->model("Turno", '', TRUE);
        $data['turnos']=$this->Turno->getTurnos();
        $this->load->view("turnos", $data);
        $this->load->view("footer_general");
	}
	
	function nuevo(){
		$data = $this->base->getBaseArray();
        if($this->session->userdata('rol') == '' || $this->session->userdata('rol') == 'usuario')
            redirect('login/denied');
        $data['userstring'] = "Bienvenido ".$this->session->userdata('nombre')." ".$this->session->userdata('apellidos');
            $this->load->view("header_general", $data);
            $this->load->view("new_turno", $data);
            $this->load->view("footer_general"); 
	}
	
	function saveTurno(){
		$this->load->model('Turno', '', TRUE);
		$this->Turno->saveTurno($_POST);
        redirect('turnos');
	}
	
	function delete($id){
		$this->db->query("DELETE FROM turno WHERE idturno = $id");
        redirect('turnos');
	}
	
	function edit($id){
		$data = $this->base->getBaseArray();
        if($this->session->userdata('rol') == '' || $this->session->userdata('rol') == 'usuario')
            redirect('login/denied');
        $data['userstring'] = "Bienvenido ".$this->session->userdata('nombre')." ".$this->session->userdata('apellidos');
          $data['idlinea']=$id;
          $this->load->view("header_general", $data);
          $this->load->model("Turno", '', TRUE);
          $data['turno']=$this->Turno->getTurno($id);
		  $data['id'] = $id;
          $this->load->view("edit_turno", $data);
          $this->load->view("footer_general"); 
	}
	
	function editTurno(){
		$this->load->model('Turno', '', TRUE);
        $this->Turno->update($_POST);
		redirect('turnos');
	}
}

?>