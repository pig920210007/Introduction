<?php
if(!empty($authUrl)) {
    echo '<a href="'.$authUrl.'"><img src="'.base_url().'application/assets/images/glogin.jpg" alt=""/></a>';
}else{

?>
<div class="wrapper">
    <h1>Google Profile Details </h1>
    <?php
    echo '<div class="welcome_txt">Welcome <b>'.$userData['name'].'</b></div>';
    echo '<div class="google_box">';
   // echo '<p class="image"><img src="'.$userData['picture_url'].'" alt="" width="300" height="220"/></p>';
    echo '<p><b>Google ID : </b>' . $userData['oauth_uid'].'</p>';
    echo '<p><b>Name : </b>' . $userData['name'] .'</p>';
    echo '<p><b>Email : </b>' . $userData['email'].'</p>';
   // echo '<p><b>Gender : </b>' . $userData['gender'].'</p>';
   // echo '<p><b>Locale : </b>' . $userData['locale'].'</p>';
  //  echo '<p><b>Google+ Link : </b>' . $userData['profile_url'].'</p>';
    echo '<p><b>You are login with : </b>Google</p>';
    echo '<p><b>Logout from <a href="'.base_url().'member/loginout">Google</a></b></p>';
    echo '</div>';
    ?>
</div>
<?php } ?>