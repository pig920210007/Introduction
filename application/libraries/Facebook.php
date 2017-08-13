<?php
require_once 'facebook-php-sdk/autoload.php';
//include_once APPPATH."libraries/facebook-php-sdk/autoload.php";
use Facebook\Authentication\AccessToken;
use Facebook\Exceptions\FacebookResponseException;
use Facebook\Exceptions\FacebookSDKException;
use Facebook\Facebook as FB;

Class Facebook {
    private $fb;
    private $helper;
    public function __construct() {
        $this->load->config('facebook');
        $this->load->library('session');
        $this->load->helper('url');
        if (!isset($this->fb)) {
            $this->fb = new FB([
                'app_id' => $this->config->item('facebook_app_id'),
                'app_secret' => $this->config->item('facebook_app_secret'),
                'default_graph_version' => $this->config->item('facebook_graph_version')]);
        }
        switch ($this->config->item('facebook_login_type')) {
        case 'js':
            $this->helper = $this->fb->getJavaScriptHelper();
            break;
        case 'canvas':
            $this->helper = $this->fb->getCanvasHelper();
            break;
        case 'page_tab':
            $this->helper = $this->fb->getPageTabHelper();
            break;
        case 'web':
            $this->helper = $this->fb->getRedirectLoginHelper();
            break;
        }
        if ($this->config->item('facebook_auth_on_load') === TRUE) {
            $this->authenticate();
        }
    }
    public function object() {
        return $this->fb;
    }
    public function is_authenticated() {
        $access_token = $this->authenticate();
        if (isset($access_token)) {
            return $access_token;
        }
        return false;
    }
    public function request($method, $endpoint, $params = [], $access_token = null) {
        try {
            $response = $this->fb->{strtolower($method)}($endpoint, $params, $access_token);
            return $response->getDecodedBody();
        } catch (FacebookResponseException $e) {
            return $this->logError($e->getCode(), $e->getMessage());
        } catch (FacebookSDKException $e) {
            return $this->logError($e->getCode(), $e->getMessage());
        }
    }
    public function login_url() {
        if ($this->config->item('facebook_login_type') != 'web') {
            return '';
        }
        return $this->helper->getLoginUrl(
            base_url() . $this->config->item('facebook_login_redirect_url'),
            $this->config->item('facebook_permissions')
        );
    }
    public function logout_url() {
        if ($this->config->item('facebook_login_type') != 'web') {
            return '';
        }
        return $this->helper->getLogoutUrl(
            $this->get_access_token(),
            base_url() . $this->config->item('facebook_logout_redirect_url')
        );
    }
    public function destroy_session() {
        $this->session->unset_userdata('fb_access_token');
    }
    private function authenticate() {
        $access_token = $this->get_access_token();
        if ($access_token && $this->get_expire_time() > (time() + 30) || $access_token && !$this->get_expire_time()) {
            $this->fb->setDefaultAccessToken($access_token);
            return $access_token;
        }
        if (!$access_token) {
            try {
                $access_token = $this->helper->getAccessToken();
            } catch (FacebookSDKException $e) {
                $this->logError($e->getCode(), $e->getMessage());
                return null;
            }
            if (isset($access_token)) {
                $access_token = $this->long_lived_token($access_token);
                $this->set_expire_time($access_token->getExpiresAt());
                $this->set_access_token($access_token);
                $this->fb->setDefaultAccessToken($access_token);
                return $access_token;
            }
        }
        if ($this->config->item('facebook_login_type') === 'web') {
            if ($this->helper->getError()) {
                $error = array(
                    'error' => $this->helper->getError(),
                    'error_code' => $this->helper->getErrorCode(),
                    'error_reason' => $this->helper->getErrorReason(),
                    'error_description' => $this->helper->getErrorDescription(),
                );
                return $error;
            }
        }
        return $access_token;
    }
    private function long_lived_token(AccessToken $access_token) {
        if (!$access_token->isLongLived()) {
            $oauth2_client = $this->fb->getOAuth2Client();
            try {
                return $oauth2_client->getLongLivedAccessToken($access_token);
            } catch (FacebookSDKException  $e) {
                $this->logError($e->getCode(), $e->getMessage());
                return null;
            }
        }
        return $access_token;
    }
    private function get_access_token() {
        return $this->session->userdata('fb_access_token');
    }
    private function set_access_token(AccessToken $access_token) {
        $this->session->set_userdata('fb_access_token', $access_token->getValue());
    }
    private function get_expire_time() {
        return $this->session->userdata('fb_expire');
    }
    private function set_expire_time(DateTime $time = null) {
        if ($time) {
            $this->session->set_userdata('fb_expire', $time->getTimestamp());
        }
    }
    private function logError($code, $message) {
        log_message('error', '[FACEBOOK PHP SDK] code: ' . $code . ' message: ' . $message);
        return ['error' => $code, 'message' => $message];
    }
    public function __get($var) {
        return get_instance()->$var;
    }
}