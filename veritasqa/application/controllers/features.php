<?php
class Features extends CI_Controller{
	function index($id){
		 $data = $this->base->getBaseArray();
        if($this->session->userdata('rol') == '' || $this->session->userdata('rol') == 'usuario')
            redirect('login/denied');
        $data['userstring'] = "Bienvenido ".$this->session->userdata('nombre')." ".$this->session->userdata('apellidos');
            $this->load->view("header_general", $data);
            $this->load->model("Feature", '', TRUE);

       
        	$data['features']=$this->Feature->getFeatures($id);
			$data['id'] = $id;
            $this->load->view("features", $data);
            $this->load->view("footer_general");
		
	}
	
	function nueva($id){
		      $data = $this->base->getBaseArray();
        if($this->session->userdata('rol') == '')
            redirect('login/denied');
        $data['userstring'] = "Bienvenido ".$this->session->userdata('nombre')." ".$this->session->userdata('apellidos');
		$data['id'] = $id;
        $this->load->view("header_general", $data);
        $this->load->view("new_feature", $data);
        $this->load->view("footer_general"); 
	}
	
	function saveNew(){
		$data = $_POST;
		$this->load->model("Feature");
		$this->Feature->SaveNew($data);
		redirect("features/index/".$_POST['id']);
	}
	
	function edit($id, $ndp){
		      $data = $this->base->getBaseArray();
        if($this->session->userdata('rol') == '')
            redirect('login/denied');
        $data['userstring'] = "Bienvenido ".$this->session->userdata('nombre')." ".$this->session->userdata('apellidos');
		$data['id'] = $id;
		$this->load->model('Feature');
		$data['feature'] = $this->Feature->getFeature($id);
		$data['ndp']=$ndp;
        $this->load->view("header_general", $data);
        $this->load->view("edit_feature", $data);
        $this->load->view("footer_general"); 
	}
	
	function update(){
		$nombre = $_POST['nombre'];
		$codigo = $_POST['codigo'];
		$udm = $_POST['udm'];
		$ndp = $_POST['ndp'];
		$media = $_POST['media'];
		$tolerancia = $_POST['tolerancia'];
		$this->load->model("Feature");
		$this->Feature->update($_POST);
		redirect('features/index/'.$ndp);
	}
	
	function delete($id, $ndp){
       $this->db->query("DELETE FROM ndp_feature WHERE idndp_feature = $id");
       redirect('features/index/'.$ndp);

	}
}
?>