<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CProjects extends CI_Controller {

	public function __construct() {
        parent::__construct();


       
		// Load database
        $this->load->model('MProjects');
        $this->load->model('MCoins');
		
    }
	
	public function index()
	{
		$this->load->view('base');
		
		$listar = array();
		
		$proyectos = $this->MProjects->obtener();
		
		foreach($proyectos as $proyecto ){
			
			// Proceso de busqueda de fotos asociadas al producto
			$num_fotos = $this->MProjects->buscar_photos($proyecto->id);
			$num_fotos = count($num_fotos);
			
			$data_proyecto = array(
				'id' => $proyecto->id,
				'name' => $proyecto->name,
				'description' => $proyecto->description,
				'valor' => $proyecto->valor,
				'date' => $proyecto->date,
				'num_fotos' => $num_fotos
			);
			
			$listar[] = $data_proyecto;
			
		}
		
		// Conversión a objeto
		$listar = json_decode( json_encode( $listar ), false );
		
		$data['listar'] = $listar;
		$this->load->view('projects/lista', $data);
		$this->load->view('footer');
	}
	
	public function register()
	{
		$this->load->view('base');
		$data['monedas'] = $this->MCoins->obtener();
		$this->load->view('projects/registrar', $data);
		$this->load->view('footer');
	}
	
	// Método para guardar un nuevo registro
    public function add() {
		
		$fecha = $this->input->post('date');
		$fecha = explode("/", $fecha);
		$fecha = $fecha[2]."-".$fecha[1]."-".$fecha[0];
		
		$datos = array(
			'name' => $this->input->post('name'),
			'description' => $this->input->post('description'),
            'valor' => $this->input->post('valor'),
            'date' => $fecha,
            'd_create' => date('Y-m-d H:i:s')
        );
        
        $result = $this->MProjects->insert($datos);
        
        // Si el proyecto fue registrado satisfactoriamente registramos las photos
        if ($result) {
			
			// Sección para el registro del archivo en la ruta establecida para tal fin (assets/img/projects)
			$ruta = getcwd();  // Obtiene el directorio actual en donde se esta trabajando
			
			//~ print_r($_FILES);
			$i = 0;
			
			$errors = 0;
			
			foreach($_FILES['imagen']['name'] as $imagen){
				
				if($imagen != ""){
					
					// Obtenemos la extensión
					$ext = explode(".",$imagen);
					$ext = $ext[1];
					$datos2 = array(
						'project_id' => $result,
						'photo' => "photo".($i+1)."_".$result.".".$ext,
						'd_create' => date('Y-m-d')
					);
					
					$insertar_photo = $this->MProjects->insert_photo($datos2);
					
					if (!move_uploaded_file($_FILES['imagen']['tmp_name'][$i], $ruta."/assets/img/projects/photo".($i+1)."_".$result.".".$ext)) {
						
						$errors += 1;
						
					}
					
					$i++;
				}
				
			}
			
			if($errors > 0){
				
				echo '{"response":"error2"}';
				
			}else{
				
				echo '{"response":"ok"}';
				
			}
       
        }else{
			
			echo '{"response":"error1"}';
			
		}
    }
	
	// Método para editar
    public function edit() {
		
		$this->load->view('base');
        $data['id'] = $this->uri->segment(3);
        $data['editar'] = $this->MProjects->obtenerProyecto($data['id']);
        $data['fotos_asociadas'] = $this->MProjects->obtenerFotos($data['id']);
        $this->load->view('projects/editar', $data);
		$this->load->view('footer');
    }
	
	// Método para actualizar
    public function update() {
		
		$fecha = $this->input->post('date');
		$fecha = explode("/", $fecha);
		$fecha = $fecha[2]."-".$fecha[1]."-".$fecha;
		
		$datos = array(
			'id' => $this->input->post('id'),
			'name' => $this->input->post('name'),
			'description' => $this->input->post('description'),
            'valor' => $this->input->post('valor'),
            'date' => $fecha,
            'd_create' => date('Y-m-d H:i:s')
		);
		
        $result = $this->MProjects->update($datos);
        
        if ($result) {
			
			// Sección para el registro del archivo en la ruta establecida para tal fin (assets/img/productos)
			$ruta = getcwd();  // Obtiene el directorio actual en donde se esta trabajando
			
			//~ print_r($_FILES);
			$i = 0;  // Indice de la imágen
			
			$errors = 0;
			
			foreach($_FILES['imagen']['name'] as $imagen){
				
				if($imagen != ""){
					
					// Obtenemos la extensión
					$ext = explode(".",$imagen);
					$ext = $ext[1];
					$datos2 = array(
						'project_id' => $_POST['id'],
						'photo' => "photo".($i+1)."_".$_POST['id'].".".$ext,
						'd_create' => date('Y-m-d')
					);
					
					//~ echo "photo".($i+1)."_".$_POST['id'].".".$ext;
					$insertar_photo = $this->MProjects->insert_photo($datos2);
					
					if (!move_uploaded_file($_FILES['imagen']['tmp_name'][$i], $ruta."/assets/img/projects/photo".($i+1)."_".$_POST['id'].".".$ext)) {
						
						$errors += 1;
						
					}
					
				}
				$i++;  // Incrementamos 
			}
			
			if($errors > 0){
				
				echo '{"response":"error2"}';
				
			}else{
				
				echo '{"response":"ok"}';
				
			}
			
        }else{
			
			echo '{"response":"error1"}';
			
		}
    }
    
	// Método para eliminar
	function delete($id) {
		
		// Primero verificamos si está asociado a algún grupo
		$search_assoc = $this->MProjects->obtenerProyectoGrupo($id);
		
		if(count($search_assoc) > 0){
			
			echo '{"response":"existe"}';
			
		}else{
			
			$result = $this->MProjects->delete($id);
			
			if($result){
				
				echo '{"response":"ok"}';
				
			}else{
				
				echo '{"response":"error"}';
				
			}
			
		}
		
        
        
    }
	
	public function ajax_projects()
    {
        $result = $this->MProjects->obtener();
        echo json_encode($result);
    }
	
	
}
