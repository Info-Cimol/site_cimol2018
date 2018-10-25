<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Acervo extends MX_Controller {
	public function __construct(){
		parent::__construct();
		if(isset($this->user_data)){
			//print_r($this->user_data['permissoes']);
			if(
				!in_array('coordenador_curso', $this->user_data['permissoes']) 
			){
				redirect('login', 'refresh');
				
			}
		}else{
			
			redirect('login', 'refresh');
		}
	}
	
	public function index()
	{
		$this->load->model("M_Acervo");
		$dados["lista"] = $this->M_Acervo->listaAcervo()->result();
		$dados["nome_view"] = "acervo";
		$this->data['title']="Cimol - Área do Coordenador";
		$this->data['template']="restrito";
		$this->view->show_view($this->data);
		$this->load->view('acervo', $dados);
		//$this->load->view('templates/footer');		

	}

	public function excluir($id){
		$this->load->model("M_Acervo");
		$this->M_Acervo->excluir($id);
		redirect("coordenacao/acervo");
	}
	public function salvar(){
		$this->load->model("M_Acervo");
		$this->M_Acervo->salvar();
		redirect("coordenacao/acervo");
	}

        //listar autores livros

        //Listar Editoras

        //registtrar emprestimos

       // registrar devoluçoes


	
	
}
