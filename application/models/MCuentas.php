<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class MCuentas extends CI_Model {


    public function __construct() {
       
        parent::__construct();
        $this->load->database();
    }

    //Public method to obtain the cuentas
    public function obtener() {
		
		$this->db->select('f_p.id, f_p.cuenta, f_p.numero, f_p.tipo, f_p.descripcion, f_p.monto, f_p.status, u.username as usuario, c.description as coin, c.abbreviation as coin_avr');
		$this->db->from('cuentas f_p');
		$this->db->join('users u', 'u.id = f_p.user_id');
		$this->db->join('coins c', 'c.id = f_p.coin_id');
		$this->db->order_by("f_p.id", "desc");
        $query = $this->db->get();
        //~ $query = $this->db->get('cuentas');

        if ($query->num_rows() > 0)
            return $query->result();
        else
            return $query->result();
            
    }

    // Public method to insert the data
    public function insert($datos) {
		
		$result = $this->db->insert("cuentas", $datos);
		$id = $this->db->insert_id();
		return $id;
        
    }

    // Public method to obtain the cuentas by id
    public function obtenerCuenta($id) {
		
        $this->db->where('id', $id);
        $query = $this->db->get('cuentas');
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return $query->result();
            
    }

    // Public method to update a record  
    public function update($datos) {
		
		$result = $this->db->where('id', $datos['id']);
		$result = $this->db->update('cuentas', $datos);
		return $result;
        
    }


    // Public method to delete a record
     public function delete($id) {
		 
		$result = $this->db->delete('cuentas', array('id' => $id));
		return $result;
       
    }
    

}
?>
