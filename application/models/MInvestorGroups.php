<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class MInvestorGroups extends CI_Model {


    public function __construct() {
       
        parent::__construct();
        $this->load->database();
    }

    //Public method to obtain the investorgroups
    public function obtener() {
        $query = $this->db->get('investorgroups');

        if ($query->num_rows() > 0)
            return $query->result();
        else
            return $query->result();
    }
    
    //Public method to obtain the asociated accounts
    public function obtener_proyectos() {
        $query = $this->db->get('investorgroups_projects');

        if ($query->num_rows() > 0)
            return $query->result();
        else
            return $query->result();
    }
    
    //Public method to obtain the asociated users
    public function obtener_inversores() {
        $query = $this->db->get('investorgroups_users');

        if ($query->num_rows() > 0)
            return $query->result();
        else
            return $query->result();
    }
    
    //Public method to obtain the asociated accounts
    public function obtener_cuentas() {
        $query = $this->db->get('investorgroups_accounts');

        if ($query->num_rows() > 0)
            return $query->result();
        else
            return $query->result();
    }
    
    //Public method to obtain the users asociated by id_group
    public function obtener_proyectos_id($id_group) {
		$this->db->where('group_id =', $id_group);
        $query = $this->db->get('investorgroups_projects');

        if ($query->num_rows() > 0)
            return $query->result();
        else
            return $query->result();
    }
    
    //Public method to obtain the users asociated by id_group
    public function obtener_usuarios_id($id_group) {
		$this->db->where('group_id =', $id_group);
        $query = $this->db->get('investorgroups_users');

        if ($query->num_rows() > 0)
            return $query->result();
        else
            return $query->result();
    }
    
    //Public method to obtain the accounts asociated by id_group
    public function obtener_cuentas_id($id_group) {
		$this->db->where('group_id =', $id_group);
        $query = $this->db->get('investorgroups_accounts');

        if ($query->num_rows() > 0)
            return $query->result();
        else
            return $query->result();
    }
    
    //Public method to obtain the projects asociated by group_id and project_id
    public function obtener_proyectos_ids($id_group, $id_project) {
		$this->db->where('group_id =', $id_group);
		$this->db->where('project_id =', $id_project);
        $query = $this->db->get('investorgroups_projects');

        if ($query->num_rows() > 0)
            return $query->result();
        else
            return $query->result();
    }
    
    //Public method to obtain the actions asociated by group_id and user_id
    public function obtener_usuarios_ids($id_group, $id_user) {
		$this->db->where('group_id =', $id_group);
		$this->db->where('user_id =', $id_user);
        $query = $this->db->get('investorgroups_users');

        if ($query->num_rows() > 0)
            return $query->result();
        else
            return $query->result();
    }
    
    //Public method to obtain the actions asociated by group_id and account_id
    public function obtener_cuentas_ids($id_group, $id_accout) {
		$this->db->where('group_id =', $id_group);
		$this->db->where('account_id =', $id_accout);
        $query = $this->db->get('investorgroups_accounts');

        if ($query->num_rows() > 0)
            return $query->result();
        else
            return $query->result();
    }

    // Public method to insert the data
    public function insert($datos) {
        $result = $this->db->where('name =', $datos['name']);
        $result = $this->db->get('investorgroups');
        if ($result->num_rows() > 0) {
            return 'existe';
        } else {
            $result = $this->db->insert("investorgroups", $datos);
            $id = $this->db->insert_id();
            return $id;
        }
    }
    
    // Public method to insert the asociated users
    public function insert_user($datos) {
		$result = $this->db->insert("investorgroups_users", $datos);
    }
    
    // Public method to insert the asociated accounts
    public function insert_account($datos) {
		$result = $this->db->insert("investorgroups_accounts", $datos);
    }
    
    // Public method to insert the asociated projects
    public function insert_project($datos) {
		$result = $this->db->insert("investorgroups_projects", $datos);
    }
    
    // Public method to insert the asociated users
    public function update_user($datos) {
		$this->db->where('group_id', $datos['group_id']);
		$this->db->where('user_id', $datos['user_id']);
		$result = $this->db->update('investorgroups_users', $datos);
		return $result;
    }
    
    // Public method to insert the asociated users
    public function update_account($datos) {
		$this->db->where('group_id', $datos['group_id']);
		$this->db->where('account_id', $datos['account_id']);
		$result = $this->db->update('investorgroups_accounts', $datos);
		return $result;
    }

    // Public method to obtain the investorgroups by id
    public function obtenerGrupos($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('investorgroups');
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return $query->result();
    }

    // Public method to update a record 
    public function update($datos) {
        $result = $this->db->where('name =', $datos['name']);
        $result = $this->db->where('id !=', $datos['id']);
        $result = $this->db->get('investorgroups');

        if ($result->num_rows() > 0) {
            return 'existe';
        } else {
            $result = $this->db->where('id', $datos['id']);
            $result = $this->db->update('investorgroups', $datos);
            return $result;
        }
    }

    // Public method to delete a record 
    public function delete($id) {
		
		// Primero buscamos y eliminamos los usuarios asociados en la tabla 'investorgroups_users'
		$query_users = $this->obtener_usuarios_id($id);
		if(count($query_users) > 0){
			foreach($query_users as $user){
				$delete_user = $this->delete_user($user->id);
			}
		}
		// Luego buscamos y eliminamos las cuentas asociadas en la tabla 'investorgroups_accounts'
		$query_accounts = $this->obtener_cuentas_id($id);
		if(count($query_accounts) > 0){
			foreach($query_accounts as $account){
				$delete_account = $this->delete_account($account->id);
			}
		}
		// Eliminamos el grupo
		$result = $this->db->delete('investorgroups', array('id' => $id));
		return $result;
       
    }
    
    // Public method to delete the asociated user
    public function delete_user($id) {
		$result = $this->db->delete('investorgroups_users', array('id' => $id));
    }
    
    // Public method to delete the asociated account
    public function delete_account($id) {
		$result = $this->db->delete('investorgroups_accounts', array('id' => $id));
    }
    
    // Public method to delete a specific association
    public function delete_investorgroups_project($id_group, $id_project) {
		$result = $this->db->delete('investorgroups_projects', array('group_id' => $id_group, 'project_id' => $id_project));
    }
    
    // Public method to delete a specific association
    public function delete_investorgroups_user($id_group, $id_user) {
		$result = $this->db->delete('investorgroups_users', array('group_id' => $id_group, 'user_id' => $id_user));
    }
    
    // Public method to delete a specific association
    public function delete_investorgroups_account($id_group, $id_account) {
		$result = $this->db->delete('investorgroups_accounts', array('group_id' => $id_group, 'account_id' => $id_account));
    }
    

}
?>
