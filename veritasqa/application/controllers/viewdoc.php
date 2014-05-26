<?php
class ViewDoc extends CI_Controller{
    /*Muestra un documento pdf*/
	function view($id, $docpath=""){
	   $ip = $_SERVER['REMOTE_ADDR'];
       $data = $this->base->getBaseArray();
       $this->db->query("INSERT INTO `consulta` (`iddocumento`, `hora`, ip) VALUES ($id, NOW(), '$ip')");
       $this->load->view("headermobile", $data);
       $this->load->model("Documento", '', TRUE);
       $data['ruta']=$docpath;
	   $data['id'] = $id;
       $this->load->view("viewDoc", $data);
       $this->load->view("footer_general"); 
	  
    }
	/*Reproduce un video*/
	function vidView($id, $docpath=""){
       $ip = $_SERVER['REMOTE_ADDR'];
       $data = $this->base->getBaseArray();
       $this->db->query("INSERT INTO `consulta` (`iddocumento`, `hora`, ip) VALUES ($id, NOW(), '$ip')");
       $this->load->view("headermobile", $data);
       $this->load->model("Documento", '', TRUE);
	   $data['id'] = $id;
       $data['ruta']=$docpath;
       $this->load->view("viewVid", $data);
       $this->load->view("footer_general");
    }
	
	function listview($id){
		redirect("viewdoc/listview2/$id");
		 
	}
	
	function listview2($id){
	     $data = $this->base->getBaseArray();
		 $this->load->view("headermobile", $data);
		 $data = $this->base->getBaseArray();
   		 $this->load->model("Documento", '', TRUE);
		 $data['id'] = $id;
    	 $data['ruta']=$this->Documento->getFirstPath($id);
         $data['links']=$this->Documento->getPaths($id);
         $data['imgpath'] = $this->Documento->getImgPath($id);
		 $this->load->view("listFiles", $data);
		 $this->load->view("footer_general");
	}
} 
?>
