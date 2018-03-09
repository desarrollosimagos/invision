<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CFondoPersonal extends CI_Controller {

	public function __construct() {
        parent::__construct();


       
		// Load database
        $this->load->model('MFondoPersonal');
        $this->load->model('MCuentas');
        $this->load->model('MUser');
		
    }
	
	public function index()
	{
		$this->load->view('base');
		$data['listar'] = $this->MFondoPersonal->obtener();
		$this->load->view('fondo_personal/lista', $data);
		$this->load->view('footer');
	}
	
	public function register()
	{
		$this->load->view('base');
		//~ echo $this->uri->segment(3);
		$tipo = $this->uri->segment(3);  // 'deposit' = Agregar, 'withdraw' = Retirar
		$data['cuentas'] = $this->MFondoPersonal->obtener_cuentas_group($tipo);
		$data['usuarios'] = $this->MUser->obtener();
		$this->load->view('fondo_personal/registrar', $data);
		$this->load->view('footer');
	}
	
	// Método para guardar un nuevo registro
    public function add() {
		
		$fecha = $this->input->post('fecha');
		$fecha = explode("/", $fecha);
		$fecha = $fecha[2]."-".$fecha[1]."-".$fecha[0];
		
		if($this->session->userdata('logged_in')['id'] == 1){
			$user_id = $this->input->post('user_id');
		}else{
			$user_id = $this->session->userdata('logged_in')['id'];
		}
		
		$monto = $this->input->post('monto');
		if($this->input->post('tipo') == 'withdraw'){
			$monto = $this->input->post('monto') * -1;
		}
		
		$datos = array(
            'user_id' => $user_id,
            'tipo' => $this->input->post('tipo'),
            'cuenta_id' => $this->input->post('cuenta_id'),
            'fecha' => $fecha,
            'descripcion' => $this->input->post('descripcion'),
            'referencia' => $this->input->post('referencia'),
            'observaciones' => $this->input->post('observaciones'),
            'monto' => $monto,
            'status' => 'waiting',
            'd_create' => date('Y-m-d H:i:s')
        );
        
        $result = $this->MFondoPersonal->insert($datos);
        
        if ($result) {
			
			//~ // Obtenemos los datos de la cuenta a actualizar
			//~ $data_cuenta = $this->MCuentas->obtenerCuenta($this->input->post('cuenta_id'));
			//~ 
			//~ // Sumamos o restamos el monto de la transacción
			//~ if($this->input->post('tipo') == 'deposit'){
				//~ $monto_cuenta = $data_cuenta[0]->monto + $this->input->post('monto');
			//~ }else if($this->input->post('tipo') == 'withdraw'){
				//~ $monto_cuenta = $data_cuenta[0]->monto - $this->input->post('monto');
			//~ }
			//~ 
			//~ // Armamos los nuevos datos de la cuenta
			//~ $data_cuenta = array(
				//~ 'id' => $this->input->post('cuenta_id'),
				//~ 'monto' => $monto_cuenta,
				//~ 'd_update' => date('Y-m-d H:i:s')
			//~ );
			//~ 
			//~ // Actualizamos la cuenta
			//~ $update_cuenta = $this->MCuentas->update($data_cuenta);

			echo '{"response":"ok"}';
       
        }else{
			
			echo '{"response":"error"}';
			
		}
    }
	
	// Método para editar
    public function edit() {
		
		$this->load->view('base');
        $data['id'] = $this->uri->segment(3);
        $data['editar'] = $this->MFondoPersonal->obtenerFondoPersonal($data['id']);
        $data['cuentas'] = $this->MCuentas->obtener();
        $data['usuarios'] = $this->MUser->obtener();
        $this->load->view('fondo_personal/editar', $data);
		$this->load->view('footer');
    }
	
	// Método para actualizar
    public function update() {
		
		$fecha = $this->input->post('fecha');
		$fecha = explode("/", $fecha);
		$fecha = $fecha[2]."-".$fecha[1]."-".$fecha[0];
		
		if($this->session->userdata('logged_in')['id'] == 1){
			$user_id = $this->input->post('user_id');
		}else{
			$user_id = $this->session->userdata('logged_in')['id'];
		}
		
		$monto = $this->input->post('monto');
		if($this->input->post('tipo') == 'withdraw'){
			$monto = $this->input->post('monto') * -1;
		}
		
		$datos = array(
			'id' => $this->input->post('id'),
			'user_id' => $user_id,
            'tipo' => $this->input->post('tipo'),
            'cuenta_id' => $this->input->post('cuenta_id'),
            'fecha' => $fecha,
            'descripcion' => $this->input->post('descripcion'),
            'referencia' => $this->input->post('referencia'),
            'observaciones' => $this->input->post('observaciones'),
            'monto' => $monto,
            'd_update' => date('Y-m-d H:i:s')
		);
		
        $result = $this->MFondoPersonal->update($datos);
        
        if ($result) {
			
			//~ // Obtenemos los datos de la cuenta a actualizar
			//~ $data_cuenta = $this->MCuentas->obtenerCuenta($this->input->post('cuenta_id'));
			//~ 
			//~ // Sumamos o restamos el monto de la transacción
			//~ if($this->input->post('tipo') == 'deposit'){
				//~ $monto_cuenta = $data_cuenta[0]->monto + $this->input->post('monto');
			//~ }else if($this->input->post('tipo') == 'withdraw'){
				//~ $monto_cuenta = $data_cuenta[0]->monto - $this->input->post('monto');
			//~ }
			//~ 
			//~ // Armamos los nuevos datos de la cuenta
			//~ $data_cuenta = array(
				//~ 'id' => $this->input->post('cuenta_id'),
				//~ 'monto' => $monto_cuenta,
				//~ 'd_update' => date('Y-m-d H:i:s')
			//~ );
			//~ 
			//~ // Actualizamos la cuenta
			//~ $update_cuenta = $this->MCuentas->update($data_cuenta);
			
			echo '{"response":"ok"}';
			
        }else{
			
			echo '{"response":"error"}';
			
		}
    }
    
	// Método para eliminar
	function delete($id) {
		
        $result = $this->MFondoPersonal->delete($id);
        
        if ($result) {
          /*  $this->libreria->generateActivity('Eliminado País', $this->session->userdata['logged_in']['id']);*/
        }
        
    }
    
    // Método para validar las transacciones de fondos personales
    public function validar_transaccion(){
		
		// Armamos los nuevos datos de la transacción
		$data_transaccion = array(
			'id' => $this->input->post('id'),
			'status' => $this->input->post('status'),
			'd_update' => date('Y-m-d H:i:s')
		);
			
		// Actualizamos la transacción
		$update_transaccion = $this->MFondoPersonal->update($data_transaccion);
		
		// Si estamos validando y no negando la transacción, actualizamos también la cuenta de dicha transacción
		if($this->input->post('status') == 'approved'){
			
			// Obtenemos los datos de la cuenta a actualizar
			$data_cuenta = $this->MCuentas->obtenerCuenta($this->input->post('cuenta_id'));
			
			// Sumamos el monto de la transacción a la cuenta
			$monto_cuenta = $data_cuenta[0]->monto + $this->input->post('monto');
			
			// Armamos los nuevos datos de la cuenta
			$data_cuenta = array(
				'id' => $this->input->post('cuenta_id'),
				'monto' => $monto_cuenta,
				'd_update' => date('Y-m-d H:i:s')
			);
			
			// Actualizamos la cuenta
			$update_cuenta = $this->MCuentas->update($data_cuenta);
			
		}else{
			$update_cuenta = true;
		}
		
		if($update_transaccion && $update_cuenta){
			echo '{"response":"ok"}';
		}else{
			echo '{"response":"error"}';
		}
		
	}
	
	public function ajax_fondo_personal()
    {                                          #Campo         #Tabla                #ID
        $result = $this->MFondoPersonal->obtener();
        echo json_encode($result);
    }
	
	
}
