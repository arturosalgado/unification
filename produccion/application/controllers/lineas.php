<?php
class Lineas extends CI_Controller{
    function index(){
          $data = $this->base->getBaseArray();
        if($this->session->userdata('rol') == '' || $this->session->userdata('rol') == 'usuario')
            redirect('login/denied');
        $data['userstring'] = "Bienvenido ".$this->session->userdata('nombre')." ".$this->session->userdata('apellidos');
            $this->load->view("header_general", $data);
            $this->load->model("Linea", '', TRUE);

        $filtro="";
       if(isset($_POST['fnombre']))
        if($_POST['fnombre']!="")
            $filtro = "l.nombre LIKE '%".$_POST['fnombre']."%'";
        if(isset($_POST['fdescripcion']))
        if($_POST['fdescripcion']!="")
            $filtro .= " l.descripcion LIKE '%".$_POST['fdescripcion']."%'";
        $data['filtro']=$filtro;
        $data['lineas']=$this->Linea->getLineas($filtro);
            $this->load->view("lineas", $data);
            $this->load->view("footer_general");
    }
    
    function nueva(){
          $data = $this->base->getBaseArray();
        if($this->session->userdata('rol') == '' || $this->session->userdata('rol') == 'usuario')
            redirect('login/denied');
        $data['userstring'] = "Bienvenido ".$this->session->userdata('nombre')." ".$this->session->userdata('apellidos');
            $this->load->view("header_general", $data);
            $this->load->model("Linea", '', TRUE);
            $this->load->model("Area", '', TRUE);
            $data['areas']=$this->Area->getAreas();
			$data['usuario'] = $this->session->userdata("nombre")." ".$this->session->userdata("apellidos");
            $this->load->view("new_linea", $data);
            $this->load->view("footer_general"); 
    }
    
    function saveLinea(){
        $this->load->model('Linea', '', TRUE);
        $_POST['file'] = $_FILES['imagen'];
       	//saving the whole thing in the db
		$this->Linea->saveLinea($_POST);

        redirect('lineas');
    }
    
    function edit($id){
          $data = $this->base->getBaseArray();
        if($this->session->userdata('rol') == '' || $this->session->userdata('rol') == 'usuario')
            redirect('login/denied');
        $data['userstring'] = "Bienvenido ".$this->session->userdata('nombre')." ".$this->session->userdata('apellidos');
          $data['idlinea']=$id;
          $this->load->view("header_general", $data);
          $this->load->model("Linea", '', TRUE);
          $this->load->model("Area", '', TRUE);
          $data['areas']=$this->Area->getAreas();

          $data['linea']=$this->Linea->getLinea($id);
          $this->load->view("edit_linea", $data);
          $this->load->view("footer_general"); 
    }
	
	function redirect(){
		$idLinea = $_POST['idlinea'];
		redirect('viewdoc/listview/'.$idLinea);
	}
    
    function editLinea(){
        $this->load->model('Linea', '', TRUE);
        $this->Linea->update($_POST);
        $this->load->library('upload');
		
		var_dump($_POST);
		echo "</hr>";
		var_dump($_FILES);
		
		//imagen
		if(isset($_FILES['imagen'])){
			$this->upload->do_upload("imagen");
			$_POST['file'] = $_FILES['imagen'];
			$this->Linea->updateimg($_POST);
		}
		
		//imagen 2
		if(isset($_FILES['imagen2'])){
			$this->upload->do_upload("imagen2");
			$_POST['file2'] = $_FILES['imagen2'];
			$this->Linea->updateimg2($_POST);
		}
		
        redirect('lineas');
    }
    
    function delete($id){
        $this->db->query("DELETE FROM linea WHERE idlinea = $id");
        redirect('lineas');
    }
} 
?>
