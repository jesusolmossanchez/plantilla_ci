<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('get_user_details')){
   function get_user_details($user_id){
       //get main CodeIgniter object
       $ci =& get_instance();
       
       //load databse library
       $ci->load->database();
       
       //get data from database
       $query = $ci->db->get_where('users',array('id'=>$id));
       
       if($query->num_rows() > 0){
           $result = $query->row_array();
           return $result;
       }else{
           return false;
       }
   }
}