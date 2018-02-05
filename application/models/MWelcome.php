<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class MWelcome extends CI_Model {


    public function __construct() {
       
        parent::__construct();
        $this->load->database();
    }

    public function get_slider_projects()
    {
        $this->db->select('a.id, a.name, a.description, b.photo as image');
        $this->db->from('projects a');
        $this->db->join('photos b', 'b.project_id = a.id');
        $result = $this->db->get();
        return $result->result();
    }

    public function get_slider_detail($id)
    {
        $this->db->where('a.id =', $id);
        $this->db->select('a.id, a.name, a.description, b.photo as image');
        $this->db->from('projects a');
        $this->db->join('photos b', 'b.project_id = a.id');
        $result = $this->db->get();
        return $result->row();
    }

}
?>
