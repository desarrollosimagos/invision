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
		$data['capital_pendiente'] = $this->MResumen->capitalPendiente();
		$data['capital_aprobado'] = $this->MResumen->capitalAprobado();
		$this->load->view('resumen/resumen', $data);
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
