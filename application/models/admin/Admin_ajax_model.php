<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_ajax_model extends CI_Model{

    function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function edit_cell($id, $columna_id, $tabla, $columna, $valor){
      $query = $this->db->query('UPDATE ' . $tabla . ' SET ' . $columna . ' = "' . $valor . '" WHERE ' . $columna_id . ' = '. $id . ';'); 
      return $query;
    }

    public function check_sa_password($value, $column, $table, $type){
      $sql = 'SELECT COUNT(*) AS cantidad FROM ' . $table . ' WHERE ' . $column . ' = ';
      
      if ($type == 'text') {
        $sql .= '"' . $value . '";';
      } else {
        $sql .= $value . ' ;';
      }

      $query = $this->db->query($sql); 
      $result = $query->row();
      return $result;
    }

}

