<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class MRelateUsers extends CI_Model {


    public function __construct() {
       
        parent::__construct();
        $this->load->database();
    }

    //Public method to obtain the relate_users
    public function obtener() {
        
        $this->db->select('r_u.user_id_one, u.username');
		$this->db->from('relate_users r_u');
		$this->db->join('users u', 'u.id=r_u.user_id_one');
		$this->db->group_by('r_u.user_id_one, u.username');
        $query = $this->db->get();
        //~ $query = $this->db->get('relate_users');

        if ($query->num_rows() > 0)
            return $query->result();
        else
            return $query->result();
            
    }

    //Public method to obtain the relate_users alternative
    public function associated_investors() {
        
        $this->db->select('r_u.user_id_one, r_u.user_id_two, u.username');
		$this->db->from('relate_users r_u');
		$this->db->join('users u', 'u.id=r_u.user_id_two');
        $query = $this->db->get();
        //~ $query = $this->db->get('relate_users');

        if ($query->num_rows() > 0)
            return $query->result();
        else
            return $query->result();
            
    }

    //Public method to obtain the consultant users
    public function obtener_asesores() {
		
		$this->db->where('profile_id', 5);
        $query = $this->db->get('users');
        //~ $query = $this->db->get('relate_users');

        if ($query->num_rows() > 0)
            return $query->result();
        else
            return $query->result();
            
    }

    //Public method to obtain the investor users
    public function obtener_inversores() {
		
		$this->db->where('profile_id', 4);
        $query = $this->db->get('users');
        //~ $query = $this->db->get('relate_users');

        if ($query->num_rows() > 0)
            return $query->result();
        else
            return $query->result();
            
    }

    // Public method to insert the data
    public function insert($datos) {
		
		$result = $this->db->insert("relate_users", $datos);
		$id = $this->db->insert_id();
		return $id;
        
    }

    // Public method to obtain the relate_users by id
    public function obtenerRelacion($id) {
		
        $this->db->where('id', $id);
        $query = $this->db->get('relate_users');
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return $query->result();
            
    }

    // Public method to update a record  
    public function update($datos) {
		
		$result = $this->db->where('id', $datos['id']);
		$result = $this->db->update('relate_users', $datos);
		return $result;
        
    }


    // Public method to delete a record
    public function delete($id) {
		$query = $this->db->where('coin_id =', $id);
        $query = $this->db->get('users');
        
		$query2 = $this->db->where('coin_id =', $id);
        $query2 = $this->db->get('cuentas');
        
        if ($query->num_rows() > 0 || $query2->num_rows() > 0) {
            echo 'existe';
        } else {
            $result = $this->db->delete('relate_users', array('id' => $id));
			return $result;
        }
       
    }
    

}
?>
