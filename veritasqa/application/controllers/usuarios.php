<?php
class Usuarios extends CI_Controller{
    function index(){
          $data = $this->base->getBaseArray();
        if($this->session->userdata('rol') == '' || $this->session->userdata('rol') == 'usuario')
            redirect('login/denied');
        $data['userstring'] = "Bienvenido ".$this->session->userdata('nombre')." ".$this->session->userdata('apellidos');
            $this->load->view("header_general", $data);
            $this->load->model("Usuario", '', TRUE);
            $data['usuarios']=$this->Usuario->getUsuarios();
            $this->load->view("usuarios", $data);
            $this->load->view("footer_general");
    }
    
    function nuevo(){
          $data = $this->base->getBaseArray();
        if($this->session->userdata('rol') == '' || $this->session->userdata('rol') == 'usuario')
            redirect('login/denied');
        $data['userstring'] = "Bienvenido ".$this->session->userdata('nombre')." ".$this->session->userdata('apellidos');
            $this->load->view("header_general", $data);
            $this->load->model("Usuario", '', TRUE);
            $this->load->model("Area", '', TRUE);
            $data['areas']=$this->Area->getAreas();
            $this->load->view("new_usuario", $data);
            $this->load->view("footer_general"); 
    }
    
    function saveUsuario(){
        $this->load->model('Usuario', '', TRUE);
        $this->Usuario->saveUsuario($_POST);
        redirect('usuarios');
    }
    
    function edit($id){
          $data = $this->base->getBaseArray();
        if($this->session->userdata('rol') == '' || $this->session->userdata('rol') == 'usuario')
            redirect('login/denied');
        $data['userstring'] = "Bienvenido ".$this->session->userdata('nombre')." ".$this->session->userdata('apellidos');
          $data['idusuario']=$id;
          $this->load->view("header_general", $data);
          $this->load->model("Usuario", '', TRUE);
          $data['usuario']=$this->Usuario->getUsuario($id);
        $this->load->model("Area", '', TRUE);
        $data['areas']=$this->Area->getAreas();
          $this->load->view("edit_usuario", $data);
          $this->load->view("footer_general"); 
    }
    
    function editUsuario(){
        $this->load->model('Usuario', '', TRUE);
        $this->Usuario->update($_POST);
        redirect('usuarios');
    }
    
    function delete($id){
        $this->db->query("DELETE FROM usuario WHERE idusuario = $id");
        redirect('usuarios');
    }
	
	function qr($id){
         $data = $this->base->getBaseArray();
		 if($this->session->userdata('rol') == '' || $this->session->userdata('rol') == 'usuario')
            redirect('login/denied');
        $data['userstring'] = "Bienvenido ".$this->session->userdata('nombre')." ".$this->session->userdata('apellidos');
		$hashedid = md5($id);
         $data['path'] =  "http://".QRPATH."/?data=".site_url("login/hashlogin/$hashedid");
        $data['path2'] = "http://".QRPATH."/index2.php?data=".site_url("login/hashlogin/$hashedid");
         $this->load->view("header_general", $data);
         $this->load->view("qrGen", $data);
         $this->load->view("footer_general");
        
    }
} 
?>
