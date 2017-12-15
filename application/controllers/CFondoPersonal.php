<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CFondoPersonal extends CI_Controller {

	public function __construct() {
        parent::__construct();


       
		// Load database
        $this->load->model('MFondoPersonal');
		
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
		$this->load->view('fondo_personal/registrar');
		$this->load->view('footer');
	}
	
	// Método para guardar un nuevo registro
    public function add() {
		
		$datos = array(
            'user_id' => $this->session->userdata('logged_in')['id'],
            'tipo' => $this->input->post('tipo'),
            'observaciones' => $this->input->post('observaciones'),
            'monto' => $this->input->post('monto'),
            'status' => $this->input->post('status'),
            'd_create' => date('Y-m-d H:i:s')
        );
        
        $result = $this->MFondoPersonal->insert($datos);
        
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
        $data['editar'] = $this->MFondoPersonal->obtenerFondoPersonal($data['id']);
        $this->load->view('fondo_personal/editar', $data);
		$this->load->view('footer');
    }
	
	// Método para actualizar
    public function update() {
		
		$datos = array(
			'id' => $this->input->post('id'),
			'user_id' => $this->session->userdata('logged_in')['id'],
            'tipo' => $this->input->post('tipo'),
            'observaciones' => $this->input->post('observaciones'),
            'monto' => $this->input->post('monto'),
            'status' => $this->input->post('status'),
            'd_update' => date('Y-m-d H:i:s')
		);
		
        $result = $this->MFondoPersonal->update($datos);
        
        if ($result) {
			
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
	
	public function ajax_fondo_personal()
    {                                          #Campo         #Tabla                #ID
        $result = $this->MFondoPersonal->obtener();
        echo json_encode($result);
    }
	
	
}
