<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CResumen extends CI_Controller {

	public function __construct() {
        parent::__construct();
       
		// Load database
        $this->load->model('MResumen');
        $this->load->model('MFondoPersonal');
        $this->load->model('MCuentas');
		
    }
	
	public function index()
	{
		$this->load->view('base');
		$data['listar'] = $this->MResumen->obtener();
		$data['cuentas'] = $this->MCuentas->obtener();
		$data['capital_pendiente'] = $this->MResumen->capitalPendiente();
		//~ $data['capital_aprobado'] = $this->MResumen->capitalAprobado();
		$this->load->view('resumen/resumen', $data);
		
		//~ //Cuarta opción
		//~ $get = file_get_contents("https://openexchangerates.org/api/latest.json?app_id=65148900f9c2443ab8918accd8c51664");
		//~ // Se decodifica la respuesta JSON
		//~ $exchangeRates = json_decode($get);
		//~ // print_r($exchangeRates);
		//~ // Ahora se puede acceder a los datos parseados
		//~ echo '<h3>openexchangerates (based on Yahoo):</h3> <i>1 USD</i> equivale a <i>' . $exchangeRates->rates->EUR . ' EUR</i>';
		//~ exit();
		
		$this->load->view('footer');
	}
	
	public function ajax_resumen()
    {
        $result = $this->MCuentas->obtener();
        echo json_encode($result);
    }
    
	public function fondos_json($status)
    {
        $result = $this->MResumen->fondos_json($status);
        echo json_encode($result);
    }	
	
}
