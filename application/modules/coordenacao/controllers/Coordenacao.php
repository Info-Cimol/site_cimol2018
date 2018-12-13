<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coordenacao extends MX_Controller {
	public function __construct(){

		parent::__construct();
		//$this->view->setTema($this->tema);
		
		if(isset($this->user_data)){
			//print_r($this->user_data['permissoes']);
			if(
				!in_array('coordenador_curso', $this->user_data['permissoes']) 
			){
				redirect('coordenacao/restrito', 'refresh');
				
			}
		}else{
			
			redirect('restrito', 'refresh');
		}
	}
	
	public function index()
	{
		//titulo da página
		$this->data['title']="Cimol - Área de coordenação";
		//define o conteudo a ser carregada
		$this->data['content']="inicio";
		
		$this->view->show_view($this->data);
	}
	
	public function restrito(){
		$this->data['title']="Cimol - Área do Coordenador";
		$this->data['template']="restrito";
		$this->view->show_view($this->data);
	}
	
	
}
