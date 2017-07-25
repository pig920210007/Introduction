<?php
    class Member_model extends CI_Model{

       function __construct() {
        $this->tableName = 'member';
        $this->primaryKey = 'id';
    }
       public function register($enc_password){
      // User data array
  $data = array(
     'name' => $this->input->post('name'),
     'email' => $this->input->post('email'),
     'account' => $this->input->post('account'),
     'password' => $enc_password,
     'phone' => $this->input->post('phone'),
     'level' => $this->input->post('level'),
     'type' => $this->input->post('type')
   );

  //Insert user
    return $this->db->insert('member',$data);
  }

   public function check_account_exists($account){
              $query = $this->db->get_where('member', array('account' => $account));
              $qq=$query->row_array();
        if(empty($qq)){
          return true;
          } else {
          return false; 
         }  
   }

       public function check_phone_exists($phone){
              $query = $this->db->get_where('member', array('phone' => $phone));
              $qq=$query->row_array();
        if(empty($qq)){
          return true;
          } else {
          return false; 
         }  
   }
      
         public function check_email_exists($email){
              $query = $this->db->get_where('member', array('email' => $email));
              $qq=$query->row_array();
        if(empty($qq)){
          return true;
          } else {
          return false; 
         }  
   }

  
       public function login($account,$password){

        $this->db->where('account',$account);
        $this->db->where('password',$password);

        $result=$this->db->get('member');

        if($result->num_rows() == 1){
          return $result->row(0)->id;
        }else{
          return false;
        }
       }

public function checkUser($data = array()){
        $this->db->select($this->primaryKey);
        $this->db->from($this->tableName);
        $this->db->where(array('oauth_provider'=>$data['oauth_provider'],'oauth_uid'=>$data['oauth_uid']));
        $prevQuery = $this->db->get();
        $prevCheck = $prevQuery->num_rows();
        
        if($prevCheck > 0){
            $prevResult = $prevQuery->row_array();
            $update = $this->db->update($this->tableName,$data,array('id'=>$prevResult['id']));
            $userID = $prevResult['id'];
        }else{
            
            $insert = $this->db->insert($this->tableName,$data);
            $userID = $this->db->insert_id();
        }

        return $userID?$userID:FALSE;
    }


}