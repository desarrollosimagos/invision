<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class MProjects extends CI_Model {
	
	public function __construct() {
       
        parent::__construct();
        $this->load->database();
    }

    //Public method to obtain the projects
    public function obtener() {
		
		$this->db->select('pj.id, pj.name, pj.description, p_t.type as type, pj.valor, pj.amount_r, pj.amount_min, pj.amount_max, pj.date, pj.date_r, pj.date_v, pj.status, c.description as coin, c.abbreviation as coin_avr, c.symbol as coin_symbol');
		$this->db->from('projects pj');
		$this->db->join('project_types p_t', 'p_t.id = pj.type');
		$this->db->join('coins c', 'c.id = pj.coin_id');
		$this->db->order_by("pj.id", "desc");
		$query = $this->db->get();

		if ($query->num_rows() > 0)
			return $query->result();
		else
			return $query->result();
            
    }

    // Public method to insert the data
    public function insert($datos) {
		
		$result = $this->db->insert("projects", $datos);
		$id = $this->db->insert_id();
		return $id;
        
    }
    
    // Public method to insert the data
    public function insert_photo($datos) {
		// Primero obtenemos el nombre de la photo sin extensión para que no haya riesgo de duplicado
		$without_ext = explode(".",$datos['photo']);
		$without_ext = $without_ext[0];
        $result = $this->db->where('project_id =', $datos['project_id']);
        $result = $this->db->like('photo', $without_ext);
        $result = $this->db->get('project_photos');
        if ($result->num_rows() > 0) {
			$result = $this->db->where('project_id =', $datos['project_id']);
			$result = $this->db->like('photo', $without_ext);
			$result = $this->db->update("project_photos", $datos);
            return 'existe';
        } else {
            $result = $this->db->insert("project_photos", $datos);
            $id = $this->db->insert_id();
            return $id;
        }
    }
    
    // Public method to insert the data
    public function insert_document($datos) {
		// Primero obtenemos el nombre del documento sin extensión para que no haya riesgo de duplicado
		$without_ext = explode(".",$datos['description']);
		$without_ext = $without_ext[0];
        $result = $this->db->where('project_id =', $datos['project_id']);
        $result = $this->db->like('description', $without_ext);
        $result = $this->db->get('project_documents');
        if ($result->num_rows() > 0) {
			$result = $this->db->where('project_id =', $datos['project_id']);
			$result = $this->db->like('description', $without_ext);
			$result = $this->db->update("project_documents", $datos);
            return 'existe';
        } else {
            $result = $this->db->insert("project_documents", $datos);
            $id = $this->db->insert_id();
            return $id;
        }
    }
    
    // Public method to insert the data
    public function insert_reading($datos) {
		// Primero obtenemos el nombre de la lectura sin extensión para que no haya riesgo de duplicado
		$without_ext = explode(".",$datos['description']);
		$without_ext = $without_ext[0];
        $result = $this->db->where('project_id =', $datos['project_id']);
        $result = $this->db->like('description', $without_ext);
        $result = $this->db->get('project_readings');
        if ($result->num_rows() > 0) {
			$result = $this->db->where('project_id =', $datos['project_id']);
			$result = $this->db->like('description', $without_ext);
			$result = $this->db->update("project_readings", $datos);
            return 'existe';
        } else {
            $result = $this->db->insert("project_readings", $datos);
            $id = $this->db->insert_id();
            return $id;
        }
    }

    // Public method to serach the photos associated
    public function buscar_photos($project_id) {
        $result = $this->db->where('project_id =', $project_id);
        $result = $this->db->get('project_photos');
        return $result->result();
    }

    // Public method to serach the news associated
    public function buscar_noticias($project_id) {
        $result = $this->db->where('project_id =', $project_id);
        $result = $this->db->get('project_news');
        return $result->result();
    }

    // Public method to serach the documents associated
    public function buscar_documentos($project_id) {
        $result = $this->db->where('project_id =', $project_id);
        $result = $this->db->get('project_documents');
        return $result->result();
    }

    // Public method to serach the readings associated
    public function buscar_lecturas($project_id) {
        $result = $this->db->where('project_id =', $project_id);
        $result = $this->db->get('project_readings');
        return $result->result();
    }

    // Public method to serach the types associated
    public function buscar_tipos($project_id) {
        $result = $this->db->where('project_id =', $project_id);
        $result = $this->db->get('project_types');
        return $result->result();
    }

    // Public method to serach the investors associated
    public function buscar_grupos($project_id) {
        $this->db->select('i_g.name');
		$this->db->from('investorgroups_projects i_g_p');
		$this->db->join('investorgroups i_g', 'i_g.id = i_g_p.group_id');
		$this->db->where('project_id', $project_id);
		$query = $this->db->get();
		
        return $query->result();
    }

    // Public method to serach the investors associated
    public function buscar_inversores($project_id) {
        $this->db->select('i_g.name, u.username, u.name as name_user, u.alias, u.image');
		$this->db->from('investorgroups i_g');
		$this->db->join('investorgroups_projects i_g_p', 'i_g_p.group_id = i_g.id');
		$this->db->join('investorgroups_users i_g_u', 'i_g_u.group_id = i_g.id');
		$this->db->join('users u', 'u.id = i_g_u.user_id');
		$this->db->where('i_g_p.project_id', $project_id);
		$query = $this->db->get();
		
        return $query->result();
    }

    // Public method to serach the transactions associated
    public function buscar_transacciones($project_id) {
        $this->db->select('SUM(monto) as ingresos');
		$this->db->from('project_transactions p_t');
		$this->db->where('project_id', $project_id);
		$query = $this->db->get();
		
        return $query->result();
    }
    
    // Public method to serach the rules
    public function buscar_rules($variable1, $condicional, $variable2, $segmento) {
		$result = $this->db->where('var1', $variable1);
		$result = $this->db->where('cond', $condicional);
		$result = $this->db->where('var2', $variable2);
		$result = $this->db->where('segment', $segmento);
        $result = $this->db->get('project_rules');
        return $result->result();
    }

    // Public method to obtain the projects by id
    public function obtenerProyecto($id) {
		
		$select = 'p.id, p.name, p.description, p.valor, p.type, p.amount_r, p.amount_min, p.amount_max, ';
		$select .= 'p.public, p.coin_id, p.status, p.date, p.date_r, p.date_v, p.d_create, p.d_update, ';
		$select .= 'c.description as coin, c.abbreviation as coin_avr, c.symbol as coin_symbol, c.decimals as coin_decimals';
		
		$this->db->select($select);
		$this->db->from('projects p');
		//~ $this->db->join('users u', 'u.id = p.user_id');
		$this->db->join('coins c', 'c.id = p.coin_id');
		$this->db->where('p.id', $id);
		$query = $this->db->get();
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return $query->result();
            
    }

    // Public method to obtain the projects by id
    public function obtenerProyectoGrupo($id) {
		
        $this->db->where('project_id', $id);
        $query = $this->db->get('investorgroups_projects');
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return $query->result();
            
    }
    
    // Public method to obtain the photos by project_id
    public function obtenerFotos($project_id) {
        $this->db->where('project_id', $project_id);
        $query = $this->db->get('project_photos');
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return $query->result();
    }
    
    // Public method to obtain the documentos by project_id
    public function obtenerDocumentos($project_id) {
        $this->db->where('project_id', $project_id);
        $this->db->order_by('description', 'asc');
        $query = $this->db->get('project_documents');
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return $query->result();
    }
    
    // Public method to obtain the lecturas by project_id
    public function obtenerLecturas($project_id) {
        $this->db->where('project_id', $project_id);
        $this->db->order_by('description', 'asc');
        $query = $this->db->get('project_readings');
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return $query->result();
    }
    
    // Public method to obtain the types of projects
    public function obtenerTipos() {
        $query = $this->db->get('project_types');
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return $query->result();
    }
    
    // Public method to obtain the documentos by project_id
    public function obtenerTransacciones($project_id) {
		
		// Almacenamos los ids de los inversores asociados al asesor más su id propio en un array
		$ids = array($this->session->userdata('logged_in')['id']);
		$this->db->where('adviser_id', $this->session->userdata('logged_in')['id']);
        $query_asesor_inversores = $this->db->get('user_relations');
        if ($query_asesor_inversores->num_rows() > 0) {
            foreach($query_asesor_inversores->result() as $relacion){
				$ids[] = $relacion->investor_id;
			}
		}
		
		$select = 'pt.id, pt.user_id, pt.date, pt.type, pt.description, pt.monto, pt.status, u.username, c.alias, ';
		$select .= 'cn.description as coin, cn.abbreviation as coin_avr, cn.symbol as coin_symbol, u.name, u.alias';
		
		$this->db->select($select);
		$this->db->from('project_transactions pt');
		$this->db->join('accounts c', 'c.id = pt.cuenta_id');
		$this->db->join('coins cn', 'cn.id = c.coin_id');
		$this->db->join('users u', 'u.id = pt.user_id');
		$this->db->where('pt.project_id', $project_id);
		if($this->session->userdata('logged_in')['profile_id'] != 1 && $this->session->userdata('logged_in')['profile_id'] != 2){
			$this->db->where_in('pt.user_id', $ids);
		}
		$this->db->order_by("pt.date", "desc");
		$query = $this->db->get();
		
        return $query->result();
            
    }

    // Public method to update a record  
    public function update($datos) {
		
		$result = $this->db->where('id', $datos['id']);
		$result = $this->db->update('projects', $datos);
		return $result;
        
    }


    // Public method to delete a record
     public function delete($id) {
		 
		$result = $this->db->delete('projects', array('id' => $id));
		return $result;
       
    }

}
?>
