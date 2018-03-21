<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_table_transactions extends CI_Migration
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
				"fecha" => array(
					"type" => "VARCHAR",
					"constraint" => 20,
					"null" => TRUE
				),
				"user_id" => array(
					"type" => "INT",
					"constraint" => 11,
					"null" => TRUE
				),
				"cuenta_id" => array(
					"type" => "INT",
					"constraint" => 11,
					"null" => TRUE
				),
				"tipo" => array(
					"type" => "VARCHAR",
					"constraint" => 25,
					"null" => TRUE
				),
				"descripcion" => array(
					"type" => "VARCHAR",
					"constraint" => 250,
					"null" => TRUE
				),
				"referencia" => array(
					"type" => "VARCHAR",
					"constraint" => 100,
					"null" => TRUE
				),
				"observaciones" => array(
					"type" => "TEXT",
					"null" => TRUE
				),
				"monto" => array(
					"type" => "FLOAT",
					"null" => TRUE
				),
				"document" => array(
					"type" => "VARCHAR",
					"constraint" => 100,
					"null" => TRUE
				),
				"status" => array(
					"type" => "VARCHAR",
					"constraint" => 25,
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
		
		$this->dbforge->add_key('cuenta_id');  // Establecemos la cuenta_id como key
		
		$this->dbforge->create_table('transactions', TRUE);
		
	}
	
	public function down(){
		
		// Eliminamos la tabla 'transactions'
		$this->dbforge->drop_table('transactions', TRUE);
		
	}
	
}
