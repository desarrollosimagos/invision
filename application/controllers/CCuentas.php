<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CCuentas extends CI_Controller {

	public function __construct() {
        parent::__construct();


       
		// Load database
        $this->load->model('MCuentas');
		
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
		$this->load->view('cuentas/registrar');
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
		
        $result = $this->MCuentas->delete($id);
        
        if ($result) {
          /*  $this->libreria->generateActivity('Eliminado País', $this->session->userdata['logged_in']['id']);*/
        }
        
    }
	
	public function ajax_cuentas()
    {
        $result = $this->MCuentas->obtener();
        echo json_encode($result);
    }
	
	
}
