<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_table_project_transactions_relations extends CI_Migration
{
	public function up(){
		
		// Creamos la estructura de la nueva tabla usando la clase dbforge de Codeigniter
		$this->dbforge->add_field(
			array(
				"id" => array(
					"type" => "INT",
					"constraint" => 11,
					"unsigned" => TRUE,
					"auto_increment" => TRUE,
					"null" => FALSE
				),
				"transactions_parent_id" => array(
					"type" => "INT",
					"constraint" => 11,
					"null" => TRUE
				),
				"transactions_projects_id" => array(
					"type" => "INT",
					"constraint" => 11,
					"null" => TRUE
				),
				"d_create" => array(
					"type" => "TIMESTAMP",
					"null" => TRUE
				),
				"d_update" => array(
					"type" => "TIMESTAMP",
					"null" => TRUE
				),
			)
		);
		
		$this->dbforge->add_key('id', TRUE);  // Establecemos el id como primary_key
		
		$this->dbforge->add_key('transactions_parent_id');  // Establecemos la transactions_parent_id como key
		
		$this->dbforge->add_key('transactions_projects_id');  // Establecemos el transactions_projects_id como key
		
		$this->dbforge->create_table('project_transactions_relations', TRUE);
		
	}
	
	public function down(){
		
		// Eliminamos la tabla 'project_transactions_relations'
		$this->dbforge->drop_table('project_transactions_relations', TRUE);
		
	}
	
}
