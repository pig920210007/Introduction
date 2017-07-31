 <?php defined('BASEPATH') OR exit('No direct script access allowed');
 include_once APPPATH."libraries/google-api-client-master/src/Google_Client.php";
        include_once APPPATH."libraries/google-api-client-master/src/contrib/Google_Oauth2Service.php";
        
        
        // Google Project API Credentials
        $clientId = '297296851133-2ce5tgj0dss2vu97ilq0tt8pa8mktahl.apps.googleusercontent.com';
        $clientSecret = 'q5EDhKYhIv7Cbz1GS8SN0C5U';
        $redirectUrl = 'http://www.introduction.com/Introduction/';        
        // Google Client Configuration
        $gClient = new Google_Client();
        $gClient->setApplicationName('Login to Introduction');
        $gClient->setClientId($clientId);
        $gClient->setClientSecret($clientSecret);
        $gClient->setRedirectUri($redirectUrl);
        $google_oauthV2 = new Google_Oauth2Service($gClient);

        if (isset($_REQUEST['code'])) {
            $gClient->authenticate();
            $this->session->set_userdata('token', $gClient->getAccessToken());
            redirect($redirectUrl);
        }

        $token = $this->session->userdata('token');
        if (!empty($token)) {
            $gClient->setAccessToken($token);
        }

        if ($gClient->getAccessToken()) {
            $userProfile = $google_oauthV2->userinfo->get();
            // Preparing data for database insertion
            $userData['oauth_provider'] = 'google';
            $userData['oauth_uid'] = $userProfile['id'];
            $userData['name'] = $userProfile['given_name'] . $userProfile['family_name'];          
            $userData['email'] = $userProfile['email'];
            $userData['type'] = '2';
            $userData['level'] = '1';
           
            // Insert or update user data
            $userID = $this->member_model->checkUser($userData);
       //     if($userId['mail'] === 1){
        //          $this->sendmail->send($userData['email'] ,'感謝您的註冊：' . $userData['name'],'已成功註冊');
        //    }
            if(!empty($userID)){
                $data['userData'] = $userData;
                $this->session->set_userdata('logged_in',$userData);

            } else {
               $data['userData'] = array();
            }
        } else {
            $data['authUrl'] = $gClient->createAuthUrl();
        }