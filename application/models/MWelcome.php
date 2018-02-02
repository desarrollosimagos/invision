<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class MWelcome extends CI_Model {


    public function __construct() {
       
        parent::__construct();
        $this->load->database();
    }

    public function get_slider_projects()
    {
        $result = $this->db->get('projects');
        return $result->result();
    }

    public function get_slider_detail($id)
    {
        $this->db->where('id =', $id);
        $result = $this->db->get('projects');
        return $result->row();
    }

}
?>
