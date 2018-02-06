<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CCuentas extends CI_Controller {

	public function __construct() {
        parent::__construct();


       
		// Load database
        $this->load->model('MCuentas');
        $this->load->model('MCoins');
		
    }
	
	public function index()
	{
		$this->load->view('base');
		$data['listar'] = $this->MCuentas->obtener();
		$this->load->view('cuentas/lista', $data);
		$this->load->view('footer');
	}
	
	public function register()
	{
		$this->load->view('base');
		$data['monedas'] = $this->MCoins->obtener();
		$this->load->view('cuentas/registrar', $data);
		$this->load->view('footer');
	}
	
	// Método para guardar un nuevo registro
    public function add() {
		
		$datos = array(
			'cuenta' => $this->input->post('cuenta'),
			'numero' => $this->input->post('numero'),
            'user_id' => $this->session->userdata('logged_in')['id'],
            'tipo' => $this->input->post('tipo'),
            'descripcion' => $this->input->post('descripcion'),
            'monto' => $this->input->post('monto'),
            'coin_id' => $this->input->post('coin_id'),
            'status' => $this->input->post('status'),
            'd_create' => date('Y-m-d H:i:s')
        );
        
        $result = $this->MCuentas->insert($datos);
        
        if ($result) {

			echo '{"response":"ok"}';
       
        }else{
			
			echo '{"response":"error"}';
			
		}
    }
	
	// Método para editar
    public function edit() {
		
		$this->load->view('base');
        $data['id'] = $this->uri->segment(3);
        $data['editar'] = $this->MCuentas->obtenerCuenta($data['id']);
        $data['monedas'] = $this->MCoins->obtener();
        $this->load->view('cuentas/editar', $data);
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
            'coin_id' => $this->input->post('coin_id'),
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
    
	// Método para eliminar
	function delete($id) {
		
		// Primero verificamos si está asociada a alguna transacción
		$search_assoc = $this->MCuentas->obtenerCuentaFondos($id);
		
		// Luego verificamos si está asociada a algún grupo de inversionistas
		$search_assoc2 = $this->MCuentas->obtenerCuentaGrupos($id);
		
		if(count($search_assoc) > 0){
			
			echo '{"response":"existe"}';
			
		}else if(count($search_assoc2) > 0){
			
			echo '{"response":"existe2"}';
			
		}else{
			
			$result = $this->MCuentas->delete($id);
			
			if($result){
				
				echo '{"response":"ok"}';
				
			}else{
				
				echo '{"response":"error"}';
				
			}
			
		}
        
    }
	
	public function ajax_cuentas()
    {
        $result = $this->MCuentas->obtener();
        echo json_encode($result);
    }
	
	
}
