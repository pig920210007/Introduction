<?php

class Works extends CI_Controller {

function __construct()
 {
   parent::__construct();
  $this->lang->load('introduction', 'zh-tw');
 }

public function title($id) {
	 if(!$this->session->userdata('logged_in')){
        redirect('/member/login');
      }
	$data['index'] = $this->lang->line('index');
	$data['introduction'] = $this->lang->line('introduction');
	$data['works'] = $this->lang->line('works');
	$data['workproject'] = $this->lang->line('workproject');
	$data['ciworks'] = $this->lang->line('ciworks');
	$data['google'] = $this->lang->line('google');
	$data['git'] = $this->lang->line('git');
	$data['rwd'] = $this->lang->line('rwd');
	$data['adminname'] = $this->lang->line('adminname');
	$data['introduction_title'] = $this->lang->line('introduction_title');
	$data['introduction_works'] = $this->lang->line('introduction_works');
	$data['introduction_license'] = $this->lang->line('introduction_license');
	$data['ciworks_index'] = $this->lang->line('ciworks_index');
	$data['ciworks_login'] = $this->lang->line('ciworks_login');
	$data['ciworks_smtp'] = $this->lang->line('ciworks_smtp');
	$data['ciworks_permission'] = $this->lang->line('ciworks_permission');
	$data['ciworks_sms'] = $this->lang->line('ciworks_sms');
	$data['google_html'] = $this->lang->line('google_html');
	$data['google_smtp'] = $this->lang->line('google_smtp');
	$data['copy'] = $this->lang->line('copy');
	$data['title'] = $this->lang->line('title');
	//$data['works_title'] = $this->lang->line('works_title');
	//$data['works_title1'] = $this->lang->line('works_title1');
	//$data['works_title2'] = $this->lang->line('works_title2');
	$data['workproject_titles'] = $this->workproject_model->get_workproject();
	 $data['works_titles'] = $this->works_model->get_works();
	$data['workproject_title'] = $this->lang->line('workproject_title');
	$data['workproject_title1'] = $this->lang->line('workproject_title1');
	$data['workproject_title2'] = $this->lang->line('workproject_title2');

	$data['post'] = $this->works_model->get_title($id);

	$this->load->view('templates/header', $data);
    $this->load->view('works/title', $data);
   	$this->load->view('templates/footer', $data);

}
public function create() {
	 if($this->session->userdata('level') !=2){
        redirect('/member/login');
      }
 $data['index'] = $this->lang->line('index');
	$data['introduction'] = $this->lang->line('introduction');
	$data['works'] = $this->lang->line('works');
	$data['workproject'] = $this->lang->line('workproject');
	$data['ciworks'] = $this->lang->line('ciworks');
	$data['google'] = $this->lang->line('google');
	$data['git'] = $this->lang->line('git');
	$data['rwd'] = $this->lang->line('rwd');
	$data['adminname'] = $this->lang->line('adminname');
	$data['introduction_title'] = $this->lang->line('introduction_title');
	$data['introduction_works'] = $this->lang->line('introduction_works');
	$data['introduction_license'] = $this->lang->line('introduction_license');
	$data['ciworks_index'] = $this->lang->line('ciworks_index');
	$data['ciworks_login'] = $this->lang->line('ciworks_login');
	$data['ciworks_smtp'] = $this->lang->line('ciworks_smtp');
	$data['ciworks_permission'] = $this->lang->line('ciworks_permission');
	$data['ciworks_sms'] = $this->lang->line('ciworks_sms');
	$data['google_html'] = $this->lang->line('google_html');
	$data['google_smtp'] = $this->lang->line('google_smtp');
	$data['copy'] = $this->lang->line('copy');
	$data['title'] = $this->lang->line('title');
	//$data['works_title'] = $this->lang->line('works_title');
	//$data['works_title1'] = $this->lang->line('works_title1');
	//$data['works_title2'] = $this->lang->line('works_title2');
	$data['workproject_titles'] = $this->workproject_model->get_workproject();
	 $data['works_titles'] = $this->works_model->get_works();
	$data['workproject_title'] = $this->lang->line('workproject_title');
	$data['workproject_title1'] = $this->lang->line('workproject_title1');
	$data['workproject_title2'] = $this->lang->line('workproject_title2');

         
       $this->form_validation->set_rules('name','Name','required');
        $this->form_validation->set_rules('address','Address','required');
        $this->form_validation->set_rules('content','content','required');

      if($this->form_validation->run() === FALSE){
        $this->load->view('templates/header', $data);
        $this->load->view('works/create', $data);
        $this->load->view('templates/footer', $data);
      }else {
       // Upload Image
      $config['upload_path'] = '/var/www/Introduction/application/assets/images/works';
      $config['allowed_types'] = 'gif|jpg|png';
      $config['max_size'] = '2048000';
      $config['max_width'] = '50000';
      $config['max_height'] = '50000';
     
       $this->load->library('upload', $config);
  
     if(!$this->upload->do_upload()){
    $errors = array('error' => $this->upload->display_errors());
    //echo $errors['error'];
    $post_image = 'noimage.jpg';
    }else {
       $data = array('upload_data' => $this->upload->data());
       $post_image = $_FILES['userfile']['name'];
    }

// echo $data;

      $this->works_model->create_works($post_image);
 
     //Set message
     $this->session->set_flashdata('works_created','Your Works has been created');

      redirect('Home');
       }
     }
  
