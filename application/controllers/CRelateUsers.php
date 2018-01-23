<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CRelateUsers extends CI_Controller {

	public function __construct() {
        parent::__construct();


       
		// Load database
        $this->load->model('MRelateUsers');
        $this->load->model('MUser');
		
    }
	
	public function index()
	{
		$this->load->view('base');
		$data['listar'] = $this->MRelateUsers->obtener();
		$data['asociaciones'] = $this->MRelateUsers->associated_investors();
		$this->load->view('relate_users/lista', $data);
		$this->load->view('footer');
	}
	
	public function register()
	{
		$this->load->view('base');
		$data['asesores'] = $this->MRelateUsers->obtener_asesores();
		$data['inversores'] = $this->MRelateUsers->obtener_inversores();
		// Construimos las listas con los ids de los inversores y asesores ya asociados
		// Asesores asociados
		$associated_advisers = array();
		foreach($this->MRelateUsers->associated_investors() as $asesor){
			if(!in_array($asesor->user_id_one, $associated_advisers)){
				$associated_advisers[] = $asesor->user_id_one;
			}
		}
		// Inversores asociados
		$associated_investors = array();
		foreach($this->MRelateUsers->associated_investors() as $inversor){
			if(!in_array($inversor->user_id_two, $associated_investors)){
				$associated_investors[] = $inversor->user_id_two;
			}
		}
		//~ print_r($associated_advisers);
		//~ print_r($associated_investors);
		$data['asesores_asociados'] = $associated_advisers;
		$data['inversores_asociados'] = $associated_investors;
		$this->load->view('relate_users/registrar', $data);
		$this->load->view('footer');
	}
	
	// Método para guardar un nuevo registro
    public function add() {
		
		if($this->session->userdata['logged_in']['profile_id'] == 4){
			
			$asesor = $this->session->userdata['logged_in']['id'];
			
		}else{
			
			$asesor = $this->input->post('user_id_one');
			
		}
        
        $exito = 0;
        
        // Asociamos los inversores seleccionadas del combo select
		foreach($this->input->post('inversores') as $inversor){
			
			$data_inversor = array(
				'user_id_one' => $asesor,
				'user_id_two' => $inversor,
				'd_create' => date('Y-m-d H:i:s')
			);
			
			if($this->MRelateUsers->insert($data_inversor)){
				$exito += 1;
			}
			
		}
        
        if ($exito > 0) {

			echo '{"response":"ok"}';
       
        }else{
			
			echo '{"response":"error"}';
			
		}
		
    }
	
	// Método para editar
    public function edit() {
		
		$this->load->view('base');
        $data['id'] = $this->uri->segment(3);
        $data['asesor'] = $this->MUser->obtenerUsers($data['id']);
		$data['inversores'] = $this->MRelateUsers->obtener_inversores();
		// Construimos la lista con los ids de los inversores ya asociados, excluyendo los pertenecientes al usuario actual
		// Inversores asociados
		$general_investors = array();
		$associated_investors = array();
		foreach($this->MRelateUsers->associated_investors() as $inversor){
			if($inversor->user_id_one != $data['id']){
				if(!in_array($inversor->user_id_two, $general_investors)){
					$general_investors[] = $inversor->user_id_two;
				}
			}else{
				$associated_investors[] = $inversor->user_id_two;
			}
		}
		//~ print_r($associated_investors);
		$data['asociaciones_generales'] = $general_investors;
		$data['inversores_asociados'] = $associated_investors;
        $this->load->view('relate_users/editar', $data);
		$this->load->view('footer');
    }
	
	// Método para actualizar
    public function update() {
		
		$datos = array(
			'id' => $this->input->post('id'),
			'description' => $this->input->post('description'),
			'abbreviation' => $this->input->post('abbreviation'),
			'symbol' => $this->input->post('symbol'),
            'status' => $this->input->post('status'),
            'd_update' => date('Y-m-d H:i:s')
		);
		
        $result = $this->MRelateUsers->update($datos);
        
        if ($result) {
			
			echo '{"response":"ok"}';
			
        }else{
			
			echo '{"response":"error"}';
			
		}
    }
    
	// Método para eliminar
	function delete($id) {
		
        $result = $this->MRelateUsers->delete($id);
        
        if ($result) {
          /*  $this->libreria->generateActivity('Eliminado País', $this->session->userdata['logged_in']['id']);*/
        }
        
    }
	
	public function ajax_coins()
    {
        $result = $this->MRelateUsers->obtener();
        echo json_encode($result);
    }
	
	
}
