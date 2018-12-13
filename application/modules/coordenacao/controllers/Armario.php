<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Armario extends MX_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('armario_model');
			//$this->view->setTema("coordena");
		if(isset($this->user_data)){
			if(
				!in_array('coordenador_curso', $this->user_data['permissoes']) 
			){
				redirect('coordenacao/restrito', 'refresh');	
			}
		}else{	
			redirect('restrito', 'refresh');
		}
	}

	// Método que carrega a párina inicial "armário/index" onde são mostrados todos os armários
	public function index(){
			
		$user_id = $_SESSION['user_data']['curso'][0]->curso_id;
		//$this->data = $this->armario_model->busca_armario_locado_inicio($user_id);
		$this->data['locados'] = $this->armario_model->busca_armario_locado($user_id);
		$this->data['vencidos'] = $this->armario_model->busca_armario_vencido($user_id);
		$this->data['disponiveis'] = $this->armario_model->busca_armario_disponivel($user_id);

		$this->data['title']="Cimol - Área de coordenação";
		$this->data['content'] = "armario/index";
		$this->view->show_view($this->data);
		
	}

	// testando, busca da pagina inicial
	public function busca_todos_armarios_index_ajax(){

		$curso_id = $_SESSION['user_data']['curso'][0]->curso_id;
		//$this->data = $this->armario_model->busca_armario_locado_inicio($user_id);
		$data['locados'] = $this->armario_model->busca_armario_locado($curso_id);
		$data['vencidos'] = $this->armario_model->busca_armario_vencido($curso_id);
		$data['disponiveis'] = $this->armario_model->busca_armario_disponivel($curso_id);

		//$locados = $this->armario_model->busca_armario_locado($_SESSION['user_data']['curso'][0]->curso_id);
		echo json_encode($data);
	}	

	// Método que carrega a página "alugar/index" que serve para alugar um armário
	public function alugar(){
		$this->data['title']="Cimol - Área de coordenação";
		$this->data['content'] = "armario/alugar/index";
		$this->view->show_view($this->data);
	}

	// Método que processa a locação de armário. Após inserir os dados no banco é carregada a página "alugar/alugado", dizendo que o armário foi alugado com sucesso
	public function armario_alugado(){

		if (isset($_POST['alugar'])) {
			$inserir = array(
			'armario_id' => $this->input->post('armario_id'),
			'data_fim' => $this->input->post('data_fim'),
			'data_inicio' => $this->input->post('data_inicio'),
			'aluno_id' => $this->input->post('aluno_id')
			);
			
			$this->armario_model->alugar($inserir);

			$this->data['title']="Cimol - Área de coordenação";
			$this->data['content'] = "armario/alugar/alugado";
			$this->view->show_view($this->data);

		}else{

			$this->data['title']="Cimol - Área de coordenação";
			$this->data['content'] = "armario/alugar/index";
			$this->view->show_view($this->data);	
		}
			
	}
	
	// Método que processa a devolução de armário. Após a devolução é carregada a pagina "alugar/alugado" e informa que a devolução foi feita com sucesso.
	public function devolvido(){

		if (isset($_POST['devolver'])) {
			$this->armario_model->entrega_armario($this->input->post('armario_id'), $this->input->post('data_entrega'));

			$this->data['title']="Cimol - Área de coordenação";
			$this->data['content'] = "armario/devolver/devolvido";		
			$this->view->show_view($this->data);
		} else {
			$this->data['title']="Cimol - Área de coordenação";
			$this->data['content'] = "armario/index";		
			$this->view->show_view($this->data);
		}
		

	}

	// Busca todos armários locados inclusive os vencidos para fazer a entrega. Retorna por ajax para a página "devolver/index"
	public function busca_todos_locados_ajax(){		
		$locados = $this->armario_model->busca_todos_locados($_SESSION['user_data']['curso'][0]->curso_id);
		echo json_encode($locados);
	}	

	// Carrega a página devolver/index, página usada para devolver os armários
	public function devolver(){
		$this->data['title']="Cimol - Área de coordenação";
		$this->data['content'] = "armario/devolver/index";
		$this->view->show_view($this->data);
	}

	// Busca todos alunos do curso e retorna por ajax para a página "armario/index"
	public function busca_aluno_alugar_ajax(){
		$alunos = $this->armario_model->busca_aluno_ajax($_SESSION['user_data']['curso'][0]->curso_id);
		echo json_encode($alunos);
	}

	// Busca numero e id dos armários disponiveis para serem alugados e retorna para a página "armario/index" e também para a página "alugar/index"
	public function busca_armarios_disponiveis_ajax(){
		$disponiveis = $this->armario_model->busca_armario_disponivel($_SESSION['user_data']['curso'][0]->curso_id);
		echo json_encode($disponiveis);
	}

	// Busca aluno e retorna para a pagina devolver/index por ajax, para mostrar de qual aluno é o armario que está sendo devolvido.
	public function busca_aluno_devolver_ajax(){
		$aluno = $this->armario_model->busca_aluno_devolver_ajax($this->input->post('armario_id'));		
		echo json_encode($aluno);
	}

	// Busca numero e id dos armários locados e retorna por ajax para a página armario/index
	public function armarios_locados_ajax(){
		$locados = $this->armario_model->busca_armario_locado($_SESSION['user_data']['curso'][0]->curso_id);
		echo json_encode($locados);
	}

	// Busca numero e id dos armários vencidos e retona por ajax para a pagina armario/index
	public function armarios_vencidos_ajax(){
		$vencidos = $this->armario_model->busca_armario_vencido($_SESSION['user_data']['curso'][0]->curso_id);
		echo json_encode($vencidos);
	}


}
