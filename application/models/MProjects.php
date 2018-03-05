<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class MProjects extends CI_Model {
	
	public function __construct() {
       
        parent::__construct();
        $this->load->database();
    }

    //Public method to obtain the projects
    public function obtener() {
		
		$this->db->select('pj.id, pj.name, pj.description, p_t.type as type, pj.valor, pj.amount_r, pj.amount_min, pj.amount_max, pj.date, pj.date_r, pj.date_v');
		$this->db->from('projects pj');
		$this->db->join('project_types p_t', 'p_t.id = pj.type');
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
        $result = $this->db->get('photos');
        if ($result->num_rows() > 0) {
			$result = $this->db->where('project_id =', $datos['project_id']);
			$result = $this->db->like('photo', $without_ext);
			$result = $this->db->update("photos", $datos);
            return 'existe';
        } else {
            $result = $this->db->insert("photos", $datos);
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
        $result = $this->db->get('photos');
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

    // Public method to obtain the projects by id
    public function obtenerProyecto($id) {
		
        $this->db->where('id', $id);
        $query = $this->db->get('projects');
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return $query->result();
            
    }

    // Public method to obtain the projects by id
    public function obtenerProyectoGrupo($id) {
		
        $this->db->where('project_id', $id);
        $query = $this->db->get('investor_groups_projects');
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return $query->result();
            
    }
    
    // Public method to obtain the photos by project_id
    public function obtenerFotos($project_id) {
        $this->db->where('project_id', $project_id);
        $query = $this->db->get('photos');
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
