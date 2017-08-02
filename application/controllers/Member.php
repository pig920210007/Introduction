<?php

class Member extends CI_Controller {

function __construct()
 {
   parent::__construct();
  $this->lang->load('introduction', 'zh-tw');
 }

public function register() {
	$this->load->library('nexmo');
$this->nexmo->set_format('json');  
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
        $this->form_validation->set_rules('account','Account','required|callback_check_account_exists');
        $this->form_validation->set_rules('email','Email','required|callback_check_email_exists');
        $this->form_validation->set_rules('phone','Phone','required|callback_check_phone_exists');
        $this->form_validation->set_rules('password','Password','required');
        
 
     if($this->form_validation->run() === FALSE){	
         $this->load->view('templates/header', $data);
         $this->load->view('member/register', $data);
       	$this->load->view('templates/footer', $data);
        }else{
          // Encrypt password
        $enc_password = md5($this->input->post('password'));
       $this->member_model->register($enc_password);
      
$this->session->set_flashdata('user_registered','You are now registered and can log in');
        $this->sendmail->send($this->input->post('email'),'感謝您的註冊：' . $this->input->post('name'),'已成功註冊');
        $phone='886' . substr($this->input->post('phone'),1);
        $from='919231874';
        $to=$phone;
         $message=array(
'text'=>'感謝您的註冊',
);
$this->nexmo->send_message($from,$to,$message);
       
 redirect('Home');

}

    }


public function check_account_exists($account){
      $this->form_validation->set_message('check_account_exists','That account is taken,Please choose a different one');
       if($this->member_model->check_account_exists($account)){
        return true;
       }else{
        return false;
       }


  }

      public function check_email_exists($email){
      $this->form_validation->set_message('check_email_exists','That email is taken,Please choose a different one');
       if($this->member_model->check_email_exists($email)){
        return true;
       }else{
        return false;
       }


  }

      public function check_phone_exists($phone){
      $this->form_validation->set_message('check_phone_exists','That phone is taken,Please choose a different one');
       if($this->member_model->check_phone_exists($phone)){
        return true;
       }else{
        return false;
       }


  }

  public function login(){
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
  include_once APPPATH."libraries/google-api-client-master/google.php";
  include_once APPPATH."libraries/Facebookapi.php";
    
    

            $data['title2']='登入';
    $this->form_validation->set_rules('account','Account','required');     
 $this->form_validation->set_rules('password','Password','required');
       
 
     if($this->form_validation->run() === FALSE){ 
          $this->load->view('templates/header',$data);
          $this->load->view('member/login',$data);
          $this->load->view('templates/footer',$data);
        }else{
       
     $account = $this->input->post('account');
     $password = md5($this->input->post('password'));

     $user_id = $this->member_model->login($account,$password);
     $user_level = $this->member_model->get_level($account,$password);

     if($user_id){
      //Create session

      $user_data=array(
       'user_id' => $user_id,
       'account' => $account,
       'level' => $user_level,
       'logged_in' => true
        );

    $this->session->set_userdata($user_data);

       $this->session->set_flashdata('user_loggedin','You are now loggin');


    redirect('Home');

     } else {

$this->session->set_flashdata('login_failed','Login is invalid');


     redirect('member/login');

     }
    
    }

    }

  //log user out
    public function loginout(){
     //unset user data
   $this->session->unset_userdata('logged_in');
   $this->session->unset_userdata('user_id');
   $this->session->unset_userdata('account');
   $this->session->unset_userdata('token');
        $this->session->unset_userdata('userData');
        $this->session->sess_destroy();
        $this->facebook->destroy_session();
        $this->session->set_flashdata('user_loggedout','You are now logged out');
   redirect('member/login');

    }

}
