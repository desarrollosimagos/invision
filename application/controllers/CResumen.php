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
		$data['capital_aprobado'] = $this->MResumen->capitalAprobado();
		$this->load->view('resumen/resumen', $data);
		
		//~ function currencyConverter($from_Currency,$to_Currency,$amount) {
			//~ $from_Currency = urlencode($from_Currency);
			//~ $to_Currency = urlencode($to_Currency);
			//~ $encode_amount = 1;
			//~ $get = file_get_contents("https://www.google.com/finance/converter?a=$encode_amount&from=$from_Currency&to=$to_Currency");
			//~ // $get = file_get_contents("http://www.xe.com/es/currencyconverter/convert/?Amount=1&From=USD&To=EUR");
			//~ $get = explode("<span class=bld>",$get);
			//~ $get = explode("</span>",$get[1]);
			//~ $converted_currency = preg_replace("/[^0-9.]/", null, $get[0]);
			//~ return $converted_currency;
			//~ // return $get;
		//~ }
//~ 
		//~ // change amount according to your needs
		//~ $amount =10;
		//~ // change From Currency according to your needs
		//~ $from_Curr = "INR";
		//~ // change To Currency according to your needs
		//~ $to_Curr = "USD";
		//~ $converted_currency=currencyConverter($from_Curr, $to_Curr, $amount);
		//~ // Print outout
		//~ echo $converted_currency;
		
		$this->load->view('footer');
	}
	
	// Método para actualizar
    public function update() {
		
		$datos = array(
			'id' => $this->input->post('id'),
			'cuenta' => $this->input->post('cuenta'),
			'numero' => $this->input->post('numero'),
			'user_id' => $this->session->userdata('logged_in')['id'],
            'tipo' => $this->input->post('tipo'),
            'descripcion' => $this->input->post('descripcion'),
            'monto' => $this->input->post('monto'),
            'status' => $this->input->post('status'),
            'd_update' => date('Y-m-d H:i:s')
		);
		
        $result = $this->MCuentas->update($datos);
        
        if ($result) {
			
			echo '{"response":"ok"}';
			
        }else{
			
			echo '{"response":"error"}';
			
		}
    }
	
	public function ajax_resumen()
    {
        $result = $this->MCuentas->obtener();
        echo json_encode($result);
    }
	
	
}
