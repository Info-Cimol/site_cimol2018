<?php
class Armario_model extends CI_Model{
	
	public function busca_armario_locado_inicio($curso){

		//$this->db->select('*')
		//->from('curso');
		//$query=$this->db->get();
		//$curso=$query->result();
		//return $resultados[] = $resultado ;


		//foreach ($curso as $key) {
			/*
			$this->db->from('armario_aluno');
			$this->db->where('armario_aluno.data_entrega=', null);
			$this->db->where('armario_aluno.curso_id=', $curso);

			$data['locados'] = $this->db->count_all_results();

			if ($data) {
				$this->db->from('armario_aluno');
				$this->db->where('armario_aluno.data_entrega!=', null);
				$this->db->where('armario_aluno.curso_id=', $curso);

				$data['livres'] = $this->db->count_all_results();

				return $data;
			}
			*/
		//}

		$this->db->select('a.numero, aa.armario_id')
		->from('armario_aluno aa')
		->join('armario a','aa.armario_id=a.id')	
		//->join('aluno al','al.id=aa.aluno_id')
		//->join('pessoa p','al.pessoa_id=p.id')
		->where('aa.data_entrega=', null)
		//->where('aa.data_fim>=', $data_atual)
		->where('a.curso_id=', $curso);
		$this->db->order_by('a.numero', 'DESC'); 
		$query=$this->db->get();
		$resultado=$query->result();
		$resultados['locados'] = $resultado ;



		$data_atual = date('Y-m-d');
		$this->db->select('a.numero, aa.data_fim, p.nome, aa.armario_id, c.titulo')
		->from('armario_aluno aa')
		->join('armario a','aa.armario_id=a.id')
		->join('curso c','a.curso_id=c.id')	
		->join('aluno al','al.id=aa.aluno_id')
		->join('pessoa p','al.pessoa_id=p.id')
		->where('aa.data_fim<=', $data_atual)
		->where('a.curso_id=', $curso)
		->where('aa.data_entrega=', null);
		$query=$this->db->get();
		$resultado2=$query->result();
		$resultados['vencidos'] = $resultado2 ;


		return $resultados;

		
	}

	// testando, busca armarios disponiveis
	public function busca_armario_disponivel($curso){
		/*
		$this->db->select('a.numero, a.id')
		->from('armario a')		
		->join('armario_aluno aa','a.id=aa.armario_id')
		->where('a.curso_id=', $curso)
		->where('armario_aluno.data_entrega!=', null);
		$query=$this->db->get();
		$resultado=$query->result();
		return $resultados[] = $resultado ;
		*/


		/*
		$this->db->select('a.numero, a.id')
		->from('armario_aluno aa')		
		->join('armario a','a.id=aa.armario_id')
		->where('a.curso_id=', $curso)
		->where('aa.data_entrega!=', null);
		$query=$this->db->get();
		$resultado1=$query->result();
		return $resultados[] = $resultado1 ;
		*/

		//
		$this->db->select('a.numero, aa.armario_id')
		->from('armario_aluno aa')
		->join('armario a','aa.armario_id=a.id')	
		->where('aa.data_entrega=', null)
		->where('a.curso_id=', $curso);
		$this->db->order_by('a.numero'); 
		$query=$this->db->get();
		$armarioLocado=$query->result();

		//echo "<pre>";
		//print_r($armarioLocado);
		//echo "</pre>";
		

		$this->db->select('a.numero, a.id')
		->from('armario a')		
		->where('a.curso_id=', $curso);
		//->where('aa.data_entrega!=', null);
		$this->db->order_by('a.numero');
		$query=$this->db->get();
		$armarios=$query->result();

		
		$resultado = null;
		foreach ($armarios as $armario) {
			//echo "<pre>";
			//print_r($armario);
			//echo "</pre>";

			if (!$this->buscaArmario($armario->id, $armarioLocado)) {
				$resultado[] = $armario;
			}	
		}


		//print_r($armarios);
		//print_r($armarioLocado);
		/*
		$resultado = null;
		foreach ($armarios as $armario) {
			if (!in_array($armario->id, $armarioLocado)) {
				$resultado[] = $armario;
			}	
		}
		*/

		//echo "<pre>";
		//print_r($resultado);
		//echo "</pre>";

		
		return $resultado;
	}

