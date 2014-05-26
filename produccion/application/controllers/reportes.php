<?php
  class Reportes extends CI_Controller {
    function index(){
        $data = $this->base->getBaseArray();
        if($this->session->userdata('rol') == '' || $this->session->userdata('rol') == 'usuario')
            redirect('login/denied');
        $data['userstring'] = "Bienvenido ".$this->session->userdata('nombre')." ".$this->session->userdata('apellidos');
        $this->load->view("headermobile", $data);
        $this->load->view("reportes", $data);
        $this->load->view("footer_general");
    }   
    
    function general(){
        $data = $this->base->getBaseArray();
        if($this->session->userdata('rol') == '' || $this->session->userdata('rol') == 'usuario')
            redirect('login/denied');
        $data['userstring'] = "Bienvenido ".$this->session->userdata('nombre')." ".$this->session->userdata('apellidos');
        $this->load->view("headermobile", $data);
		$this->load->model("Linea");
		$data['lineas'] = $this->Linea->getLineas();
		$proyectos = $this->Linea->getProyectos();	
		$data['proyectos']= array();	
		foreach($proyectos as $p){
			$data['proyectos'][$p['proyecto']]= $this->Linea->getProjectLines($p['proyecto']);
		}
        $this->load->view("select_general", $data);
        $this->load->view("footer_general");   
    }
	
	function recaptura(){
        $data = $this->base->getBaseArray();
        if($this->session->userdata('rol') == '' || $this->session->userdata('rol') == 'usuario')
            redirect('login/denied');
        $data['userstring'] = "Bienvenido ".$this->session->userdata('nombre')." ".$this->session->userdata('apellidos');
        $this->load->view("headermobile", $data);
		$this->load->model("Captura");
		$data['recapturas'] = $this->Captura->getAllRecapturas();
        $this->load->view("select_recapturas", $data);
        $this->load->view("footer_general");   
    }
	
	function viewProyecto($nombre){
		//enconctamos los ids de las lineas del proyecto
		$data = $this->base->getBaseArray();
        if($this->session->userdata('rol') == '' || $this->session->userdata('rol') == 'usuario')
            redirect('login/denied');
        $data['userstring'] = "Bienvenido ".$this->session->userdata('nombre')." ".$this->session->userdata('apellidos');
        $this->load->view("headermobile", $data);
	}
	
	function viewgeneral($id, $i_dia=0, $i_mes=0, $i_anio=0, $f_dia=0, $f_mes=0, $f_anio=0){
		$data = $this->base->getBaseArray();
        if($this->session->userdata('rol') == '' || $this->session->userdata('rol') == 'usuario')
            redirect('login/denied');
        $data['userstring'] = "Bienvenido ".$this->session->userdata('nombre')." ".$this->session->userdata('apellidos');
        $this->load->view("headermobile", $data);
        $this->load->model("Captura","",TRUE);
		$this->load->model("Ndp","", TRUE);
		$this->load->model("Produccion","", TRUE);
		$this->load->model("Turno","", TRUE);
		$data['ndp'] = $this->Ndp->getNdp($id);
		$capturas = array();
		$stringfecha = "";
		if($i_anio == 0 && $f_anio == 0){
	        $capturas = $this->Captura->getCapturas($id);
		}
		else{
			$finicio = "$i_anio-$i_mes-$i_dia";
			$ffin = "$f_anio-$f_mes-$f_dia";
			$capturas = $this->Captura->getFilteredCapturas($id, $finicio, $ffin);
			$stringfecha = "Reporte del $i_dia de $i_mes del $i_anio al $f_dia de $f_mes del $f_anio";
		}
		//agregamos la captura de scrap a cada item correspondiente
		$this->load->model("Materiales");
		foreach($capturas as $k => $c){
			$scrap = $this->Materiales->getCapturadosCaptura($c['idcaptura']);
			$produccion = $this->Produccion->getProduccion($c['idproduccion']);
			$turno = $this->Turno->getTurno($produccion['idturno']);
			$capturas[$k]['scrap'] = $scrap;
			$capturas[$k]['produccion']=$produccion;
			$capturas[$k]['turno']=$turno;
		}
		$data['capturas'] = $capturas;
		$data['sfecha'] = $stringfecha;
        $this->load->view("view_ndp", $data);
		$this->load->view("footer_general");
        
	}
	
	function view_recapturas($id, $i_dia=0, $i_mes=0, $i_anio=0, $f_dia=0, $f_mes=0, $f_anio=0){
		$data = $this->base->getBaseArray();
        if($this->session->userdata('rol') == '' || $this->session->userdata('rol') == 'usuario')
            redirect('login/denied');
        $data['userstring'] = "Bienvenido ".$this->session->userdata('nombre')." ".$this->session->userdata('apellidos');
        $this->load->view("headermobile", $data);
        $this->load->model("Captura","",TRUE);
		$this->load->model("Linea","", TRUE);
		$this->load->model("Turno","",TRUE);
		$data['linea'] = $this->Linea->getLinea($id);
		$stringfecha = "";
		if($i_anio == 0 && $f_anio == 0){
	        $data['capturas'] = $this->Captura->getRecapturas($id);
		}else{
			$finicio = "$i_anio-$i_mes-$i_dia";
			$ffin = "$f_anio-$f_mes-$f_dia";
			$data['capturas'] = $this->Captura->getFilteredRecapturas($id, $finicio, $ffin);
			$stringfecha = "Reporte del $i_dia de $i_mes del $i_anio al $f_dia de $f_mes del $f_anio";
		}
		foreach($data['capturas'] as $k => $v){
			$data['capturas'][$k]['turno'] = $this->Turno->getTurno($data['capturas'][$k]['idturno']);
		}
		$data['sfecha'] = $stringfecha;
        $this->load->view("view_recapturas", $data);
		$this->load->view("footer_general");
        
	}
	
	function view_scrap($id, $i_dia=0, $i_mes=0, $i_anio=0, $f_dia=0, $f_mes=0, $f_anio=0){
		$data = $this->base->getBaseArray();
        if($this->session->userdata('rol') == '' || $this->session->userdata('rol') == 'usuario')
            redirect('login/denied');
        $data['userstring'] = "Bienvenido ".$this->session->userdata('nombre')." ".$this->session->userdata('apellidos');
        $this->load->view("headermobile", $data);
        $this->load->model("Captura","",TRUE);
		$this->load->model("Linea","", TRUE);
		$this->load->model("Error","", TRUE);
		$this->load->model("Materiales","", TRUE);
		$data['errores'] = $this->Error->getErrores();
		$data['materiales']=$this->Materiales->getCapturados($id);
		$data['linea'] = $this->Linea->getLinea($id);
		$stringfecha = "";
        if($i_anio == 0 && $f_anio == 0)
	        $data['capturas'] = $this->Captura->getCapturas($id);
		else{
			$finicio = "$i_anio-$i_mes-$i_dia";
			$ffin = "$f_anio-$f_mes-$f_dia";
			$data['capturas'] = $this->Captura->getFilteredCapturas($id, $finicio, $ffin);
			$stringfecha = "Reporte del $i_dia de $i_mes del $i_anio al $f_dia de $f_mes del $f_anio";
		}
		$data['sfecha'] = $stringfecha;
        $this->load->view("view_scrap", $data);
		$this->load->view("footer_general");
        
	}
	
	function operador(){
		$data = $this->base->getBaseArray();
        if($this->session->userdata('rol') == '' || $this->session->userdata('rol') == 'usuario')
            redirect('login/denied');
        $data['userstring'] = "Bienvenido ".$this->session->userdata('nombre')." ".$this->session->userdata('apellidos');
        $this->load->view("headermobile", $data);
        $this->load->view("select_operador");
        $this->load->view("footer_general");   
	}
	
	function viewoperador(){
		$data = $this->base->getBaseArray();
        if($this->session->userdata('rol') == '' || $this->session->userdata('rol') == 'usuario')
            redirect('login/denied');
        $data['userstring'] = "Bienvenido ".$this->session->userdata('nombre')." ".$this->session->userdata('apellidos');
        $this->load->view("header_general", $data);
        $this->load->view("view_operador");
        $this->load->view("footer_general");
	}
	
	function view_captura($idcaptura){
		$data = $this->base->getBaseArray();
        if($this->session->userdata('rol') == '' || $this->session->userdata('rol') == 'usuario')
            redirect('login/denied');
        $data['userstring'] = "Bienvenido ".$this->session->userdata('nombre')." ".$this->session->userdata('apellidos');
        $this->load->view("header_general", $data);
		$this->load->model("Captura");
		$data['captura'] = $this->Captura->getCaptura($idcaptura); 
		$this->load->model("Materiales");
		$data['materiales']=$this->Materiales->getCapturadosCaptura($idcaptura);
		$this->load->model('Linea');
		$data['linea'] = $this->Linea->getLinea($data['captura']['idlinea']);
		$this->load->model('Produccion');
		$data['produccion'] = $this->Produccion->getProduccion($data['captura']['idproduccion']);
		$this->load->model('Turno');
		$data['turno'] = $this->Turno->getTurno($data['produccion']['idturno']);
		$this->load->model('Error');
		$data['errores'] = $this->Error->getErrores();
        $this->load->view("view_captura", $data);
        $this->load->view("footer_general");
	}
	
	function view_captura2($idcaptura){
		$data = $this->base->getBaseArray();
        if($this->session->userdata('rol') == '' || $this->session->userdata('rol') == 'usuario')
            redirect('login/denied');
        $data['userstring'] = "Bienvenido ".$this->session->userdata('nombre')." ".$this->session->userdata('apellidos');
		$this->load->model("Captura");
		$data['captura'] = $this->Captura->getCaptura($idcaptura); 
		$this->load->model("Materiales");
		$data['materiales']=$this->Materiales->getCapturadosCaptura($idcaptura);
		$this->load->model('Linea');
		$data['linea'] = $this->Linea->getLinea($data['captura']['idlinea']);
		$this->load->model('Produccion');
		$data['produccion'] = $this->Produccion->getProduccion($data['captura']['idproduccion']);
		$this->load->model('Turno');
		$data['turno'] = $this->Turno->getTurno($data['produccion']['idturno']);
		$this->load->model('Error');
		$data['errores'] = $this->Error->getErrores();
        $this->load->view("view_captura", $data);
	}
	
	function scrap(){
		$data = $this->base->getBaseArray();
        if($this->session->userdata('rol') == '' || $this->session->userdata('rol') == 'usuario')
            redirect('login/denied');
        $data['userstring'] = "Bienvenido ".$this->session->userdata('nombre')." ".$this->session->userdata('apellidos');
        $this->load->view("headermobile", $data);
		$this->load->model("Linea");
		$data['lineas'] = $this->Linea->getLineas();
        $this->load->view("select_scrap", $data);
        $this->load->view("footer_general");   
	}
	
	function individual($idLinea){
		
		$this->load->model("Linea");
		$data['linea'] = $this->Linea->getLinea($idLinea);
		$this->load->model("Captura");
		$data['capturas'] = $this->Captura->getCapturas($idLinea);
        $this->load->view("reportelinea", $data);
        $this->load->view("footer_general");
	}
	
	function turnos(){
		$data = $this->base->getBaseArray();
        if($this->session->userdata('rol') == '' || $this->session->userdata('rol') == 'usuario')
            redirect('login/denied');
        $data['userstring'] = "Bienvenido ".$this->session->userdata('nombre')." ".$this->session->userdata('apellidos');
        $this->load->view("headermobile", $data);
		$this->load->model("Turno");
		$data['turnos'] = $this->Turno->getTurnos();
        $this->load->view("select_scrapfecha", $data);
        $this->load->view("footer_general");
	}
	
	
	function capturas(){
		$data = $this->base->getBaseArray();
        if($this->session->userdata('rol') == '' || $this->session->userdata('rol') == 'usuario')
            redirect('login/denied');
        $data['userstring'] = "Bienvenido ".$this->session->userdata('nombre')." ".$this->session->userdata('apellidos');
        $this->load->view("headermobile", $data);
		$this->load->model("Linea");
		$data['lineas'] = $this->Linea->getLineas();
		$this->load->model("Captura");
		$this->load->model("Produccion");
		$data['capturas'] = $this->Captura->getAllCapturas();
		foreach($data['capturas'] as $k => $v){
			if($v['idlinea'] != "0" && $v['idlinea'] != "" && $v['idlinea'] != NULL)
				$data['capturas'][$k]['linea'] = $this->Linea->getLinea($v['idlinea']);
			if($v['idproduccion'] != "0" && $v['idproduccion'] != "" && $v['idproduccion'] != NULL)
				$data['produccion'][$k]['produccion'] = $this->Produccion->getProduccion($v['idproduccion']);
		}
        $this->load->view("select_captura", $data);
        $this->load->view("footer_general");
	}
	
	function view_scrapfecha(){
		$data = $this->base->getBaseArray();
        if($this->session->userdata('rol') == '' || $this->session->userdata('rol') == 'usuario')
            redirect('login/denied');
        $data['userstring'] = "Bienvenido ".$this->session->userdata('nombre')." ".$this->session->userdata('apellidos');
        $this->load->view("headermobile", $data);
		$fecha = $_POST['fecha'];
		$date_array = explode("/", $fecha);
		$fecha = $date_array[2]."-".$date_array[1]."-".$date_array[0];
		$idturno = $_POST['idturno'];
		//Obteniendo las producciones corridas en la fecha y turno indicado
		$result = $this->db->query("SELECT idcaptura FROM captura WHERE idproduccion IN (SELECT idproduccion from produccion WHERE fecha = '$fecha' AND idturno = $idturno)");
		$arreglo = $result->result_array();
		//Imprimiendo los reportes
		$this->load->view('back');
		foreach($arreglo as $a){
			$this->view_captura2($a['idcaptura']);
		}
		
		$this->load->view("footer_general");
	}
	
	
	function proyecto($nombre){
		$nombre = str_replace("%20"," ",$nombre);
		$data = $this->base->getBaseArray();
        if($this->session->userdata('rol') == '' || $this->session->userdata('rol') == 'usuario')
            redirect('login/denied');
        $data['userstring'] = "Bienvenido ".$this->session->userdata('nombre')." ".$this->session->userdata('apellidos');
        $this->load->view("headermobile", $data);
		$this->load->model("Linea");
		$data['lineas'] = $this->Linea->getProjectLines($nombre);
		$data['proyecto']=$nombre;
		$this->load->model("Captura");
		$this->load->model("Produccion");
		$this->load->model("Materiales");
		foreach($data['lineas'] as $key => $l){
			$data['lineas'][$key]['scrap'] = count($this->Materiales->getCapturados($l['idlinea']));
			$data['lineas'][$key]['capturas'] = $this->Captura->getCapturas($l['idlinea']);
			$k = 0;
			foreach($data['lineas'][$key]['capturas'] as $capid => $captura){
				$data['lineas'][$key]['capturas'][$capid]['produccion'] = $this->Produccion->getProduccion($data['lineas'][$key]['capturas'][$capid]['idproduccion']);
			}
		}
        $this->load->view("view_proyecto", $data);
        $this->load->view("footer_general");  
		
		
	}
	
  }
?>
