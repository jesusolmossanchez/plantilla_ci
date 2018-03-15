<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_auth_model extends CI_Model
{

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }

    public function get_user($data){
      $this->db->where('user', $data['user']);
      $query = $this->db->get('admin');

      return $query->row();
    }

    public function save_admin_session($id, $hash){
      $this->db->where('id', $id);
      $this->db->update('admin', array("hash_session" => $hash)); 
      return true;
    }



    public function get_admin_session_hash(){
      $sql = "SELECT  hash_session FROM admin WHERE user = 'admin'";
      $query = $this->db->query($sql); 
          $hash = $query->result();
          $hash = $hash[0]->hash_session;
          return $hash;
    }

}

