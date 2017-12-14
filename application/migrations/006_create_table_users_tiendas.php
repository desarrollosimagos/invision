<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_table_users_tiendas extends CI_Migration
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
				"user_id" => array(
					"type" => "INT",
					"constraint" => 11,
					"null" => TRUE
				),
				"tienda_id" => array(
					"type" => "INT",
					"constraint" => 11,
					"null" => TRUE
				),
				"tipo" => array(
					"type" => "INT",
					"constraint" => 11,
					"null" => TRUE
				),
				"status" => array(
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
				)
			)
		);
		
		$this->dbforge->add_key('id', TRUE);  // Establecemos el id como primary_key
		
		$this->dbforge->add_key('user_id');  // Establecemos el user_id como key
		
		$this->dbforge->add_key('tienda_id');  // Establecemos el tienda_id como key
		
		$this->dbforge->create_table('users_tiendas', TRUE);
		
	}
	
	public function down(){
		
		// Eliminamos la tabla 'users_tiendas'
		$this->dbforge->drop_table('users_tiendas', TRUE);
		
	}
	
}
