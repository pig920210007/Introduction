<?php
class Fb_model extends CI_Model{
 public function __construct(){
 $this->tableName='member';
 $this->primaryKey='id';
}
public function checkUser($data=array()){
$this->db->select($this->primaryKey);
$this->db->from($this->tableName);
$this->db->where(array('oauth_provider'=>$data['oauth_provider'],'oauth_uid'=>$data['oauth_uid']));
$prevQuery=$this->db->get();
$prevCheck=$prevQuery->num_rows();
if($prevCheck>0){
$prevResult=$prevQuery->row_array();
$update=$this->db->update($this->tableName,$data,array('id'=>$prevResult['id']));
$userID=$prevResult['id'];
}else{
$insert=$this->db->insert($this->tableName,$data);
$userID=$this->db->insert_id();
}
return $userID?$userID:FALSE;
}
}