	// Busca aluno de um armario especifico para devolver.
	public function busca_aluno_devolver_ajax($armario_id){
		$this->db->select('p.nome, al.id')
		->from('pessoa p')
		->join('aluno al','al.pessoa_id=p.id')
		->join('aluno_turma at','al.id=at.aluno_id')
		->join('turma t','at.turma_id=t.id')
		->join('armario_aluno aa','al.id=aa.aluno_id')
		//->join('usuario u','al.pessoa_id=u.id')
		//->join('pessoa p','u.pessoa_id=p.id')	
		//->join('curso c','c.id=u.usuario_id');	
		//->where('al.id=p.id');
		//->where('t.segmento_curso_curso_id=', $curso)
		->where('aa.armario_id=', $armario_id)
		->where('aa.data_entrega=', null);
		$query=$this->db->get();
		$resultado=$query->result();
		return $resultados[] = $resultado ;
	}

	// Insere um novo armário locado, os dados são passados em um array como paramentro
	public function alugar($data){
		$this->db->insert('armario_aluno', $data);
	}

	// Busca alunos do curso passado como parametro
	public function busca_aluno_ajax($curso){
		$this->db->select('p.nome, al.id')
		->from('pessoa p')
		->join('aluno al','al.pessoa_id=p.id')
		->join('aluno_turma at','al.id=at.aluno_id')
		->join('turma t','at.turma_id=t.id')
		->where('t.segmento_curso_curso_id=', $curso);
		$this->db->order_by('p.nome');
		$query=$this->db->get();
		$resultado=$query->result();
		return $resultados[] = $resultado ;
	}
	
	// Busca todos armários locados inclusive os vencidos
	public function busca_todos_locados($curso){
		
		$this->db->select('a.numero, aa.armario_id')
		->from('armario_aluno aa')
		->join('armario a','aa.armario_id=a.id')	
		->where('aa.data_entrega=', null)
		->where('a.curso_id=', $curso);
		$this->db->order_by('a.numero'); 
		$query=$this->db->get();
		$resultado=$query->result();
		return $resultados[] = $resultado ;
	}

	// Busca armários os vencidos
	public function busca_armario_vencido($curso_id){

		$data_atual = date('Y-m-d');
		$this->db->select('a.numero, aa.data_fim, p.nome, aa.armario_id, c.titulo')
		->from('armario_aluno aa')
		->join('armario a','aa.armario_id=a.id')
		->join('curso c','a.curso_id=c.id')	
		->join('aluno al','al.id=aa.aluno_id')
		->join('pessoa p','al.pessoa_id=p.id')
		->where('aa.data_fim<=', $data_atual)
		->where('a.curso_id=', $curso_id)
		->where('aa.data_entrega=', null);
		$this->db->order_by('a.numero');
		$query=$this->db->get();
		$resultado=$query->result();
		return $resultados[] = $resultado ;
	}

	// Realiza a entrega de armário
	public function entrega_armario($armario_id, $data_entrega){
		
		$data = array('data_entrega' => $data_entrega);
		$this->db->where('armario_id=', $armario_id);
		$this->db->update('armario_aluno', $data);
		$entregue = "entregue";
		return $entregue;
	}

	// Busca somente os armários locados que não estão vencidos
	public function busca_armario_locado($curso){
		
		$data_atual = date('Y-m-d');
		$this->db->select('a.numero, aa.data_fim, p.nome, aa.armario_id')
		->from('armario_aluno aa')
		->join('armario a','aa.armario_id=a.id')	
		->join('aluno al','al.id=aa.aluno_id')
		->join('pessoa p','al.pessoa_id=p.id')
		->where('aa.data_entrega=', null)
		->where('aa.data_fim>=', $data_atual)
		->where('a.curso_id=', $curso);
		$this->db->order_by('a.numero'); 
		$query=$this->db->get();
		$resultado=$query->result();
		return $resultados[] = $resultado ;
	}

	function buscaArmario($id, $armarios){
		foreach ($armarios as $armario) {
			if ($id == $armario->armario_id) {
				return true;				
			}
		}
		return false;
	}



}