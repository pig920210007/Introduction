<?php

               class Works_model extends CI_Model{
         public function __construct(){
                   $this->load->database();
     }

         public function get_works(){
           $this->db->order_by('name');
    $query = $this->db->get('works');
    return $query->result_array();
         }

     }