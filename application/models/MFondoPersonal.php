<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class MFondoPersonal extends CI_Model {


    public function __construct() {
       
        parent::__construct();
        $this->load->database();
    }

    //Public method to obtain the transactions
    public function obtener() {
		
		$this->db->select('f_p.id, f_p.cuenta_id, f_p.tipo, f_p.descripcion, f_p.referencia, f_p.observaciones, f_p.monto, f_p.status, u.username as usuario, c.cuenta, c.numero, cn.description as coin, cn.abbreviation as coin_avr, cn.symbol as coin_symbol');
		$this->db->from('transactions f_p');
		$this->db->join('users u', 'u.id = f_p.user_id');
		$this->db->join('accounts c', 'c.id = f_p.cuenta_id');
		$this->db->join('coins cn', 'cn.id = c.coin_id');
		// Si el usuario corresponde al de un administrador quitamos el filtro de perfil
        if($this->session->userdata('logged_in')['profile_id'] != 1 && $this->session->userdata('logged_in')['profile_id'] != 2){
			$this->db->where('f_p.user_id =', $this->session->userdata('logged_in')['id']);
		}
		$this->db->order_by("f_p.id", "desc");
        $query = $this->db->get();
        //~ $query = $this->db->get('transactions');

        if ($query->num_rows() > 0)
            return $query->result();
        else
            return $query->result();
            
    }

    //Public method to obtain the transactions
    public function obtener_cuentas_group($tipo) {
		
		// Si el usuario corresponde al de un administrador quitamos el filtro de usuario
        if($this->session->userdata('logged_in')['profile_id'] != 1 && $this->session->userdata('logged_in')['profile_id'] != 2){
			if($tipo == 1){
				$this->db->select('c.id, c.cuenta, c.numero, cn.abbreviation as coin_avr');
				$this->db->from('users u');
				$this->db->join('investor_groups_users i_g_u', 'i_g_u.user_id=u.id');
				$this->db->join('investor_groups i_g', 'i_g.id=i_g_u.group_id');
				$this->db->join('investor_groups_accounts i_g_a', 'i_g_a.group_id=i_g.id');
				$this->db->join('accounts c', 'c.id=i_g_a.account_id');
				$this->db->join('coins cn', 'cn.id = c.coin_id');
				$this->db->where('u.id =', $this->session->userdata('logged_in')['id']);
				$this->db->order_by("c.cuenta", "desc");
				$this->db->group_by(array("c.id", "c.cuenta", "c.numero", "cn.abbreviation"));
			}else if($tipo == 2){
				$this->db->select('c.id, c.cuenta, c.numero, cn.abbreviation as coin_avr');
				$this->db->from('accounts c');
				$this->db->join('users u', 'u.id=c.user_id');
				$this->db->join('coins cn', 'cn.id = c.coin_id');
				$this->db->where('c.user_id =', $this->session->userdata('logged_in')['id']);
				$this->db->order_by("c.cuenta", "desc");
			}
		}else{
			if($tipo == 1){
				$this->db->select('c.id, c.cuenta, c.numero, cn.abbreviation as coin_avr');
				$this->db->from('accounts c');
				$this->db->join('coins cn', 'cn.id = c.coin_id');
				$this->db->order_by("c.cuenta", "desc");
			}else if($tipo == 2){
				$this->db->select('c.id, c.cuenta, c.numero, cn.abbreviation as coin_avr');
				$this->db->from('accounts c');
				$this->db->join('coins cn', 'cn.id = c.coin_id');
				$this->db->where('c.user_id =', $this->session->userdata('logged_in')['id']);
				$this->db->order_by("c.cuenta", "desc");
			}
		}
        $query = $this->db->get();

        if ($query->num_rows() > 0)
            return $query->result();
        else
            return $query->result();
            
    }

    // Public method to insert the data
    public function insert($datos) {
		
		$result = $this->db->insert("transactions", $datos);
		$id = $this->db->insert_id();
		return $id;
        
    }

    // Public method to obtain the transactions by id
    public function obtenerFondoPersonal($id) {
		
        $this->db->where('id', $id);
        $query = $this->db->get('transactions');
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return $query->result();
            
    }

    // Public method to update a record  
    public function update($datos) {
		
		$result = $this->db->where('id', $datos['id']);
		$result = $this->db->update('transactions', $datos);
		return $result;
        
    }


    // Public method to delete a record
     public function delete($id) {
		 
		$result = $this->db->delete('transactions', array('id' => $id));
		return $result;
       
    }
    

}
?>
