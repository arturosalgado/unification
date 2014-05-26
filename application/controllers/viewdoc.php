<?php
class ViewDoc extends CI_Controller{
    /*Muestra un documento pdf*/
	function view($id, $docpath=""){
	   $ip = $_SERVER['REMOTE_ADDR'];
       $data = $this->base->getBaseArray();
       $this->db->query("INSERT INTO `consulta` (`iddocumento`, `hora`, ip) VALUES ($id, NOW(), '$ip')");
       $this->load->view("headermobile", $data);
       
       $data['ruta']=$docpath;
	   $data['id'] = $id;
	   $data['redirect'] = site_url("viewdoc/view2/$id/$docpath");
       $this->load->view("viewDoc", $data);
       $this->load->view("footer_general"); 
    }
	
	/*funcion auxiliar para forzar la recarga de la página*/
	function view2($id, $docpath=""){
	   $ip = $_SERVER['REMOTE_ADDR'];
       $data = $this->base->getBaseArray();
       $this->db->query("INSERT INTO `consulta` (`iddocumento`, `hora`, ip) VALUES ($id, NOW(), '$ip')");
       $this->load->view("headermobile", $data);
       $this->load->model("Documento", '', TRUE);
       $data['ruta']=$docpath;
	   $data['id'] = $id;
       $this->load->view("viewDoc2", $data);
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
		 $data = $this->base->getBaseArray();
		 $this->load->view("headermobile", $data);
		 $data = $this->base->getBaseArray();
   		 $this->load->model("Documento", '', TRUE);
		 $data['id'] = $id;
    	 $data['ruta']=$this->Documento->getFirstPath($id);
         $data['links']=$this->Documento->getPaths($id);
		 $this->load->model("Linea", '', TRUE);
	     $data['linea'] = $this->Linea->getLinea($id);
         $data['imgpath'] = $this->Documento->getImgPath($id);
		 $data['imgpath2'] = $this->Documento->getImgPath2($id);
		 $this->load->view("listFiles", $data);
		 $this->load->view("footer_general");
		 
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
		 $data['imgpath2'] = $this->Documento->getImgPath2($id);
		 $this->load->view("listFiles", $data);
		 $this->load->view("footer_general");
	}
} 
?>
