<?php
$userData = array();
if ($this->facebook->is_authenticated()) {
    $userProfile = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email');
    $userData['oauth_provider'] = 'facebook';
    $userData['oauth_uid'] = $userProfile['id'];
    $userData['name'] = $userProfile['first_name'] . $userProfile['last_name'];
    $userData['email'] = $userProfile['email'];
    $userData['type'] = '3';
    $userData['level'] = '1';
    $userID = $this->fb_model->checkUser($userData);
    if (!empty($userID)) {
        $data['userData'] = $userData;
        $this->session->set_userdata('logged_in', $userData);
    } else {
        $data['userData'] = array();
    }
    $data['logoutUrl'] = $this->facebook->logout_url();
} else {
    $fbuser = '';
    $data['authUrl2'] = $this->facebook->login_url();
}