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
		
		$fecha = $this->input->post('date');
		$fecha = explode(" ", $fecha);
		$fecha = explode("/", $fecha[0]);
		$fecha = $fecha[2]."-".$fecha[1]."-".$fecha[0];
		
		$hora = $this->input->post('date');
		$hora = explode(" ", $hora);
		$hora = $hora[1];
		
		$fecha = $fecha." ".$hora;
		
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
            'type' => $this->input->post('type'),
            'cuenta_id' => $this->input->post('cuenta_id'),
            'date' => $fecha,
            'description' => $this->input->post('description'),
            'reference' => $this->input->post('reference'),
            'observation' => $this->input->post('observation'),
            'monto' => $monto,
            'status' => 'waiting',
            'd_create' => date('Y-m-d H:i:s')
        );
        
        $result = $this->MFondoPersonal->insert($datos);
        
        if ($result) {
			
			// Sección para el registro de la foto en la ruta establecida para tal fin (assets/img/userss)
			$ruta = getcwd();  // Obtiene el directorio actual en donde se esta trabajando
			
			//~ // print_r($_FILES);
			$i = 0;
			
			$errors2 = 0;
				
			if($_FILES['document']['name'][0] != ""){
				
				// Obtenemos la extensión
				$ext = explode(".", $_FILES['document']['name'][0]);
				$ext = $ext[1];
				$document = "docs_trans_".$result.".".$ext;
				
				if (!move_uploaded_file($_FILES['document']['tmp_name'][0], $ruta."/assets/docs_trans/docs_trans_".$result.".".$ext)) {
					
					$errors2 += 1;
					
				}else{
					//~ echo $result;
					$data_trans = array(
						'id' => $result,
						'document' => $document,
					);
					$update_user = $this->MFondoPersonal->update($data_trans);
				
				}
				
				$i++;
			}
			
			if($errors2 > 0){
				
				echo '{"response":"error2"}';
				
			}else{
				
				echo '{"response":"ok"}';
				
			}
       
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
		
		$fecha = $this->input->post('date');
		$fecha = explode(" ", $fecha);
		$fecha = explode("/", $fecha[0]);
		$fecha = $fecha[2]."-".$fecha[1]."-".$fecha[0];
		
		$hora = $this->input->post('date');
		$hora = explode(" ", $hora);
		$hora = $hora[1];
		
		$fecha = $fecha." ".$hora;
		
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
            'type' => $this->input->post('type'),
            'cuenta_id' => $this->input->post('cuenta_id'),
            'date' => $fecha,
            'description' => $this->input->post('description'),
            'reference' => $this->input->post('reference'),
            'observation' => $this->input->post('observation'),
            'monto' => $monto,
            'd_update' => date('Y-m-d H:i:s')
		);
		
        $result = $this->MFondoPersonal->update($datos);
        
        if ($result) {
			
			// Sección para el registro de la foto en la ruta establecida para tal fin (assets/img/userss)
			$ruta = getcwd();  // Obtiene el directorio actual en donde se esta trabajando
			
			//~ // print_r($_FILES);
			$i = 0;
			
			$errors2 = 0;
				
			if($_FILES['document']['name'][0] != ""){
				
				// Obtenemos la extensión
				$ext = explode(".", $_FILES['document']['name'][0]);
				$ext = $ext[1];
				$document = "docs_trans_".$this->input->post('id').".".$ext;
				
				if (!move_uploaded_file($_FILES['document']['tmp_name'][0], $ruta."/assets/docs_trans/docs_trans_".$this->input->post('id').".".$ext)) {
					
					$errors2 += 1;
					
				}else{
					//~ echo $result;
					$data_trans = array(
						'id' => $this->input->post('id'),
						'document' => $document,
					);
					$update_user = $this->MFondoPersonal->update($data_trans);
				
				}
				
				$i++;
			}
			
			if($errors2 > 0){
				
				echo '{"response":"error2"}';
				
			}else{
				
				echo '{"response":"ok"}';
				
			}
			
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
				'amount' => $monto_cuenta,
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
