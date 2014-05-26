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
		$this->load->model('Turno');
		$data['turnos'] = $this->Turno->getTurnos();
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
	
	function edit($id){
		$data = $this->base->getBaseArray();
        if($this->session->userdata('rol') == '' || $this->session->userdata('rol') == 'usuario')
            redirect('login/denied');
        $data['userstring'] = "Bienvenido ".$this->session->userdata('nombre')." ".$this->session->userdata('apellidos');
        $data['idndp']=$id;
		$data['id'] = $id;
		$this->load->model("Turno");
		$data['turnos'] = $this->Turno->getTurnos();
        $this->load->view("header_general", $data);
        $this->load->model("Ndp", '', TRUE);
        $data['ndp']=$this->Ndp->getNdp($id);
        $this->load->view("edit_ndp", $data);
        $this->load->view("footer_general"); 
	}
	
	function editNew($id){
		$this->load->model('Ndp', '', TRUE);
        $this->Ndp->update($_POST);
        $this->load->library('upload');
		
		var_dump($_POST);
		echo "</hr>";
		var_dump($_FILES);
		
		//imagen
		if(isset($_FILES['imagen'])){
			$this->upload->do_upload("imagen");
			$_POST['file'] = $_FILES['imagen'];
			$this->Ndp->updateimg($_POST);
		}
		
        redirect('ndps');
	}
	
	function delete($id){
		$this->db->query("DELETE FROM ndp WHERE idndp = $id");
        redirect('ndps');
	}
	
	function qr($id){
		 $data = $this->base->getBaseArray();
		 if($this->session->userdata('rol') == '' || $this->session->userdata('rol') == 'usuario')
            redirect('login/denied');
        $data['userstring'] = "Bienvenido ".$this->session->userdata('nombre')." ".$this->session->userdata('apellidos');
         $data['path'] =  "http://localhost/phpqrcode/?data=".site_url("qa/capture/$id");
        $data['path2'] = "http://localhost/phpqrcode/index2.php?data=".site_url("qa/capture/$id");
         $this->load->view("header_general", $data);
         $this->load->view("qrGen", $data);
         $this->load->view("footer_general");
	}
}
?>