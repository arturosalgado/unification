<?php
class Producciones extends CI_Controller{
    function index(){
          $data = $this->base->getBaseArray();
        if($this->session->userdata('rol') == '' || $this->session->userdata('rol') == 'usuario')
            redirect('login/denied');
        $data['userstring'] = "Bienvenido ".$this->session->userdata('nombre')." ".$this->session->userdata('apellidos');
            $this->load->view("header_general", $data);
			
			$this->load->model("Linea", '', TRUE);
            $data['lineas']=$this->Linea->getLineas();
			$this->load->model("Turno", '', TRUE);
			$data['turnos'] = $this->Turno->getTurnos();
            $this->load->view("new_produccion", $data);
			
            $this->load->model("Produccion", '', TRUE);
            $data['producciones']=$this->Produccion->getNonCaptuded();
            $this->load->view("producciones", $data);
            $this->load->view("footer_general");
    }
	
	function nueva(){
          $data = $this->base->getBaseArray();
        if($this->session->userdata('rol') == '' || $this->session->userdata('rol') == 'usuario')
            redirect('login/denied');
        $data['userstring'] = "Bienvenido ".$this->session->userdata('nombre')." ".$this->session->userdata('apellidos');
            $this->load->view("header_general", $data);
            $this->load->model("Linea", '', TRUE);
            $data['lineas']=$this->Linea->getLineas();
			$this->load->model("Turno", '', TRUE);
			$data['turnos'] = $this->Turno->getTurnos();
            $this->load->view("new_produccion", $data);
            $this->load->view("footer_general"); 
    }
    
    function saveNew(){
		try{
		echo "Debe elegir la linea del me&uacute; desplaegable (autocompletar) y verificar que haya un turno activo en el momento de la captura <a href='#' onclick='history.back()'>regresar</a>";
        $this->load->model('Produccion', '', TRUE);
        $this->Produccion->saveNew($_POST);
        redirect('producciones');
		}
		catch(Exception $error){
			echo "Debe elegir la linea del me&uacute; desplaegable (autocompletar) <a href='#' onclick='history.back()'>regresar</a> >"; 
		}
    }
	
	function delete($id){
		$this->db->query("DELETE from produccion where idproduccion = $id");
		redirect('producciones');
	}
	
	function update(){
		$this->load->model("Produccion", "", TRUE);
		$this->Produccion->update($_POST);
		redirect('producciones');
	}
	
	function edit($id){
		 $data = $this->base->getBaseArray();
        if($this->session->userdata('rol') == '' || $this->session->userdata('rol') == 'usuario')
            redirect('login/denied');
        $data['userstring'] = "Bienvenido ".$this->session->userdata('nombre')." ".$this->session->userdata('apellidos');
            $this->load->view("header_general", $data);
            $this->load->model("Produccion", '', TRUE);
            $data['produccion']=$this->Produccion->getProduccion($id);
			$this->load->model("Linea", '', TRUE);
            $data['lineas']=$this->Linea->getLineas();
            $this->load->view("edit_produccion", $data);
            $this->load->view("footer_general"); 
	}

}
?>