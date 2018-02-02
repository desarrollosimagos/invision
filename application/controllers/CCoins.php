<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CCoins extends CI_Controller {

	public function __construct() {
        parent::__construct();


       
		// Load database
        $this->load->model('MCoins');
		
    }
	
	public function index()
	{
		$this->load->view('base');
		$data['listar'] = $this->MCoins->obtener();
		$this->load->view('coins/lista', $data);
		$this->load->view('footer');
	}
	
	public function register()
	{
		$this->load->view('base');
		$this->load->view('coins/registrar');
		$this->load->view('footer');
	}
	
	// Método para guardar un nuevo registro
    public function add() {
		
		$datos = array(
			'description' => $this->input->post('description'),
			'abbreviation' => $this->input->post('abbreviation'),
			'symbol' => $this->input->post('symbol'),
			'decimals' => $this->input->post('decimals'),
            'status' => $this->input->post('status'),
            'd_create' => date('Y-m-d H:i:s')
        );
        
        $result = $this->MCoins->insert($datos);
        
        if ($result != 'existe') {

			echo '{"response":"ok"}';
       
        }else{
			
			echo '{"response":"error"}';
			
		}
    }
	
	// Método para editar
    public function edit() {
		
		$this->load->view('base');
        $data['id'] = $this->uri->segment(3);
        $data['editar'] = $this->MCoins->obtenerMoneda($data['id']);
        $this->load->view('coins/editar', $data);
		$this->load->view('footer');
    }
	
	// Método para actualizar
    public function update() {
		
		$datos = array(
			'id' => $this->input->post('id'),
			'description' => $this->input->post('description'),
			'abbreviation' => $this->input->post('abbreviation'),
			'symbol' => $this->input->post('symbol'),
			'decimals' => $this->input->post('decimals'),
            'status' => $this->input->post('status'),
            'd_update' => date('Y-m-d H:i:s')
		);
		
        $result = $this->MCoins->update($datos);
        
        if ($result) {
			
			echo '{"response":"ok"}';
			
        }else{
			
			echo '{"response":"error"}';
			
		}
    }
    
	// Método para eliminar
	function delete($id) {
		
        $result = $this->MCoins->delete($id);
        
        if ($result) {
          /*  $this->libreria->generateActivity('Eliminado País', $this->session->userdata['logged_in']['id']);*/
        }
        
    }
	
	public function ajax_coins()
    {
        $result = $this->MCoins->obtener();
        echo json_encode($result);
    }
	
	
}
