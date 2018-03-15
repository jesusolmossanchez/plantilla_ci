<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_App extends CI_Controller{

	public $device;
	public $cookie_control;
	public $lang_code;
	public $lang_country_code;
	public $slug;	
	public $page_data;
	public $page_urls;
	public $cache_time;


	function __construct(){

		parent::__construct();		
		$this->load->helper('url');
		$this->load->library('user_agent');
		$this->load->library('session');
		$this->load->helper('cookie');
		$this->load->helper('mobile_detect');

		$this->load->helper('versions');

		$this->device = get_device();

		//Cache Control (minutos)
		$this->cache_time = 1;
		$this->output->cache($this->cache_time);

		//Cookie Control;
		$this->load->helper('cookie');

		if (get_cookie(_COOKIE_NAME)) {
			$this->cookie_control = FALSE;
		} else {
			set_cookie(_COOKIE_NAME, '1', 31536000);
			$this->cookie_control = TRUE;
		}

		//Link Language Builder 
		$uri_segments = $this->uri->segments;
		$this->slug = $this->uri->uri_string;

		if (isset($uri_segments[1])) {

			if ($uri_segments[1] == 'en') {
				$current_lang = 'english';		
			} else {
				$current_lang = 'spanish';
			}

		} else {
			$current_lang = 'spanish';
		}

		$_SESSION['site_lang'] = $current_lang;

		switch ($current_lang) {
			case 'spanish':
				$this->lang_code = 1;
				$this->lang_country_code = 'es';
				break;
			case 'english':
				$this->lang_code = 2;				
				$this->lang_country_code = 'en';
				break;
			default:
			
				break;
		}

	}

}