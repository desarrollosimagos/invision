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
		$data['fondo_usuarios'] = $this->fondos_json_users();
		$data['fondo_proyectos'] = $this->fondos_json_projects();
		$this->load->view('resumen/resumen', $data);
		
		$this->load->view('footer');
	}
	
	public function ajax_resumen()
    {
        $result = $this->MCuentas->obtener();
        echo json_encode($result);
    }
    
	public function fondos_json()
    {
        $result = $this->MResumen->fondos_json();
        echo json_encode($result);
    }	
    
	public function fondos_json_users()
    {
		// Obtenemos el valor en dólares de las disitntas divisas
		$get = file_get_contents("https://openexchangerates.org/api/latest.json?app_id=65148900f9c2443ab8918accd8c51664");
		// Se decodifica la respuesta JSON
		$exchangeRates = json_decode($get, true);
		// Con el segundo argumento lo decodificamos como un arreglo multidimensional y no como un arreglo de objetos
		
		
		$currency_user = $exchangeRates['rates'][$this->session->userdata('logged_in')['coin_iso']];  // Tipo de moneda del usuario logueado
		
        
        $resumen_users = array();  // Para el resultado final (Listado de usuarios con sus respectivos resúmenes)
        
        $fondos_details = $this->MResumen->fondos_json_users();  // Listado de fondos detallados
        
        $ids_users = array();  // Para almacenar los ids de los usuarios que han registrado fondos
        
        // Colectamos los ids de los usuarios
        foreach($fondos_details as $fondo){
			
			if(!in_array($fondo->user_id, $ids_users)){
				$ids_users[] = $fondo->user_id;
			}
			
		}
		
		// Armamos una lista de fondos por usuario y lo almacenamos en el arreglo '$resumen_users'
		foreach($ids_users as $id_user){
			
			$resumen_user = array(
				'name' => '',
				'lastname' => '',
				'username' => '',
				'pending_capital' => 0,
				'pending_entry' => 0,
				'pending_exit' => 0,
				'approved_capital' => 0,
				'capital_invested' => 0,
				'returned_capital' => 0
			);
			
			foreach($fondos_details as $fondo){
				
				if($fondo->user_id == $id_user){
					
					// Conversión de cada monto a dólares
					$currency = $fondo->coin_avr;  // Tipo de moneda de la transacción
					$trans_usd = (float)$fondo->monto/$exchangeRates['rates'][$currency];
					
					$resumen_user['name'] = $fondo->name;
					$resumen_user['lastname'] = $fondo->lastname;
					$resumen_user['username'] = $fondo->username;
					if($fondo->status == 'waiting'){
						if($fondo->tipo == 'deposit'){
							$resumen_user['pending_capital'] += $trans_usd;
							$resumen_user['pending_entry'] += $trans_usd;
						}else if($fondo->tipo == 'withdraw'){
							$resumen_user['pending_capital'] -= $trans_usd;
							$resumen_user['pending_exit'] += $trans_usd;
						}
					}
					if($fondo->status == 'approved'){
						if($fondo->tipo == 'deposit'){
							$resumen_user['approved_capital'] += $trans_usd;
						}else if($fondo->tipo == 'withdraw'){
							$resumen_user['approved_capital'] -= $trans_usd;
						}
					}
				}
				
			}
			
			$decimals = 2;
			if($this->session->userdata('logged_in')['coin_decimals'] != ""){
				$decimals = $this->session->userdata('logged_in')['coin_decimals'];
			}
			$symbol = $this->session->userdata('logged_in')['coin_symbol'];
			
			// Conversión de los montos a la divisa del usuario
			$resumen_user['pending_capital'] *= $currency_user; 
			$resumen_user['pending_capital'] = round($resumen_user['pending_capital'], $decimals);
			$resumen_user['pending_capital'] = $resumen_user['pending_capital']." ".$symbol;
			
			$resumen_user['pending_entry'] *= $currency_user; 
			$resumen_user['pending_entry'] = round($resumen_user['pending_entry'], $decimals);
			$resumen_user['pending_entry'] = $resumen_user['pending_entry']." ".$symbol;
			
			$resumen_user['pending_exit'] *= $currency_user; 
			$resumen_user['pending_exit'] = round($resumen_user['pending_exit'], $decimals);
			$resumen_user['pending_exit'] = $resumen_user['pending_exit']." ".$symbol;
			
			$resumen_user['approved_capital'] *= $currency_user; 
			$resumen_user['approved_capital'] = round($resumen_user['approved_capital'], $decimals);
			$resumen_user['approved_capital'] = $resumen_user['approved_capital']." ".$symbol;
			
			$resumen_users[] = $resumen_user;
			
		}
		
        return json_decode(json_encode($resumen_users), false);  // Esto retorna un arreglo de objetos
    }	
    
	public function fondos_json_projects()
    {
		// Obtenemos el valor en dólares de las disitntas divisas
		$get = file_get_contents("https://openexchangerates.org/api/latest.json?app_id=65148900f9c2443ab8918accd8c51664");
		// Se decodifica la respuesta JSON
		$exchangeRates = json_decode($get, true);
		// Con el segundo argumento lo decodificamos como un arreglo multidimensional y no como un arreglo de objetos
		
		$currency_user = $exchangeRates['rates'][$this->session->userdata('logged_in')['coin_iso']];  // Tipo de moneda del usuario logueado
        
        $fondos_details = $this->MResumen->fondos_json_projects();  // Listado de fondos detallados
		
		$resumen = array(
			'capital_invested' => 0,
			'returned_capital' => 0,
			'retirement_capital_available' => 0
		);
			
		foreach($fondos_details as $fondo){
				
			// Conversión de cada monto a dólares
			$currency = $fondo->coin_avr;  // Tipo de moneda de la transacción
			$trans_usd = (float)$fondo->monto/$exchangeRates['rates'][$currency];
			
			if($fondo->status == 'approved'){
				if($fondo->tipo == 'deposit'){
					$resumen['capital_invested'] += $trans_usd;
					$resumen['retirement_capital_available'] += $trans_usd;
				}else if($fondo->tipo == 'profit'){
					$resumen['returned_capital'] += $trans_usd;
					$resumen['retirement_capital_available'] += $trans_usd;
				}else if($fondo->tipo == 'expense'){
					$resumen['retirement_capital_available'] -= $trans_usd;
				}else if($fondo->tipo == 'withdraw'){
					$resumen['retirement_capital_available'] -= $trans_usd;
				}
			}
			
		}
		
		$decimals = 2;
		if($this->session->userdata('logged_in')['coin_decimals'] != ""){
			$decimals = $this->session->userdata('logged_in')['coin_decimals'];
		}
		$symbol = $this->session->userdata('logged_in')['coin_symbol'];
		
		// Conversión de los montos a la divisa del usuario
		$resumen['capital_invested'] *= $currency_user; 
		$resumen['capital_invested'] = round($resumen['capital_invested'], $decimals);
		$resumen['capital_invested'] = $resumen['capital_invested']." ".$symbol;
		
		$resumen['returned_capital'] *= $currency_user; 
		$resumen['returned_capital'] = round($resumen['returned_capital'], $decimals);
		$resumen['returned_capital'] = $resumen['returned_capital']." ".$symbol;
		
		$resumen['retirement_capital_available'] *= $currency_user; 
		$resumen['retirement_capital_available'] = round($resumen['retirement_capital_available'], $decimals);
		$resumen['retirement_capital_available'] = $resumen['retirement_capital_available']." ".$symbol;
		
        return json_decode(json_encode($resumen), false);  // Esto retorna un arreglo de objetos
    }	
	
}
