<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vacio_model extends CI_Model{

    function __construct(){
        parent::__construct();
        $this->load->database();
    }

	public function get_listado() {
	    $this->db->select('*');
		$this->db->from('slider');
		$this->db->order_by("slider.orden", "asc");
		
		$query = $this->db->get();
	    $slides = $query->result();
	    return $slides;
    }

}
