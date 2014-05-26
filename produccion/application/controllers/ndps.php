<?php
class Ndps extends CI_Controller{
	function index(){
          $data = $this->base->getBaseArray();
        if($this->session->userdata('rol') == '' || $this->session->userdata('rol') == 'usuario')
            redirect('login/denied');
        $data['userstring'] = "Bienvenido ".$this->session->userdata('nombre')." ".$this->session->userdata('apellidos');
            $this->load->view("header_general", $data);
            $this->load->model("Ndp", '', TRUE);

       
        	$data['ndps']=$this->Ndp->getNdps();
            $this->load->view("ndps", $data);
            $this->load->view("footer_general");
    }
	
	function nuevo(){
		$data = $this->base->getBaseArray();
        if($this->session->userdata('rol') == '' || $this->session->userdata('rol') == 'usuario')
            redirect('login/denied');
        $data['userstring'] = "Bienvenido ".$this->session->userdata('nombre')." ".$this->session->userdata('apellidos');
            $this->load->view("header_general", $data);
		$this->load->view("new_ndp", $data);
        $this->load->view("footer_general");
		
	}
	
	function saveNew(){
		
		$_POST['file'] = $_FILES['imagen'];
		$this->load->library('upload');
		$this->upload->do_upload('imagen');
		$this->load->model("Ndp");
		$this->Ndp->saveNdp($_POST);
		redirect('ndps');
	}
	
	function delete($id){
		$this->db->query("DELETE FROM ndp WHERE idndp = $id");
        redirect('lineas');
	}
}
?>