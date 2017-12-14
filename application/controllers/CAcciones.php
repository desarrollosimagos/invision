<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CAcciones extends CI_Controller {

	public function __construct() {
        parent::__construct();


        $this->load->view('base');
		// Load database
        $this->load->model('MAcciones');
		
    }
	
	public function index()
	{
		$data['listar'] = $this->MAcciones->obtener();
		$this->load->view('acciones/lista', $data);
		$this->load->view('footer');
	}
	
	public function register()
	{
		$data['controladores'] = $this->MAcciones->listar_controladores("application/controllers/", '');
		$this->load->view('acciones/registrar', $data);
		$this->load->view('footer');
	}
	
	  //Método para guardar un nuevo registro
    public function add() {
		
		$data = array(
			'name' => $this->input->post('name'),
			'class' => $this->input->post('class'),
			'route' => $this->input->post('route'),
			'assigned' => 0,
			'd_create' => date('Y-m-d')." ".date("H:i:s"),
			'd_update' => date('Y-m-d')." ".date("H:i:s")
		);
		
        $result = $this->MAcciones->insert($data);
        
        if ($result) {

           /*$this->libreria->generateActivity('Nuevo Grupo de Usuario', $this->session->userdata('logged_in')['id']);*/
       
        }
    }
	 //Método para editar
    public function edit() {
        $data['id'] = $this->uri->segment(3);
        $data['controladores'] = $this->MAcciones->listar_controladores("application/controllers/", $data['id']);
        $data['editar'] = $this->MAcciones->obtenerAccion($data['id']);
        $this->load->view('acciones/editar', $data);
    }
	
	//Método para actualizar
    public function update() {
		
        $result = $this->MAcciones->update($this->input->post());
        if ($result) {
        /*    $this->libreria->generateActivity('Actualizado Grupo de Usuario', $this->session->userdata['logged_in']['id']);*/
     
        }
    }
	//Método para eliminar
	function delete($id) {
		
        $result = $this->MAcciones->delete($id);
        if ($result) {
          /*  $this->libreria->generateActivity('Eliminado País', $this->session->userdata['logged_in']['id']);*/
        }
    }
	
	
}
