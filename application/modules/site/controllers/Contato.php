<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contato extends MX_Controller {
	
	public function __construct(){
		parent::__construct();
		
	}
	
	public function index()
	{
		$this->data['title']="Cimol";
		$this->data['template']="contato/index";
		
		$this->view->show_view($this->data);
	}
}
	