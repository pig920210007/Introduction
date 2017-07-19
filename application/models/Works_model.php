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

         public function get_title($id){
           $query =$this->db->get_where('works', array('id' => $id));
       return $query->row();
         }

   public function create_works($post_image){
       

      $data = array(
         'name' => $this->input->post('name'),
         'address' => $this->input->post('address'),
         'content' => $this->input->post('content'),
         'img' => $post_image
);
          return $this->db->insert('works',$data);
}

public function update_works(){
    
      $data = array(
         'name' => $this->input->post('name'),
         'address' => $this->input->post('address'),
         'content' => $this->input->post('content')
          
);
 
         $this->db->where('id',$this->input->post('id'));
         return $this->db->update('works',$data);
}

public function delete_works($id){
       $this->db->where('id',$id);
       $this->db->delete('works');
       return true;   
}
}