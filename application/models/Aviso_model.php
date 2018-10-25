<?php
class Aviso_model extends CI_Model{
	
	function listar(){
		$this->db->select("a.id, a.aviso, date_format(a.data_fim,'%d/%m/%Y') as 'data_final', date_format(a.data,'%d/%m/%Y') as 'data'")->from('aviso a');		
		$query=$this->db->get();
		return $query->result();
	}
	 
	
	function salvar($aviso){
		if($aviso['id']==null){
			if($this->db->insert("aviso",$aviso)){
				return $this->db->insert_id();
			}else{
				return false;
			}
		}else{
			if($this->db->where('id', $aviso['id'])
			->update('aviso', $aviso)){
				return true;
			}else{
				return false;
			}
		}
	}
		
	
	function buscar($id){
		$this->db->select('*')
		->from('aviso')
		->where('id', $id);
		$query=$this->db->get();
		$resultado= $query->result();
		return $resultado;
	}
		
	
	function deletar($id){
		if($this->db->where('id =', $id)->delete('aviso')){
			return true;
		}else{
			return false;
		}
	}
}