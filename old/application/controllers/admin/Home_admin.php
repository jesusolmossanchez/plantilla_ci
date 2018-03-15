<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_admin extends CI_Controller{

	function __construct(){
		parent::__construct();
 		$this->load->helper('form');
        $this->load->helper('url');
		$this->load->library('session');
		$this->load->model('admin/admin_user_model');

		if(!isset($_SESSION['user']) || !$_SESSION['status'])
		{
			$this->session->sess_destroy();
			redirect(base_url('admin'));
		}
	}

	public function index(){
		
		$pagina = "escritorio";

		$data = array(
			'pagina' => $pagina
		);

		$this->load->view('admin/templates/head_admin',$data);
 		$this->load->view('admin/admin_home',$data);
		$this->load->view('admin/templates/footer_admin');

	}



}