 public function edit($id){
 	 if($this->session->userdata('level') !=2){
        redirect('/member/login');
      }
        $data['index'] = $this->lang->line('index');
	$data['introduction'] = $this->lang->line('introduction');
	$data['works'] = $this->lang->line('works');
	$data['workproject'] = $this->lang->line('workproject');
	$data['ciworks'] = $this->lang->line('ciworks');
	$data['google'] = $this->lang->line('google');
	$data['git'] = $this->lang->line('git');
	$data['rwd'] = $this->lang->line('rwd');
	$data['adminname'] = $this->lang->line('adminname');
	$data['introduction_title'] = $this->lang->line('introduction_title');
	$data['introduction_works'] = $this->lang->line('introduction_works');
	$data['introduction_license'] = $this->lang->line('introduction_license');
	$data['ciworks_index'] = $this->lang->line('ciworks_index');
	$data['ciworks_login'] = $this->lang->line('ciworks_login');
	$data['ciworks_smtp'] = $this->lang->line('ciworks_smtp');
	$data['ciworks_permission'] = $this->lang->line('ciworks_permission');
	$data['ciworks_sms'] = $this->lang->line('ciworks_sms');
	$data['google_html'] = $this->lang->line('google_html');
	$data['google_smtp'] = $this->lang->line('google_smtp');
	$data['copy'] = $this->lang->line('copy');
	$data['title'] = $this->lang->line('title');
	//$data['works_title'] = $this->lang->line('works_title');
	//$data['works_title1'] = $this->lang->line('works_title1');
	//$data['works_title2'] = $this->lang->line('works_title2');
	$data['workproject_titles'] = $this->workproject_model->get_workproject();
	 $data['works_titles'] = $this->works_model->get_works();
	$data['workproject_title'] = $this->lang->line('workproject_title');
	$data['workproject_title1'] = $this->lang->line('workproject_title1');
	$data['workproject_title2'] = $this->lang->line('workproject_title2');

   $data['post'] = $this->works_model->get_title($id);

   //Check User

   //$qq=$this->works_model->get_title($id);
  // echo $qq['user_id'];
//if($this->session->userdata('user_id') != $qq['user_id']){

   //  redirect('posts');
  // }
    
        if(empty($data['post'])){
            show_404();
          }
       
      $this->load->view('templates/header', $data);
        $this->load->view('works/edit', $data);
        $this->load->view('templates/footer', $data);
}

 public function update(){
          // Check login
     // if(!$this->session->userdata('logged_in')){
    //    redirect('users/login');
   //   }
        $this->works_model->update_works();
 $this->session->set_flashdata('works_updated','Your work has been updated');

     redirect('Home');      

} 

 public function delete($id){
 	 if($this->session->userdata('level') !=2){
        redirect('/member/login');
      }
            // Check login
    //  if(!$this->session->userdata('logged_in')){
   //     redirect('users/login');
  //    }
 $this->works_model->delete_works($id);
 
      //Set message
     $this->session->set_flashdata('works_deleted','Your works has been deleted');

   redirect('Home');
}
}