<?php
  class Reportes extends CI_Controller {
    function index(){
        $data = $this->base->getBaseArray();
        if($this->session->userdata('rol') == '')
            redirect('login/denied');
        $data['userstring'] = "Bienvenido ".$this->session->userdata('nombre')." ".$this->session->userdata('apellidos');
		
	   $data = $this->base->getBaseArray();
       $this->load->view("headermobile", $data);
	   $this->load->model('Ndp');
	   $data['ndps'] = $this->Ndp->getOrderedNdps();
       $this->load->view("selector_repo", $data);
       $this->load->view("footer_general"); 
    }   
    
	function nodata(){
		 $data = $this->base->getBaseArray();
        if($this->session->userdata('rol') == '')
            redirect('login/denied');
        $data['userstring'] = "Bienvenido ".$this->session->userdata('nombre')." ".$this->session->userdata('apellidos');
		
	   $data = $this->base->getBaseArray();
       $this->load->view("headermobile", $data);
	   $this->load->view("nodata", $data);
       $this->load->view("footer_general"); 
	}
	
    function general(){
        $data = $this->base->getBaseArray();
        if($this->session->userdata('rol') == '')
            redirect('login/denied');
        $data['userstring'] = "Bienvenido ".$this->session->userdata('nombre')." ".$this->session->userdata('apellidos');
        $this->load->view("header_general", $data);
        $this->load->model("Consulta","",TRUE);
        $data['consultas'] = $this->Consulta->getConsultas();
        $this->load->view("reporte_general", $data);
        $this->load->view("footer_general");   
    }
	
	function individual($id, $i_anio=0, $i_mes=0, $i_dia=0, $f_anio=0, $f_mes=0, $f_dia=0){
		$data = $this->base->getBaseArray();
        if($this->session->userdata('rol') == '')
            redirect('login/denied');
        $data['userstring'] = "Bienvenido ".$this->session->userdata('nombre')." ".$this->session->userdata('apellidos');
        $this->load->view("header_general", $data);
        $this->load->model("Consulta","",TRUE);
		$this->load->model("Feature");
		$this->load->model("Ndp");
		$data['ndp'] = $this->Ndp->getNdp($id);
        if($i_anio == 0 && $f_anio == 0)
			$data['capturas'] = $this->Consulta->getCapturas($id);
		else{
			$finicio = "$i_anio-$i_mes-$i_dia";
			$ffin = "$f_anio-$f_mes-$f_dia";
			$data['capturas'] = $this->Consulta->getFilteredCapturas($id, $finicio, $ffin);
		}
		if(count($data['capturas'])<2)
			redirect('reportes/nodata');
		$capturas = $this->Consulta->getCapturas($id);
		$data['featCount'] = $this->Consulta->getFeatCount($id);
		$featCount = $this->Consulta->getFeatCount($id);
		$data['features'] = $this->Feature->getFeatures($id);
		$features = $this->Feature->getFeatures($id);
		if($i_anio == 0 && $f_anio == 0)
			$consultas = $this->Consulta->getCapturas($id);
		else{
			$finicio = "$i_anio-$i_mes-$i_dia";
			$ffin = "$f_anio-$f_mes-$f_dia";
			$consultas = $this->Consulta->getFilteredCapturas($id, $finicio, $ffin);
		}
			
		$datos = array();
		foreach($consultas as $c){
			$datos[$c['idcaptura']] = $this->Consulta->getDatos($c['idcaptura']);
		}
		
		$data['datos'] = $datos;
		//generando los datos para la grafica por característica
		$this->load->library('jpgraph');
		for($i=0; $i<$featCount; $i++){
			$title = "Característica: ".$features[$i]['codigo'];
			$datosg = array();
			$j=0;
			$limiteSuperior = $features[$i]['media']+$features[$i]['tolerancia'];
			$limiteInferior = $features[$i]['media']-$features[$i]['tolerancia'];
			$lsarray = array();
			$liarray = array();
			foreach($capturas as $cap){
					$c=$cap['idcaptura']; 
					if(isset($datos[$c][$i]['valor'])){
						$datosg[$j] = $datos[$c][$i]['valor'];
						$lsarray[$j] = $limiteSuperior;
						$liarray[$j] = $limiteInferior;
						$j++;
					}
			}

			$graph = $this->jpgraph->linechart($datosg, $title, $limiteInferior-1, $limiteSuperior+1); 
			$graph->xaxis->SetTextLabelInterval(5);
			$p1 = new LinePlot($lsarray);
			$graph->Add($p1);
			$p1->SetColor("#DD06A0");
			$p1->SetLegend('Límitie de Control Superior: '.$limiteSuperior);
			
			$p2 = new LinePlot($liarray);
			$graph->Add($p2);
			$p2->SetColor("#FF0000");
			$p2->SetLegend('Límite de Control Inferior: '.$limiteInferior);
			
			if(file_exists('./docs/graph/graph'.$i.'.png')){
				$file = fopen('./docs/graph/graph'.$i.'.png', 'w');
				fclose($file);
				unlink('./docs/graph/graph'.$i.'.png');
			}
		$graph->Stroke('./docs/graph/graph'.$i.'.png');  // create the graph and write to file
		}
		

        $this->load->view("reporte_individual", $data);
        $this->load->view("footer_general");	
	}
	
  }
?>
