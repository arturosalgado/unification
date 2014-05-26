<?php
class ViewDoc extends CI_Controller{
    function view($id){
       $ip = $_SERVER['REMOTE_ADDR'];
            $data = $this->base->getBaseArray();
        if($this->session->userdata('rol') == '')
            $data['userstring'] = "Usuario Final";
        else
            $data['userstring'] = "Bienvenido ".$this->session->userdata('nombre')." ".$this->session->userdata('apellidos');
        $this->db->query("INSERT INTO `consulta` (`iddocumento`, `hora`, ip) VALUES ($id, NOW(), '$ip')");
            $this->load->view("header_general", $data);
            $this->load->model("Documento", '', TRUE);
            $data['ruta']=$this->Documento->getFirstPath($id);
            $data['links']=$this->Documento->getPaths($id);
            $this->load->view("viewDoc", $data);
            $this->load->view("footer_general");
    }
} 
?>
