<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aviso extends MX_Controller {
	
	public function __construct(){
		parent::__construct();
        if(isset($this->user_data)){
			if(!in_array('admin', $this->user_data['permissoes'])){
				$_SESSION['route']="admin/aviso";
				redirect('', 'refresh');
			}
		}else{
			$_SESSION['route']="admin/aviso";
			redirect('login', 'refresh');
		}
		$this->load->model('aviso_model');
		
        date_default_timezone_set("Brazil/East");
        $this->data['title']="Cimol - Área do Administrador";
	}
	
	public function index()
	{
		$this->data['template']="aviso/aviso";
		$this->data['avisos']=$this->aviso_model->listar();
		
		
		$this->view->show_view($this->data);
	}
	
	
	public function deletar($id){
		if($this->aviso_model->deletar($id)){
			$this->view->set_message("Aviso deletado com sucesso", "alert alert-success");
			
		}else{
			$this->view->set_message("Ocorreu um erro ao deletar aviso", "alert alert-error");
			
		}
		redirect('admin/aviso', 'refresh');
	}
	
	
	public function buscar($id){
		$aviso=$this->aviso_model->buscar($id);

		echo json_encode($aviso);
	}
	
	
	public function salvar(){
		$aviso=$_POST['aviso'];
		$aviso['data']=date("Y-m-d");
		if($aviso_id=$this->aviso_model->salvar($aviso)){
			$this->view->set_message("Aviso salvo com sucesso", "alert alert-success");
		
			redirect('admin/aviso', 'refresh');
		}else{
			$this->view->set_message("Ocorreu um erro ao salvar aviso", "alert alert-error");
			redirect('admin/aviso', 'refresh');
		}
	}
	
	
}	