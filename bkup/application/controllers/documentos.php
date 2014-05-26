<?php
class Documentos extends CI_Controller{
    function index(){
            $data = $this->base->getBaseArray();
        if($this->session->userdata('rol') == '')
            redirect('login/denied');
        $data['userstring'] = "Bienvenido ".$this->session->userdata('nombre')." ".$this->session->userdata('apellidos');
            $this->load->view("header_general", $data);
            $this->load->model("Documento", '', TRUE);
			$filtro="";
       if(isset($_POST['fnombre']))
        if($_POST['fnombre']!="")
            $filtro = "documento.nombre LIKE '%".$_POST['fnombre']."%'";
        if(isset($_POST['fdescripcion']))
        if($_POST['fdescripcion']!="")
            $filtro .= " documento.descripcion LIKE '%".$_POST['fdescripcion']."%'";
        if(isset($_POST['fcreador']))
            if($_POST['fcreador']!="")
                $filtro .= " documento.creador LIKE '%".$_POST['fcreador']."%'";
        if(isset($_POST['flinea']))
            if($_POST['flinea']!="")
                $filtro .= " linea.nombre LIKE '%".$_POST['flinea']."%'";
        $data['filtro']=$filtro;

        if($this->session->userdata('rol') == 'usuario')
            $data['documentos']=$this->Documento->getDocumentosUsuario($filtro, $this->session->userdata('nombre')." ".$this->session->userdata('apellidos'));
        else if($this->session->userdata('rol') == 'sadmin')
            $data['documentos']=$this->Documento->getDocumentos($filtro);
        else if($this->session->userdata('rol') == 'admin')
            $data['documentos']=$this->Documento->getDocumentosAdmin($filtro, $this->session->userdata('idArea'));
            $this->load->view("documentos", $data);
            $this->load->view("footer_general");
    }
    
    function nuevo(){
          $data = $this->base->getBaseArray();
        if($this->session->userdata('rol') == '')
            redirect('login/denied');
        $data['userstring'] = "Bienvenido ".$this->session->userdata('nombre')." ".$this->session->userdata('apellidos');
            $this->load->view("header_general", $data);
            $this->load->model("Linea", '', TRUE);
            $data['lineas']=$this->Linea->getLineas();
            $this->load->model("Area", '', TRUE);
            $data['areas']=$this->Area->getAreas();
        $data['usuario'] = $this->session->userdata('nombre')." ".$this->session->userdata('apellidos');
            $this->load->view("new_documento", $data);
            $this->load->view("footer_general"); 
    }
    
    function saveNew(){
        $this->load->model('Documento', '', TRUE);
        $data = $_POST;
        $data['file'] = $_FILES['ruta'];
        $data['urls']=  $this->base->getBaseArray();
        $data['creador'] = $this->session->userdata('nombre')." ".$this->session->userdata('apellidos');
        //uploading
        $this->load->library('upload');
        $this->upload->do_upload("ruta");
        //saving the document
        $this->Documento->saveDocumento($data);
        redirect('documentos');
    }
    
    function edit($id){
          $data = $this->base->getBaseArray();
        if($this->session->userdata('rol') == '')
            redirect('login/denied');
        $data['userstring'] = "Bienvenido ".$this->session->userdata('nombre')." ".$this->session->userdata('apellidos');
          $data['iddocumento']=$id;
          $this->load->view("header_general", $data);
          $this->load->model("Linea", '', TRUE);
          $this->load->model("Documento", '', TRUE);
          $data['lineas']=$this->Linea->getLineas();
          $data['documento']=$this->Documento->getDocumento($id);
        $this->load->model("Area", '', TRUE);
        $data['areas']=$this->Area->getAreas();
          $this->load->view("edit_documento", $data);
          $this->load->view("footer_general"); 
    }
    
    function editDocumento(){
        $this->load->model('Documento', '', TRUE);
        $this->Documento->update($_POST);
        redirect('documentos');
    }
    
    function delete($id){
        if($this->session->userdata('rol') == '' || $this->session->userdata('rol') == 'usuario')
            redirect('login/denied');
        $this->db->query("DELETE FROM documento WHERE iddocumento = $id");
        redirect('documentos');
    }
    
    function qr($id){
         $data = $this->base->getBaseArray();
		 if($this->session->userdata('rol') == '' || $this->session->userdata('rol') == 'usuario')
            redirect('login/denied');
        $data['userstring'] = "Bienvenido ".$this->session->userdata('nombre')." ".$this->session->userdata('apellidos');
         $data['path'] =  "http://www.qr.hud.mx/?data=".site_url("viewdoc/view/$id");
         $this->load->view("header_general", $data);
         $this->load->view("qrGen", $data);
         $this->load->view("footer_general");
        
    }
} 
?>
