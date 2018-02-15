<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class MResumen extends CI_Model {


    public function __construct() {
       
        parent::__construct();
        $this->load->database();
    }

    //Public method to obtain the fondo_personal
    public function obtener() {
		
		// Almacenamos los ids de los inversores asociados al asesor más su id propio en un array
		$ids = array($this->session->userdata('logged_in')['id']);
		$this->db->where('adviser_id', $this->session->userdata('logged_in')['id']);
        $query_asesor_inversores = $this->db->get('relate_users');
        if ($query_asesor_inversores->num_rows() > 0) {
            foreach($query_asesor_inversores->result() as $relacion){
				$ids[] = $relacion->investor_id;
			}
		}
		
		$this->db->select('f_p.id, f_p.cuenta_id, f_p.tipo, f_p.descripcion, f_p.referencia, f_p.observaciones, f_p.monto, f_p.status, u.username as usuario, c.cuenta, c.numero, cn.description as coin, cn.abbreviation as coin_avr, cn.symbol as coin_symbol');
		$this->db->from('fondo_personal f_p');
		$this->db->join('users u', 'u.id = f_p.user_id');
		$this->db->join('cuentas c', 'c.id = f_p.cuenta_id');
		$this->db->join('coins cn', 'cn.id = c.coin_id');
		// Si el usuario corresponde al de un administrador o plataforma quitamos el filtro de usuarios
        if($this->session->userdata('logged_in')['profile_id'] != 1 && $this->session->userdata('logged_in')['profile_id'] != 2){
			$this->db->where_in('f_p.user_id', $ids);
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
    public function capitalPendiente() {
		if($this->session->userdata('logged_in')['profile_id'] != 1 && $this->session->userdata('logged_in')['profile_id'] != 2){
			$this->db->select_sum('monto');
			$this->db->where('status', 0);
			$this->db->where('user_id', $this->session->userdata('logged_in')['id']);
		}else{
			$this->db->select_sum('monto');
			$this->db->where('status', 0);			
		}
        $query = $this->db->get('fondo_personal');
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return $query->result();
            
    }

    // Public method to obtain the fondo_personal by id
    public function capitalAprobado() {
		
		// Datos de moneda del usuario
		$iso_moneda_usu = $this->session->userdata('logged_in')['coin_iso'];
		
		$capitalAprobado = 0;
		
		$this->db->select('f_p.id, f_p.cuenta_id, f_p.tipo, f_p.monto, f_p.status, cn.description as coin, cn.abbreviation as coin_avr, cn.symbol as coin_symbol');
		$this->db->from('fondo_personal f_p');
		$this->db->join('cuentas c', 'c.id = f_p.cuenta_id');
		$this->db->join('coins cn', 'cn.id = c.coin_id');
		if($this->session->userdata('logged_in')['profile_id'] != 1 && $this->session->userdata('logged_in')['profile_id'] != 2){
			$this->db->where('f_p.status', 1);
			$this->db->where('f_p.user_id', $this->session->userdata('logged_in')['id']);
		}else{
			$this->db->where('f_p.status', 1);
		}
        $query = $this->db->get();
        
        foreach($query->result() as $result){
			if($result->tipo == 1){
				$capitalAprobado += $result->monto;
			}else{
				$capitalAprobado -= $result->monto;
			}
		}
		
        return $capitalAprobado;
            
    }

    // Public method to obtain the fondo_personal by id
    public function fondos_json() {
		
		$capitalAprobado = 0;
		
		$this->db->select('f_p.id, f_p.cuenta_id, f_p.tipo, f_p.monto, f_p.status, cn.description as coin, cn.abbreviation as coin_avr, cn.symbol as coin_symbol');
		$this->db->from('fondo_personal f_p');
		$this->db->join('cuentas c', 'c.id = f_p.cuenta_id');
		$this->db->join('coins cn', 'cn.id = c.coin_id');
		if($this->session->userdata('logged_in')['profile_id'] != 1 && $this->session->userdata('logged_in')['profile_id'] != 2){
			$this->db->where('f_p.user_id', $this->session->userdata('logged_in')['id']);
		}
        $query = $this->db->get();
        
        return $query->result();
            
    }

    // Public method to obtain the fondo_personal by id
    public function fondos_json_users() {
		
		// Almacenamos los ids de los inversores asociados al asesor más su id propio en un array
		$ids = array($this->session->userdata('logged_in')['id']);
		$this->db->where('adviser_id', $this->session->userdata('logged_in')['id']);
        $query_asesor_inversores = $this->db->get('relate_users');
        if ($query_asesor_inversores->num_rows() > 0) {
            foreach($query_asesor_inversores->result() as $relacion){
				$ids[] = $relacion->investor_id;
			}
		}
		
		$select = 'u.name, u.lastname, u.username, f_p.id, f_p.user_id, f_p.cuenta_id, f_p.tipo, f_p.monto, f_p.status, ';
		$select .= 'cn.description as coin, cn.abbreviation as coin_avr, cn.symbol as coin_symbol';
		
		$this->db->select($select);
		$this->db->from('fondo_personal f_p');
		$this->db->join('cuentas c', 'c.id = f_p.cuenta_id');
		$this->db->join('coins cn', 'cn.id = c.coin_id');
		$this->db->join('users u', 'u.id = f_p.user_id');
		if($this->session->userdata('logged_in')['profile_id'] != 1 && $this->session->userdata('logged_in')['profile_id'] != 2){
			$this->db->where_in('f_p.user_id', $ids);
		}
        $query = $this->db->get();
        
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
