<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Acervo extends CI_Model {
	public function listaAcervo(){
		return $this->db->get("biblioteca_obra");
	}
	public function excluir($id){
		return $this->db->where("id", $id)->delete("biblioteca_obra");
	}
	/*public function salvar(){

		$id = $this->input->post("id");
		$id = $this->input->post("txt_titulo");
		$id = $this->input->post("txt_resumo");
		$id = $this->input->post("txt_edicao");
		$id = $this->input->post("txt_isbn");
		$id = $this->input->post("txt_categoria_id");
		$id = $this->input->post("txt_editora_id");
		$id = $this->input->post("txt_quantidade");
		$id = $this->input->post("txt_locacao");
		$id = $this->input->post("txt_formato");

		$valores = array(
			"id" => $id,
			"id" => $titulo,
			"id" => $resumo,
			"id" => $edicao,
			"id" => $isbn,
			"id" => $categoria_id,
			"id" => $editora_id,
			"id" => $quantidade,
			"id" => $locacao,
			"id" => $formato,
		);
		if($id == ""|| ($id == NULL)){
			return $this->db->insert("biblioteca_obra", $valores);
		}else{
			$this->db->where("id", $id);
			return $this->db->update("biblioteca_obra", $valores);
		}*/
}