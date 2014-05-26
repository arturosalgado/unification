<?php
class Test extends CI_Controller{
	function ndp(){
		$this->load->model("Ndp");
		$this->Ndp->getActivos();
	}
}
?>