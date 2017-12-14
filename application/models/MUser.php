<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class MUser extends CI_Model {


    public function __construct() {
       
        parent::__construct();
        $this->load->database();
    }

    // Public method to obtain the users
    public function obtener() {
        $query = $this->db->get('users');

        if ($query->num_rows() > 0)
            return $query->result();
        else
            return $query->result();
    }
    
    // Public method to obtain the permissions asociated
    public function obtener_permisos() {
        $query = $this->db->get('permissions');

        if ($query->num_rows() > 0)
            return $query->result();
        else
            return $query->result();
    }
    
    // Public method to obtain the permissions asociated by user_id
    public function obtener_permisos_id($id_user) {
		$this->db->where('user_id =', $id_user);
        $query = $this->db->get('permissions');

        if ($query->num_rows() > 0)
            return $query->result();
        else
            return $query->result();
    }
    
    // Public method to obtain the permissions asociated by user_id and action_id
    public function obtener_permiso_ids($id_user, $id_action) {
		$this->db->where('user_id =', $id_user);
		$this->db->where('action_id =', $id_action);
        $query = $this->db->get('permissions');

        if ($query->num_rows() > 0)
            return $query->result();
        else
            return $query->result();
    }
    
    // Public method to obtain the tiendas assigned to user
    public function obtenerUsersTiendas() {
        $query = $this->db->get('users_tiendas');
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return $query->result();
    }
    
    // Public method to obtain the services of the tiendas by tienda_id
    public function obtenerTiendasUserId($id_user) {
        $this->db->where('user_id', $id_user);
        $query = $this->db->get('users_tiendas');
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return $query->result();
    }
    
    // Public method to obtain the permissions asociated by user_id and tienda_id
    public function obtenerUserTiendaId($id_user, $id_tienda) {
		$this->db->where('user_id =', $id_user);
		$this->db->where('tienda_id =', $id_tienda);
        $query = $this->db->get('users_tiendas');

        if ($query->num_rows() > 0)
            return $query->result();
        else
            return $query->result();
    }

    // Public method to insert the data
    public function insert($datos) {
        $result = $this->db->where('username =', $datos['username']);
        $result = $this->db->get('users');
        if ($result->num_rows() > 0) {
            return 'existe';
        } else {
            $result = $this->db->insert("users", $datos);
            $id = $this->db->insert_id();
            return $id;
        }
    }
    
    // Public method to insert the tienda associated
    public function insert_tienda($datos) {
		$result = $this->db->insert("users_tiendas", $datos);
		return $result;
    }
    
    // Public method to insert the action associated
    public function insert_action($datos) {
		$result = $this->db->insert("permissions", $datos);
		return $result;
    }
    
    // Public method to insert the actions asociated
    public function update_action($datos) {
		$this->db->where('user_id', $datos['user_id']);
		$this->db->where('action_id', $datos['action_id']);
		$result = $this->db->update('permissions', $datos);
		return $result;
    }

    // Public method to obtain the users by id
    public function obtenerUsers($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('users');
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return $query->result();
    }

    // Public method to obtain the users by id
    public function obtenerUserName($username) {
        $this->db->where('username', $username);
        $query = $this->db->get('users');
        
        return $query->result();
    }

    // Public method to update a record 
    public function update($datos) {
        $result = $this->db->where('username =', $datos['username']);
        $result = $this->db->where('id !=', $datos['id']);
        $result = $this->db->get('users');

        if ($result->num_rows() > 0) {
            return 'existe';
        } else {
            $result = $this->db->where('id', $datos['id']);
            $result = $this->db->update('users', $datos);
            return $result;
        }
    }
    
    // Public method to update a record 
    public function update_status($datos) {
		$result = $this->db->where('id', $datos['id']);
		$result = $this->db->update('users', $datos);
		return $result;
	}

    // Public method to delete a record
     public function delete($id) {
        $result = $this->db->delete('users', array('id' => $id));
        return $result;
    }
    
    // Public method to delete the tiendas asociated 
    public function delete_user_tienda($id_user, $id_tienda) {
		$result = $this->db->delete('users_tiendas', array('user_id' => $id_user, 'tienda_id' => $id_tienda));
    }

    // Public method to delete the tiendas asociated 
    public function delete_user_action($id_user, $id_action) {
		$result = $this->db->delete('permissions', array('user_id' => $id_user, 'action_id' => $id_action));
    }
    
    // Public method to obtain the actions asociated to profile_id
    public function search_profile_actions($id_profile)
    {
        $result = $this->db->where('profile_id', $id_profile);
        $result = $this->db->get('profile_actions');
        return $result->result();
    }
    
    // Public method to obtain the actions asociated to user_id
    public function search_permissions($id_user)
    {
        $result = $this->db->where('user_id', $id_user);
        $result = $this->db->get('permissions');
        return $result->result();
    }
    
    // Public method to obtain the actions not asociated to profile_id list
    public function search_actions($list_actions_ids)
    {
        $this->db->where_not_in('id',$list_actions_ids);
        $result = $this->db->get('actions');
        return $result->result();
    }
    
    // Public method to obtain the actions not asociated to user_id list
    public function search_actions2($list_actions_ids)
    {
        $this->db->where_in('id',$list_actions_ids);
        $result = $this->db->get('actions');
        return $result->result();
    }

}
?>
