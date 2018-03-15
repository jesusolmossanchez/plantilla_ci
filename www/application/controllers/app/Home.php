<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_App {

	function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model('app/Vacio_model');
		$this->metas = new stdClass();
		
	}

	public function index(){
		
		//Metaetiquetas
		$this->metas->titulo = "";
		$this->metas->desc = "";
		$this->metas->keywords = "";
		$this->metas->og_desc = "";
		$this->metas->og_imagen = "";
		$this->metas->og_titulo = "";
		$this->metas->slug = "";
		$this->metas->tweet_text = "";
		$this->metas->ws_text = "";

		$pagina = 'home';

		$a = $this->Vacio_model->get_listado();
		var_dump($a);

				
		$data = array (
			'pagina' => $pagina,
			'metas' => $this->metas,
			'cookie' => $this->cookie_control,
			'lang' => 'es'
		);

		
		$this->load->view('app/home', $data);
	}
}
