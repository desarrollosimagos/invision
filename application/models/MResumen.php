<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class MResumen extends CI_Model {


    public function __construct() {
       
        parent::__construct();
        $this->load->database();
    }

    //Public method to obtain the fondo_personal
    public function obtener() {
		
		$this->db->select('f_p.id, f_p.cuenta_id, f_p.tipo, f_p.descripcion, f_p.referencia, f_p.observaciones, f_p.monto, f_p.status, u.username as usuario, c.cuenta, c.numero');
		$this->db->from('fondo_personal f_p');
		$this->db->join('users u', 'u.id = f_p.user_id');
		$this->db->join('cuentas c', 'c.id = f_p.cuenta_id');
		// Si el usuario corresponde al de un administrador quitamos el filtro de perfil
        if($this->session->userdata('logged_in')['profile_id'] != 1){
			$this->db->where('f_p.user_id =', $this->session->userdata('logged_in')['id']);
		}
		$this->db->order_by("f_p.id", "desc");
        $query = $this->db->get();
        //~ $query = $this->db->get('fondo_personal');

        if ($query->num_rows() > 0)
            return $query->result();
        else
            return $query->result();
            
    }

    // Public method to obtain the fondo_personal by id
    public function obtenerFondoPersonal($id) {
		
        $this->db->where('id', $id);
        $query = $this->db->get('fondo_personal');
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return $query->result();
            
    }

    // Public method to update a record  
    public function update($datos) {
		
		$result = $this->db->where('id', $datos['id']);
		$result = $this->db->update('fondo_personal', $datos);
		return $result;
        
    }


    // Public method to delete a record
     public function delete($id) {
		 
		$result = $this->db->delete('fondo_personal', array('id' => $id));
		return $result;
       
    }
    

}
?>
