<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller{

	function __construct(){
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('session');
    }

	public function index(){

	}

	public function login(){
		$data['pagina'] = 'login';
 		$this->load->view('admin/admin_login', $data);
	}

	public function logout(){
		$this->load->library('session');

		unset($_SESSION['user']);
		unset($_SESSION['role']);
		unset($_SESSION['status']);
		unset($_SESSION['hash']);

		redirect(base_url('admin'));
	}

	public function check_credentials(){
		/*  PARA GENERAR PASSWORDS

		$hash = password_hash("XveCnvEF", PASSWORD_DEFAULT);
		var_dump($hash);
		exit;

		*/

		$this->load->library('session');
		$this->load->model('admin/admin_auth_model');

		$data['user'] = $this->input->post('user');
		$data['password'] = $this->input->post('password');

		$admin = $this->admin_auth_model->get_user($data);

		if($admin == NULL || !password_verify($data['password'], $admin->password)){
			redirect(base_url('admin/login'));
		} 
		else { 
			//REVISAR ESTO DEL HASH
			$hash = sha1(uniqid('JvKnrQWPsThuJteNQAuH' . mt_rand(), true));
			$this->admin_auth_model->save_admin_session($admin->id, $hash);

			$session_data = array(
				'user' => $this->input->post('user'),
				'role' => $admin->rol,
				'status' => TRUE,
				'hash' =>  $hash
			);
		}
			

		$this->session->set_userdata($session_data);

		redirect(base_url('admin/home'));
	}
	
}
