<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_table_cuentas extends CI_Migration
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
				"cuenta" => array(
					"type" => "VARCHAR",
					"constraint" => 250
				),
				"numero" => array(
					"type" => "VARCHAR",
					"constraint" => 100,
					"null" => TRUE
				),
				"user_id" => array(
					"type" => "INT",
					"constraint" => 11,
					"null" => TRUE
				),
				"tipo" => array(
					"type" => "INT",
					"constraint" => 11,
					"null" => TRUE
				),
				"descripcion" => array(
					"type" => "VARCHAR",
					"constraint" => 250,
					"null" => TRUE
				),
				"monto" => array(
					"type" => "FLOAT",
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
				),
			)
		);
		
		$this->dbforge->add_key('id', TRUE);  // Establecemos el id como primary_key
		
		$this->dbforge->add_key('user_id');  // Establecemos el user_id como key
		
		$this->dbforge->create_table('cuentas', TRUE);
		
	}
	
	public function down(){
		
		// Eliminamos la tabla 'cuentas'
		$this->dbforge->drop_table('cuentas', TRUE);
		
	}
	
}
