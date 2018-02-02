<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class MProjects extends CI_Model {
	
	public function __construct() {
       
        parent::__construct();
        $this->load->database();
    }

    //Public method to obtain the projects
    public function obtener() {
		
		$this->db->select('pj.id, pj.name, pj.description, pj.valor, pj.date');
		$this->db->from('projects pj');
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

    // Public method to serach the photos associated
    public function buscar_photos($project_id) {
        $result = $this->db->where('project_id =', $project_id);
        $result = $this->db->get('photos');
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
    
    // Public method to obtain the photos by project_id
    public function obtenerFotos($project_id) {
        $this->db->where('project_id', $project_id);
        $query = $this->db->get('photos');
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
