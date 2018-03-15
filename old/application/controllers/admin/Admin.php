<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// PHPMailer Autoload
require_once "application/libraries/php-mailer/PHPMailerAutoload.php";

class Admin extends CI_Controller
{
	function __construct(){
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('admin/admin_ajax_model');
        $this->load->model('admin/admin_auth_model');
    }

	public function index(){

		$this->load->library('session');
		if(!isset($_SESSION['user']) || !$_SESSION['status']){
			redirect(base_url('admin/login'));
		}
		else{
			redirect(base_url('admin/home'));
		}
	}


	public function edit_cell(){
		$this->admin_ajax_model->edit_cell($this->input->post('id'), $this->input->post('column_id'), $this->input->post('table'), 
		$this->input->post('column'), $this->input->post('value'));
	}



}
