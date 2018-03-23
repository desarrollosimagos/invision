<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class MCuentas extends CI_Model {


    public function __construct() {
       
        parent::__construct();
        $this->load->database();
    }

    //Public method to obtain the accounts
    public function obtener() {
		
		$select = 'f_p.id, f_p.owner, f_p.alias, f_p.number, f_p.type, f_p.description, f_p.amount, f_p.status, ';
		$select .= 'u.username as usuario, c.description as coin, c.abbreviation as coin_avr, c.symbol as coin_symbol, ';
		$select .= 'c.decimals as coin_decimals, t_c.name as tipo_cuenta';
		
		$this->db->select($select);
		$this->db->from('accounts f_p');
		$this->db->join('users u', 'u.id = f_p.user_id');
		$this->db->join('coins c', 'c.id = f_p.coin_id');
		$this->db->join('account_type t_c', 't_c.id = f_p.type');
		// Si el usuario corresponde al de un administrador quitamos el filtro de usuario
        if($this->session->userdata('logged_in')['profile_id'] != 1 && $this->session->userdata('logged_in')['profile_id'] != 2){
			$this->db->where('f_p.user_id =', $this->session->userdata('logged_in')['id']);
		}
		$this->db->order_by("f_p.id", "desc");
		$query = $this->db->get();
		//~ $query = $this->db->get('accounts');

		if ($query->num_rows() > 0)
			return $query->result();
		else
			return $query->result();
            
    }

    // Public method to insert the data
    public function insert($datos) {
		
		$result = $this->db->insert("accounts", $datos);
		$id = $this->db->insert_id();
		return $id;
        
    }

    // Public method to obtain the accounts by id
    public function obtenerCuenta($id) {
		
        $this->db->where('id', $id);
        $query = $this->db->get('accounts');
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return $query->result();
            
    }

    // Public method to obtain the accounts by id
    public function obtenerCuentaFondos($id) {
		
        $this->db->where('cuenta_id', $id);
        $query = $this->db->get('transactions');
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return $query->result();
            
    }

    // Public method to obtain the accounts by id
    public function obtenerCuentaGrupos($id) {
		
        $this->db->where('account_id', $id);
        $query = $this->db->get('investor_groups_accounts');
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return $query->result();
            
    }

    // Public method to update a record  
    public function update($datos) {
		
		$result = $this->db->where('id', $datos['id']);
		$result = $this->db->update('accounts', $datos);
		return $result;
        
    }


    // Public method to delete a record
     public function delete($id) {
		 
		$result = $this->db->delete('accounts', array('id' => $id));
		return $result;
       
    }
    

}
?>
