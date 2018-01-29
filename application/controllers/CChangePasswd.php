<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CChangePasswd extends CI_Controller {

	public function __construct() {
        parent::__construct();
       
		// Load database
        $this->load->model('MChangePasswd');
		
    }
	
	public function index()
	{
		$this->load->view('base');
		$this->load->view('change_passwd/change_passwd');
		$this->load->view('footer');
	}
	
	// Método para actualizar de forma directa el status de un usuario
    public function update_passwd() {
		$id_user = $this->session->userdata['logged_in']['id'];
		$passwd_actual = 'pbkdf2_sha256$12000$'.hash( "sha256", $this->input->post('passwd_actual') );
		$new_passwd = $this->input->post('new_passwd');
		$confirm_new_passwd = $this->input->post('confirm_new_passwd');
		
		if($new_passwd == $confirm_new_passwd){
			
			$query = $this->MChangePasswd->verificarPasswd($id_user, $passwd_actual);
		
			if(count($query) > 0){
				
				$new_passwd = 'pbkdf2_sha256$12000$'.hash( "sha256", $this->input->post('new_passwd') );
				
				// Armamos la data a actualizar
				$data_usuario = array(
					'id' => $id_user,
					'password' => $new_passwd
				);
				
				// Actualizamos el usuario con los datos armados
				$result = $this->MChangePasswd->update_passwd($data_usuario);
				
				echo '{"response":"ok"}';
				
			}else{
				
				echo '{"response":"error"}';
				
			}
				
		}else{
			
			echo '{"response":"error"}';
			
		}
		
	}
	
	
}
