<?php

class Introduction extends CI_Controller {

function __construct()
 {
   parent::__construct();
  $this->lang->load('introduction', 'zh-tw');
 }

function title() {
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
	 $data['works_titles'] = $this->works_model->get_works();
	$data['workproject_title'] = $this->lang->line('workproject_title');
	$data['workproject_title1'] = $this->lang->line('workproject_title1');
	$data['workproject_title2'] = $this->lang->line('workproject_title2');
	$this->load->view('templates/header', $data);
    $this->load->view('works/title', $data);
   	$this->load->view('templates/footer', $data);

}

  
}