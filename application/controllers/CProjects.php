<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CProjects extends CI_Controller {

	public function __construct() {
        parent::__construct();
       
		// Load database
        $this->load->model('MProjects');
        $this->load->model('MCoins');
		
    }
	
	public function index()
	{
		$this->load->view('base');
		
		$listar = array();
		
		$proyectos = $this->MProjects->obtener();
		
		foreach($proyectos as $proyecto ){
			
			// Proceso de búsqueda de fotos asociadas al proyecto
			$num_fotos = $this->MProjects->buscar_photos($proyecto->id);
			$num_fotos = count($num_fotos);
			
			// Proceso de búsqueda de notificaciones asociadas al proyecto
			$num_news = $this->MProjects->buscar_noticias($proyecto->id);
			$num_news = count($num_news);
			
			// Proceso de búsqueda de documentos asociados al proyecto
			$num_docs = $this->MProjects->buscar_documentos($proyecto->id);
			$num_docs = count($num_docs);
			
			// Proceso de búsqueda de lecturas recomendadas asociadas al proyecto
			$num_readings = $this->MProjects->buscar_lecturas($proyecto->id);
			$num_readings = count($num_readings);
			
			// Proceso de búsqueda de grupos de inversores asociados al proyecto
			$groups = $this->MProjects->buscar_grupos($proyecto->id);
			$groups_names = "";
			foreach($groups as $group){
				$groups_names .= $group->name.",";
			}
			$groups_names = substr($groups_names, 0, -1);
			
			// Proceso de búsqueda de transacciones asociados al proyecto para calcular el porcentaje recaudado
			$transacctions = $this->MProjects->buscar_transacciones($proyecto->id);
			if($proyecto->amount_r != null && $proyecto->amount_r > 0){
				$porcentaje = (float)$transacctions[0]->ingresos/(float)$proyecto->amount_r*100;
			}else{
				$porcentaje = "null";
			}
			
			$data_proyecto = array(
				'id' => $proyecto->id,
				'name' => $proyecto->name,
				'description' => $proyecto->description,
				'type' => $proyecto->type,
				'valor' => $proyecto->valor,
				'amount_r' => $proyecto->amount_r,
				'amount_min' => $proyecto->amount_min,
				'amount_max' => $proyecto->amount_max,
				'date' => $proyecto->date,
				'date_r' => $proyecto->date_r,
				'date_v' => $proyecto->date_v,
				'coin' => $proyecto->coin_avr." (".$proyecto->coin.")",
				'status' => $proyecto->status,
				'num_fotos' => $num_fotos,
				'num_news' => $num_news,
				'num_docs' => $num_docs,
				'num_readings' => $num_readings,
				'groups_names' => $groups_names,
				'percentage_collected' => $porcentaje
			);
			
			$listar[] = $data_proyecto;
			
		}
		
		// Conversión a objeto
		$listar = json_decode( json_encode( $listar ), false );
		
		$data['listar'] = $listar;		
		$this->load->view('projects/lista', $data);
		$this->load->view('footer');
	}
	
	public function register()
	{
		$this->load->view('base');
		$data['monedas'] = $this->MCoins->obtener();
		$data['project_types'] = $this->MProjects->obtenerTipos();
		$this->load->view('projects/registrar', $data);
		$this->load->view('footer');
	}
	
	// Método para guardar un nuevo registro
    public function add() {
		
		$fecha = $this->input->post('date');
		$fecha = explode("/", $fecha);
		$fecha = $fecha[2]."-".$fecha[1]."-".$fecha[0];
		
		$fecha_r = $this->input->post('date_r');
		$fecha_r = explode("/", $fecha_r);
		$fecha_r = $fecha_r[2]."-".$fecha_r[1]."-".$fecha_r[0];
		
		$fecha_v = $this->input->post('date_v');
		$fecha_v = explode("/", $fecha_v);
		$fecha_v = $fecha_v[2]."-".$fecha_v[1]."-".$fecha_v[0];
		
		$publico = false;
		if($this->input->post('public') == "on"){
			$publico = true;
		}
		
		$datos = array(
			'name' => $this->input->post('name'),
			'description' => $this->input->post('description'),
			'type' => $this->input->post('type'),
            'valor' => $this->input->post('valor'),
            'amount_r' => $this->input->post('amount_r'),
            'amount_min' => $this->input->post('amount_min'),
            'amount_max' => $this->input->post('amount_max'),
            'date' => $fecha,
            'date_r' => $fecha_r,
            'date_v' => $fecha_v,
            'public' => $publico,
            'coin_id' => $this->input->post('coin_id'),
            'status' => 1,
            //~ 'user_id' => $this->session->userdata('logged_in')['id'],
            'd_create' => date('Y-m-d H:i:s')
        );
        
        $result = $this->MProjects->insert($datos);
        
        // Si el proyecto fue registrado satisfactoriamente registramos las photos
        if ($result) {
			
			// Sección para el registro de las fotos en la ruta establecida para tal fin (assets/img/projects)
			$ruta = getcwd();  // Obtiene el directorio actual en donde se esta trabajando
			
			//~ // print_r($_FILES);
			$i = 0;
			
			$errors = 0;
			
			foreach($_FILES['imagen']['name'] as $imagen){
				
				if($imagen != ""){
					
					// Obtenemos la extensión
					$ext = explode(".",$imagen);
					$ext = $ext[1];
					$datos2 = array(
						'project_id' => $result,
						'photo' => "photo".($i+1)."_".$result.".".$ext,
						'd_create' => date('Y-m-d')
					);
					
					$insertar_photo = $this->MProjects->insert_photo($datos2);
					
					if (!move_uploaded_file($_FILES['imagen']['tmp_name'][$i], $ruta."/assets/img/projects/photo".($i+1)."_".$result.".".$ext)) {
						
						$errors += 1;
						
					}
					
					$i++;
				}
				
			}
			
			// Sección para el registro de los documentos en la ruta establecida para tal fin (assets/documents)
			$j = 0;
			
			$errors2 = 0;
			
			foreach($_FILES['documento']['name'] as $documento){
				
				if($documento != ""){
					
					// Obtenemos la extensión
					$ext = explode(".",$documento);
					$ext = $ext[1];
					$datos3 = array(
						'project_id' => $result,
						'description' => "document".($j+1)."_".$result.".".$ext,
						'd_create' => date('Y-m-d')
					);
					
					$insertar_documento = $this->MProjects->insert_document($datos3);
					
					if (!move_uploaded_file($_FILES['documento']['tmp_name'][$j], $ruta."/assets/documents/document".($j+1)."_".$result.".".$ext)) {
						
						$errors2 += 1;
						
					}
					
					$j++;
				}
				
			}
			
			// Sección para el registro de las lecturas recomendadas en la ruta establecida para tal fin (assets/readings)
			$k = 0;
			
			$errors3 = 0;
			
			foreach($_FILES['lectura']['name'] as $lectura){
				
				if($lectura != ""){
					
					// Obtenemos la extensión
					$ext = explode(".",$lectura);
					$ext = $ext[1];
					$datos4 = array(
						'project_id' => $result,
						'description' => "reading".($k+1)."_".$result.".".$ext,
						'd_create' => date('Y-m-d')
					);
					
					$insertar_lectura = $this->MProjects->insert_reading($datos4);
					
					if (!move_uploaded_file($_FILES['lectura']['tmp_name'][$k], $ruta."/assets/readings/reading".($k+1)."_".$result.".".$ext)) {
						
						$errors3 += 1;
						
					}
					
					$k++;
				}
				
			}
			
			if($errors > 0){
				
				echo '{"response":"error2"}';
				
			}else if($errors2 > 0){
				
				echo '{"response":"error3"}';
				
			}else if($errors3 > 0){
				
				echo '{"response":"error4"}';
				
			}else{
				
				echo '{"response":"ok"}';
				
			}
       
        }else{
			
			echo '{"response":"error1"}';
			
		}
    }
	
	// Método para ver detalles
    public function view() {
		
		$this->load->view('base');
        $data['id'] = $this->uri->segment(3);
        $data['ver'] = $this->MProjects->obtenerProyecto($data['id']);
        $data['fotos_asociadas'] = $this->MProjects->obtenerFotos($data['id']);
        $data['documentos_asociados'] = $this->MProjects->obtenerDocumentos($data['id']);
        $data['lecturas_asociadas'] = $this->MProjects->obtenerLecturas($data['id']);
        $data['project_types'] = $this->MProjects->obtenerTipos();
        $data['project_transactions'] = $this->MProjects->obtenerTransacciones($data['id']);
        $data['project_transactions_gen'] = $this->fondos_json_project($data['id']);
        $data['project_transactions_users'] = $this->fondos_json_users($data['id']);
		
		// Proceso de búsqueda de los inversores asociados al proyecto
		$investors = $this->MProjects->buscar_inversores($data['id']);
		$num_investors = count($investors);
		
		$data['investors'] = $investors;
		
		// Datos base de los inversores
		$data_investors = array();
		foreach($investors as $investor){
			$data_investors[] = array(
				'username' => $investor->username,
				'name_user' => $investor->name,
				'alias' => $investor->alias,
				'image' => $investor->image
			);
		}
		
		$data['data_investors'] = $data_investors;
		
		// Proceso de búsqueda de transacciones asociados al proyecto para calcular el porcentaje recaudado
		$transacctions = $this->MProjects->buscar_transacciones($data['id']);
		if($data['ver'][0]->amount_r != null && $data['ver'][0]->amount_r > 0){
			$porcentaje = (float)$transacctions[0]->ingresos/(float)$data['ver'][0]->amount_r*100;
		}else{
			$porcentaje = 0;
		}
		
		$data['porcentaje_r'] = $porcentaje;
		
        $this->load->view('projects/ver', $data);
		$this->load->view('footer');
    }
	
	// Método para editar
    public function edit() {
		
		$this->load->view('base');
        $data['id'] = $this->uri->segment(3);
        $data['editar'] = $this->MProjects->obtenerProyecto($data['id']);
        $data['monedas'] = $this->MCoins->obtener();
        $data['fotos_asociadas'] = $this->MProjects->obtenerFotos($data['id']);
        $data['documentos_asociados'] = $this->MProjects->obtenerDocumentos($data['id']);
        $data['lecturas_asociadas'] = $this->MProjects->obtenerLecturas($data['id']);
        $data['project_types'] = $this->MProjects->obtenerTipos();
        $this->load->view('projects/editar', $data);
		$this->load->view('footer');
    }
	
	// Método para actualizar
    public function update() {
		
		$fecha = $this->input->post('date');
		$fecha = explode("/", $fecha);
		$fecha = $fecha[2]."-".$fecha[1]."-".$fecha[0];
		
		$fecha_r = $this->input->post('date_r');
		$fecha_r = explode("/", $fecha_r);
		$fecha_r = $fecha_r[2]."-".$fecha_r[1]."-".$fecha_r[0];
		
		$fecha_v = $this->input->post('date_v');
		$fecha_v = explode("/", $fecha_v);
		$fecha_v = $fecha_v[2]."-".$fecha_v[1]."-".$fecha_v[0];
		
		$publico = false;
		if($this->input->post('public') == "on"){
			$publico = true;
		}
		
		$datos = array(
			'id' => $this->input->post('id'),
			'name' => $this->input->post('name'),
			'description' => $this->input->post('description'),
			'type' => $this->input->post('type'),
            'valor' => $this->input->post('valor'),
            'amount_r' => $this->input->post('amount_r'),
            'amount_min' => $this->input->post('amount_min'),
            'amount_max' => $this->input->post('amount_max'),
            'date' => $fecha,
            'date_r' => $fecha_r,
            'date_v' => $fecha_v,
            'public' => $publico,
            'coin_id' => $this->input->post('coin_id'),
            'd_update' => date('Y-m-d H:i:s')
		);
		
        $result = $this->MProjects->update($datos);
        
        if ($result) {
			
			// Sección para el registro del archivo en la ruta establecida para tal fin (assets/img/productos)
			$ruta = getcwd();  // Obtiene el directorio actual en donde se esta trabajando
			
			//~ print_r($_FILES);
			$i = 0;  // Indice de la imágen
			
			$errors = 0;
			
			foreach($_FILES['imagen']['name'] as $imagen){
				
				if($imagen != ""){
					
					// Obtenemos la extensión
					$ext = explode(".",$imagen);
					$ext = $ext[1];
					$datos2 = array(
						'project_id' => $_POST['id'],
						'photo' => "photo".($i+1)."_".$_POST['id'].".".$ext,
						'd_create' => date('Y-m-d')
					);
					
					//~ echo "photo".($i+1)."_".$_POST['id'].".".$ext;
					$insertar_photo = $this->MProjects->insert_photo($datos2);
					
					if (!move_uploaded_file($_FILES['imagen']['tmp_name'][$i], $ruta."/assets/img/projects/photo".($i+1)."_".$_POST['id'].".".$ext)) {
						
						$errors += 1;
						
					}
					
				}
				$i++;  // Incrementamos 
			}
			
			// Sección para el registro de los documentos en la ruta establecida para tal fin (assets/documents)
			$j = 0;
			
			$errors2 = 0;
			
			foreach($_FILES['documento']['name'] as $documento){
				
				if($documento != ""){
					
					// Obtenemos la extensión
					$ext = explode(".",$documento);
					$ext = $ext[1];
					$datos3 = array(
						'project_id' => $_POST['id'],
						'description' => "document".($j+1)."_".$_POST['id'].".".$ext,
						'd_create' => date('Y-m-d')
					);
					
					$insertar_documento = $this->MProjects->insert_document($datos3);
					
					if (!move_uploaded_file($_FILES['documento']['tmp_name'][$j], $ruta."/assets/documents/document".($j+1)."_".$_POST['id'].".".$ext)) {
						
						$errors2 += 1;
						
					}
					
					$j++;
				}
				
			}
			
			// Sección para el registro de las lecturas recomendadas en la ruta establecida para tal fin (assets/readings)
			$k = 0;
			
			$errors3 = 0;
			
			foreach($_FILES['lectura']['name'] as $lectura){
				
				if($lectura != ""){
					
					// Obtenemos la extensión
					$ext = explode(".",$lectura);
					$ext = $ext[1];
					$datos4 = array(
						'project_id' => $_POST['id'],
						'description' => "reading".($k+1)."_".$_POST['id'].".".$ext,
						'd_create' => date('Y-m-d')
					);
					
					$insertar_lectura = $this->MProjects->insert_reading($datos4);
					
					if (!move_uploaded_file($_FILES['lectura']['tmp_name'][$k], $ruta."/assets/readings/reading".($k+1)."_".$_POST['id'].".".$ext)) {
						
						$errors3 += 1;
						
					}
					
					$k++;
				}
				
			}
			
			if($errors > 0){
				
				echo '{"response":"error2"}';
				
			}else if($errors2 > 0){
				
				echo '{"response":"error3"}';
				
			}else if($errors3 > 0){
				
				echo '{"response":"error4"}';
				
			}else{
				
				echo '{"response":"ok"}';
				
			}
			
        }else{
			
			echo '{"response":"error1"}';
			
		}
    }
    
	// Método para eliminar
	function delete($id) {
		
		// Primero verificamos si está asociado a algún grupo
		$search_assoc = $this->MProjects->obtenerProyectoGrupo($id);
		
		if(count($search_assoc) > 0){
			
			echo '{"response":"existe"}';
			
		}else{
			
			$result = $this->MProjects->delete($id);
			
			if($result){
				
				echo '{"response":"ok"}';
				
			}else{
				
				echo '{"response":"error"}';
				
			}
			
		}
        
    }
    
    // Método que consulta las transacciones asociadas a un proyecto
    public function fondos_json_users($project_id)
    {
		
		$data_project = $this->MProjects->obtenerProyecto($project_id);  // Datos del proyecto
		
		// Obtenemos el valor en dólares de las disitntas divisas
		$get = file_get_contents("https://openexchangerates.org/api/latest.json?app_id=65148900f9c2443ab8918accd8c51664");
		// Se decodifica la respuesta JSON
		$exchangeRates = json_decode($get, true);
		// Con el segundo argumento lo decodificamos como un arreglo multidimensional y no como un arreglo de objetos
		
		// Valor de 1 btc en dólares
		$get2 = file_get_contents("https://api.coinmarketcap.com/v1/ticker/");
		$exchangeRates2 = json_decode($get2, true);
		// Con el segundo argumento lo decodificamos como un arreglo multidimensional y no como un arreglo de objetos
		$valor1btc = $exchangeRates2[0]['price_usd'];
		
		// Valor de 1 dólar en bolívares
		$get3 = file_get_contents("https://s3.amazonaws.com/dolartoday/data.json");
		$exchangeRates3 = json_decode($get3, true);
		// Con el segundo argumento lo decodificamos como un arreglo multidimensional y no como un arreglo de objetos
		$valor1vef = $exchangeRates3['USD']['transferencia'];
		
		if ($data_project[0]->coin_avr == 'BTC') {
		
			$currency_project = 1/(float)$valor1btc;  // Tipo de moneda del proyecto
			
		} else if($data_project[0]->coin_avr == 'VEF') {
		
			$currency_project = $valor1vef;  // Tipo de moneda del proyecto
		
		} else {
			
			$currency_project = $exchangeRates['rates'][$data_project[0]->coin_avr];  // Tipo de moneda del proyecto
			
		}
		
        
        $resumen_users = array();  // Para el resultado final (Listado de usuarios con sus respectivos resúmenes)
        
        $transactions = $this->MProjects->obtenerTransacciones($project_id);  // Listado de transacciones
        
        $ids_users = array();  // Para almacenar los ids de los usuarios que han registrado fondos
        
        // Colectamos los ids de los usuarios de las transacciones generales
        foreach($transactions as $fondo){
			
			if(!in_array($fondo->user_id, $ids_users)){
				$ids_users[] = $fondo->user_id;
			}
			
		}
		
		// Armamos una lista de fondos por usuario y lo almacenamos en el arreglo '$resumen_users'
		foreach($ids_users as $id_user){
			
			$resumen_user = array(
				'name' => '',
				'alias' => '',
				'username' => '',
				'capital_payback' => 0,
				'capital_invested' => 0,
				'returned_capital' => 0,
				'retirement_capital_available' => 0,
				'pending_capital' => 0,
				'pending_entry' => 0,
				'pending_exit' => 0,
				'approved_capital' => 0
			);
			
			foreach($transactions as $fondo){
				
				if($fondo->user_id == $id_user){
					
					// Conversión de cada monto a dólares
					$currency = $fondo->coin_avr;  // Tipo de moneda de la transacción
					
					// Si el tipo de moneda de la transacción es Bitcoin (BTC) o Bolívares (VEF) hacemos la conversión usando una api más acorde
					if ($currency == 'BTC') {
						
						$trans_usd = (float)$fondo->monto*(float)$valor1btc;
						
					}else if($currency == 'VEF'){
						
						$trans_usd = (float)$fondo->monto/(float)$valor1vef;
						
					}else{
						
						$trans_usd = (float)$fondo->monto/$exchangeRates['rates'][$currency];
						
					}
					
					$resumen_user['name'] = $fondo->name;
					$resumen_user['alias'] = $fondo->alias;
					$resumen_user['username'] = $fondo->username;
					if($fondo->status == 'waiting'){
						if($fondo->type == 'deposit'){
							$resumen_user['pending_capital'] += $trans_usd;
							$resumen_user['pending_entry'] += $trans_usd;
						}else if($fondo->type == 'withdraw'){
							$resumen_user['pending_capital'] += $trans_usd;
							$resumen_user['pending_exit'] += $trans_usd;
						}
					}
					if($fondo->status == 'approved'){
						$resumen_user['approved_capital'] += $trans_usd;
						if($fondo->type == 'deposit'){
							$resumen_user['capital_invested'] += $trans_usd;
							// Ids de los perfiles a los que no se les aplica la regla
							$global_profiles = array(1, 2);
							if(!in_array($this->session->userdata('logged_in')['profile_id'], $global_profiles)){
								// Validación de reglas
								$variable1 = "projects.type"; $condicional = "="; $variable2 = $data_project[0]->type; $segmento = "deposit";
								$reglas = $this->MProjects->buscar_rules($variable1, $condicional, $variable2, $segmento);  // Listado de reglas
								if($reglas[0]->result == "true"){
									$resumen_user['retirement_capital_available'] += $trans_usd;
								}
							}else{
								$resumen_user['retirement_capital_available'] += $trans_usd;
							}
						}else if($fondo->type == 'profit'){
							$resumen_user['returned_capital'] += $trans_usd;
							$resumen_user['retirement_capital_available'] += $trans_usd;
						}else if($fondo->type == 'expense'){
							$resumen_user['retirement_capital_available'] += $trans_usd;
						}else if($fondo->type == 'withdraw'){
							$resumen_user['retirement_capital_available'] += $trans_usd;
						}
					}
				}
				
			}
			
			$decimals = 2;
			if($this->session->userdata('logged_in')['coin_decimals'] != ""){
				$decimals = $data_project[0]->coin_decimals;
			}
			$symbol = $data_project[0]->coin_avr;
			
			// Conversión de los montos a la divisa del usuario
			$resumen_user['capital_invested'] *= $currency_project; 
			$resumen_user['capital_invested'] = round($resumen_user['capital_invested'], $decimals);
			$resumen_user['capital_invested'] = $resumen_user['capital_invested']." ".$symbol;
			
			$resumen_user['returned_capital'] *= $currency_project; 
			$resumen_user['returned_capital'] = round($resumen_user['returned_capital'], $decimals);
			$resumen_user['returned_capital'] = $resumen_user['returned_capital']." ".$symbol;
			
			$resumen_user['retirement_capital_available'] *= $currency_project; 
			$resumen_user['retirement_capital_available'] = round($resumen_user['retirement_capital_available'], $decimals);
			$resumen_user['retirement_capital_available'] = $resumen_user['retirement_capital_available']." ".$symbol;
			
			$resumen_user['pending_capital'] *= $currency_project; 
			$resumen_user['pending_capital'] = round($resumen_user['pending_capital'], $decimals);
			$resumen_user['pending_capital'] = $resumen_user['pending_capital']." ".$symbol;
			
			$resumen_user['pending_entry'] *= $currency_project; 
			$resumen_user['pending_entry'] = round($resumen_user['pending_entry'], $decimals);
			$resumen_user['pending_entry'] = $resumen_user['pending_entry']." ".$symbol;
			
			$resumen_user['pending_exit'] *= $currency_project; 
			$resumen_user['pending_exit'] = round($resumen_user['pending_exit'], $decimals);
			$resumen_user['pending_exit'] = $resumen_user['pending_exit']." ".$symbol;
			
			$resumen_user['approved_capital'] *= $currency_project; 
			$resumen_user['approved_capital'] = round($resumen_user['approved_capital'], $decimals);
			$resumen_user['approved_capital'] = $resumen_user['approved_capital']." ".$symbol;
			
			$resumen_users[] = $resumen_user;
			
		}
		
        return json_decode(json_encode($resumen_users), false);  // Esto retorna un arreglo de objetos
    }
    
    
	public function fondos_json_project($project_id)
    {
		
		$data_project = $this->MProjects->obtenerProyecto($project_id);  // Datos del proyecto
		
		// Obtenemos el valor en dólares de las disitntas divisas
		$get = file_get_contents("https://openexchangerates.org/api/latest.json?app_id=65148900f9c2443ab8918accd8c51664");
		// Se decodifica la respuesta JSON
		$exchangeRates = json_decode($get, true);
		// Con el segundo argumento lo decodificamos como un arreglo multidimensional y no como un arreglo de objetos
		
		// Valor de 1 btc en dólares
		$get2 = file_get_contents("https://api.coinmarketcap.com/v1/ticker/");
		$exchangeRates2 = json_decode($get2, true);
		// Con el segundo argumento lo decodificamos como un arreglo multidimensional y no como un arreglo de objetos
		$valor1btc = $exchangeRates2[0]['price_usd'];
		
		// Valor de 1 dólar en bolívares
		$get3 = file_get_contents("https://s3.amazonaws.com/dolartoday/data.json");
		$exchangeRates3 = json_decode($get3, true);
		// Con el segundo argumento lo decodificamos como un arreglo multidimensional y no como un arreglo de objetos
		$valor1vef = $exchangeRates3['USD']['transferencia'];
		
		if ($data_project[0]->coin_avr == 'BTC') {
		
			$currency_project = 1/(float)$valor1btc;  // Tipo de moneda del proyecto
			
		} else if($data_project[0]->coin_avr == 'VEF') {
		
			$currency_project = $valor1vef;  // Tipo de moneda del proyecto
		
		} else {
			
			$currency_project = $exchangeRates['rates'][$data_project[0]->coin_avr];  // Tipo de moneda del proyecto
			
		}
		
		if ($this->session->userdata('logged_in')['coin_iso'] == 'BTC') {
		
			$currency_user = 1/(float)$valor1btc;  // Tipo de moneda del usuario logueado
			
		} else if($this->session->userdata('logged_in')['coin_iso'] == 'VEF') {
		
			$currency_user = $valor1vef;  // Tipo de moneda del usuario logueado
		
		} else {
			
			$currency_user = $exchangeRates['rates'][$this->session->userdata('logged_in')['coin_iso']];  // Tipo de moneda del usuario logueado
			
		}
        
        $fondos_details = $this->MProjects->obtenerTransacciones($project_id);  // Listado de fondos detallados
		
		$resumen = array(
			'capital_payback' => 0,
			'capital_invested' => 0,
			'returned_capital' => 0,
			'retirement_capital_available' => 0,
			'capital_payback_user' => 0,
			'capital_invested_user' => 0,
			'returned_capital_user' => 0,
			'retirement_capital_available_user' => 0
		);
			
		foreach($fondos_details as $fondo){
				
			// Conversión de cada monto a dólares
			$currency = $fondo->coin_avr;  // Tipo de moneda de la transacción
			
			// Si el tipo de moneda de la transacción es Bitcoin (BTC) o Bolívares (VEF) hacemos la conversión usando una api más acorde
			if ($currency == 'BTC') {
				
				$trans_usd = (float)$fondo->monto*(float)$valor1btc;
				
			}else if($currency == 'VEF'){
				
				$trans_usd = (float)$fondo->monto/(float)$valor1vef;
				
			}else{
				
				$trans_usd = (float)$fondo->monto/$exchangeRates['rates'][$currency];
				
			}
			
			if($fondo->status == 'approved'){
				
				if($fondo->type == 'deposit'){
					$resumen['capital_invested'] += $trans_usd;
					$resumen['capital_invested_user'] += $trans_usd;
					// Ids de los perfiles a los que no se les aplica la regla
					$global_profiles = array(1, 2);
					if(!in_array($this->session->userdata('logged_in')['profile_id'], $global_profiles)){
						// Validación de reglas
						$variable1 = "projects.type"; $condicional = "="; $variable2 = $data_project[0]->type; $segmento = "deposit";
						$reglas = $this->MProjects->buscar_rules($variable1, $condicional, $variable2, $segmento);  // Listado de reglas
						if($reglas[0]->result == "true"){
							$resumen['retirement_capital_available'] += $trans_usd;
							$resumen['retirement_capital_available_user'] += $trans_usd;
						}
					}else{
						$resumen['retirement_capital_available'] += $trans_usd;
						$resumen['retirement_capital_available_user'] += $trans_usd;
					}
				}else if($fondo->type == 'profit'){
					$resumen['returned_capital'] += $trans_usd;
					$resumen['returned_capital_user'] += $trans_usd;
					$resumen['retirement_capital_available'] += $trans_usd;
					$resumen['retirement_capital_available_user'] += $trans_usd;
				}else if($fondo->type == 'expense'){
					$resumen['retirement_capital_available'] += $trans_usd;
					$resumen['retirement_capital_available_user'] += $trans_usd;
				}else if($fondo->type == 'withdraw'){
					$resumen['retirement_capital_available'] += $trans_usd;
					$resumen['retirement_capital_available_user'] += $trans_usd;
				}
			}
			
		}
		
		$decimals = 2;
		$decimals_user = 2;
		if($data_project[0]->coin_decimals != ""){
			$decimals = $data_project[0]->coin_decimals;
			$decimals_user = $this->session->userdata('logged_in')['coin_decimals'];
		}
		if($this->session->userdata('logged_in')['coin_decimals'] != ""){
			$decimals_user = $this->session->userdata('logged_in')['coin_decimals'];
		}
		$symbol = $data_project[0]->coin_symbol;
		$symbol_user = $this->session->userdata('logged_in')['coin_symbol'];
		
		// Cálculo del capital payback (Porcentaje del capital de retorno con respecto al capital invertido)
		if($resumen['capital_invested'] > 0){
			$resumen['capital_payback'] = $resumen['returned_capital']*100/$resumen['capital_invested'];
		}else{
			$resumen['capital_payback'] = 100;
		}
		
		// Conversión de los montos a la divisa del proyecto
		//~ $resumen['capital_payback'] *= $currency_project;
		$resumen['capital_payback'] = round($resumen['capital_payback'], $decimals);
		//~ $resumen['capital_payback'] = $resumen['capital_payback']." ".$symbol;
		
		$resumen['capital_invested'] *= $currency_project; 
		$resumen['capital_invested'] = round($resumen['capital_invested'], $decimals);
		$resumen['capital_invested'] = $resumen['capital_invested']." ".$symbol;
		
		$resumen['returned_capital'] *= $currency_project; 
		$resumen['returned_capital'] = round($resumen['returned_capital'], $decimals);
		$resumen['returned_capital'] = $resumen['returned_capital']." ".$symbol;
		
		$resumen['retirement_capital_available'] *= $currency_project; 
		$resumen['retirement_capital_available'] = round($resumen['retirement_capital_available'], $decimals);
		$resumen['retirement_capital_available'] = $resumen['retirement_capital_available']." ".$symbol;
		
		// Conversión de los montos a la divisa del usuario
		$resumen['capital_invested_user'] *= $currency_user; 
		$resumen['capital_invested_user'] = round($resumen['capital_invested_user'], $decimals_user);
		$resumen['capital_invested_user'] = $resumen['capital_invested_user']." ".$symbol_user;
		
		$resumen['returned_capital_user'] *= $currency_user; 
		$resumen['returned_capital_user'] = round($resumen['returned_capital_user'], $decimals_user);
		$resumen['returned_capital_user'] = $resumen['returned_capital_user']." ".$symbol_user;
		
		$resumen['retirement_capital_available_user'] *= $currency_user; 
		$resumen['retirement_capital_available_user'] = round($resumen['retirement_capital_available_user'], $decimals_user);
		$resumen['retirement_capital_available_user'] = $resumen['retirement_capital_available_user']." ".$symbol_user;
		
        return json_decode(json_encode($resumen), false);  // Esto retorna un arreglo de objetos
    }
	
	public function ajax_projects()
    {
        $result = $this->MProjects->obtener();
        echo json_encode($result);
    }
	
	
}
