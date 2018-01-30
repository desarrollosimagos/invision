<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class MInvestorGroups extends CI_Model {


    public function __construct() {
       
        parent::__construct();
        $this->load->database();
    }

    //Public method to obtain the investor_groups
    public function obtener() {
        $query = $this->db->get('investor_groups');

        if ($query->num_rows() > 0)
            return $query->result();
        else
            return $query->result();
    }
    
    //Public method to obtain the asociated users
    public function obtener_inversores() {
        $query = $this->db->get('investor_groups_users');

        if ($query->num_rows() > 0)
            return $query->result();
        else
            return $query->result();
    }
    
    //Public method to obtain the asociated accounts
    public function obtener_cuentas() {
        $query = $this->db->get('investor_groups_accounts');

        if ($query->num_rows() > 0)
            return $query->result();
        else
            return $query->result();
    }
    
    //Public method to obtain the users asociated by id_group
    public function obtener_usuarios_id($id_group) {
		$this->db->where('group_id =', $id_group);
        $query = $this->db->get('investor_groups_users');

        if ($query->num_rows() > 0)
            return $query->result();
        else
            return $query->result();
    }
    
    //Public method to obtain the accounts asociated by id_group
    public function obtener_cuentas_id($id_group) {
		$this->db->where('group_id =', $id_group);
        $query = $this->db->get('investor_groups_accounts');

        if ($query->num_rows() > 0)
            return $query->result();
        else
            return $query->result();
    }
    
    //Public method to obtain the actions asociated by group_id and user_id
    public function obtener_usuarios_ids($id_group, $id_user) {
		$this->db->where('group_id =', $id_group);
		$this->db->where('user_id =', $id_user);
        $query = $this->db->get('investor_groups_users');

        if ($query->num_rows() > 0)
            return $query->result();
        else
            return $query->result();
    }
    
    //Public method to obtain the actions asociated by group_id and account_id
    public function obtener_cuentas_ids($id_group, $id_accout) {
		$this->db->where('group_id =', $id_group);
		$this->db->where('account_id =', $id_accout);
        $query = $this->db->get('investor_groups_accounts');

        if ($query->num_rows() > 0)
            return $query->result();
        else
            return $query->result();
    }

    // Public method to insert the data
    public function insert($datos) {
        $result = $this->db->where('name =', $datos['name']);
        $result = $this->db->get('investor_groups');
        if ($result->num_rows() > 0) {
            return 'existe';
        } else {
            $result = $this->db->insert("investor_groups", $datos);
            $id = $this->db->insert_id();
            return $id;
        }
    }
    
    // Public method to insert the asociated users
    public function insert_user($datos) {
		$result = $this->db->insert("investor_groups_users", $datos);
    }
    
    // Public method to insert the asociated users
    public function insert_account($datos) {
		$result = $this->db->insert("investor_groups_accounts", $datos);
    }
    
    // Public method to insert the actions asociated
    public function update_action($datos) {
		$this->db->where('investor_groups_id', $datos['investor_groups_id']);
		$this->db->where('action_id', $datos['action_id']);
		$result = $this->db->update('investor_groups_actions', $datos);
		return $result;
    }

    // Public method to obtain the investor_groups by id
    public function obtenerPerfiles($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('investor_groups');
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return $query->result();
    }

    // Public method to update a record 
    public function update($datos) {
        $result = $this->db->where('name =', $datos['name']);
        $result = $this->db->where('id !=', $datos['id']);
        $result = $this->db->get('investor_groups');

        if ($result->num_rows() > 0) {
            return 'existe';
        } else {
            $result = $this->db->where('id', $datos['id']);
            $result = $this->db->update('investor_groups', $datos);
            return $result;
        }
    }

    // Public method to delete a record 
    public function delete($id) {
        $result = $this->db->where('investor_groups_id =', $id);
        $result = $this->db->get('users');

        if ($result->num_rows() > 0) {
            echo 'existe';
        } else {
			// Primero buscamos y eliminamos las acciones asociadas en la tabla 'investor_groups_actions'
			$query_actions = $this->obtener_acciones_id($id);
			if(count($query_actions) > 0){
				foreach($query_actions as $action){
					$delete_action = $this->delete_action($action->id);
				}
			}
			// Eliminamos el perfil
            $result = $this->db->delete('investor_groups', array('id' => $id));
            return $result;
        }
       
    }
    
    // Public method to delete the asociated user
    public function delete_user($id) {
		$result = $this->db->delete('investor_groups_users', array('id' => $id));
    }
    
    // Public method to delete the asociated account
    public function delete_account($id) {
		$result = $this->db->delete('investor_groups_accounts', array('id' => $id));
    }
    
    // Public method to delete a specific association
    public function delete_investor_groups_user($id_group, $id_user) {
		$result = $this->db->delete('investor_groups_users', array('group_id' => $id_group, 'user_id' => $id_user));
    }
    
    // Public method to delete a specific association
    public function delete_investor_groups_account($id_group, $id_account) {
		$result = $this->db->delete('investor_groups_accounts', array('group_id' => $id_group, 'account_id' => $id_account));
    }
    

}
?>
