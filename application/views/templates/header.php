<html>
        <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
                <title><?php echo $title?></title>
               <link rel="stylesheet" href="https://bootswatch.com/superhero/bootstrap.min.css">
               <link rel="stylesheet" href="https://bootswatch.com/superhero/bootstrap.css">
               <link rel="stylesheet" href="https://bootswatch.com/superhero/variables.less">
               <link rel="stylesheet" href="https://bootswatch.com/superhero/bootswatch.less">
               <link rel="stylesheet" href="https://bootswatch.com/superhero/_variables.scss">
               <link rel="stylesheet" href="https://bootswatch.com/superhero/_bootswatch.scss">
               <link rel="stylesheet" href="<?php echo base_url(); ?>application/assets/css/style.css">
               <script src="http://cdn.ckeditor.com/4.7.0/standard/ckeditor.js"></script>
               
               
        </head>
        <body>


             
      <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo base_url(); ?>"><?php echo $index ?></a>
    </div>
 <?php if($this->session->userdata('level') ==1 or $this->session->userdata('level') ==2) : ?>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
      <ul class="nav navbar-nav">
        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo $introduction ?> <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="<?php echo base_url(); ?>introduction/title"><?php echo $introduction_title ?></a></li>
            <li><a href="<?php echo base_url(); ?>introduction/works"><?php echo $introduction_works ?></a></li>
            <li><a href="<?php echo base_url(); ?>introduction/license"><?php echo $introduction_license ?></a></li>
           
          </ul>
        </li>

      <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo $works ?> <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">

          <?php foreach($works_titles as $works_title) : ?>
            <li><a href="<?php echo site_url('/works/title/' . $works_title['id']); ?>"><?php echo $works_title['name']; ?></a></li>
            <?php endforeach; ?>
           
          </ul>
        </li>

         <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo $workproject ?><span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
          <?php foreach($workproject_titles as $workproject_title) : ?>
            <li><a href="<?php echo site_url('/workproject/title/' . $workproject_title['id']); ?>"><?php echo $workproject_title['name']; ?></a></li>
            
            <?php endforeach; ?>
            
          </ul>
        </li>

         <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo $ciworks ?> <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="<?php echo base_url(); ?>/ciworks/member"><?php echo $ciworks_index ?></a></li>
            <li><a href="<?php echo base_url(); ?>/ciworks/api"><?php echo $ciworks_login ?></a></li>
            <li><a href="<?php echo base_url(); ?>/ciworks/smtp"><?php echo $ciworks_smtp ?></a></li>
            
            <li><a href="<?php echo base_url(); ?>/ciworks/permission"><?php echo $ciworks_permission ?></a></li>
            
            <li><a href="<?php echo base_url(); ?>/ciworks/sms"><?php echo $ciworks_sms ?></a></li>
          </ul>
        </li>

         <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo $google ?> <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="<?php echo base_url(); ?>/google/html"><?php echo $google_html ?></a></li>
            <li><a href="<?php echo base_url(); ?>/google/smtp"><?php echo $google_smtp ?></a></li>
            
          </ul>
        </li>

     <li class="active"><a href="<?php echo base_url(); ?>/git/home"><?php echo $git ?> <span class="sr-only">(current)</span></a></li>
        

          <li class="active"><a href="<?php echo base_url(); ?>/rwd/home"><?php echo $rwd ?> <span class="sr-only">(current)</span></a></li>
        

         


      </ul>
      <?php endif; ?>
    <?php if(!$this->session->userdata('logged_in')) : ?>
      <ul class="nav navbar-nav navbar-right">       
        <li><a href="<?php echo base_url(); ?>/member/register">註冊</a></li>
      </ul>
       <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo base_url(); ?>/member/login">登入</a></li>
      </ul>

<!-- 
       <ul class="nav navbar-nav navbar-right">
        <li><a href="#">fb登入</a></li>
      </ul>
       <ul class="nav navbar-nav navbar-right">
             <?php  if(!empty($authUrl)) { ?>
        <li><a href="<?php echo $authUrl ?>">google登入</a></li>
        <?php } ?>
      </ul>
    
      -->
  <?php endif; ?>
        <?php if($this->session->userdata('logged_in')) : ?>
      <ul class="nav navbar-nav navbar-right">       
        <li><a href="<?php echo base_url(); ?>/member/loginout">登出</a></li>
      </ul>
        <?php endif; ?>
    </div>
  </div>
</nav>

<div class="container">

 <?php if($this->session->flashdata('works_created')): ?>
   <?php echo '<p class="alert alert-success">'.$this->session->flashdata('works_created').'</p>'; ?>
   <?php endif; ?>

    <?php if($this->session->flashdata('works_updated')): ?>
   <?php echo '<p class="alert alert-success">'.$this->session->flashdata('works_updated').'</p>'; ?>
   <?php endif; ?>

     <?php if($this->session->flashdata('works_deleted')): ?>
   <?php echo '<p class="alert alert-success">'.$this->session->flashdata('works_deleted').'</p>'; ?>
   <?php endif; ?>

    <?php if($this->session->flashdata('workproject_created')): ?>
   <?php echo '<p class="alert alert-success">'.$this->session->flashdata('workproject_created').'</p>'; ?>
   <?php endif; ?>

    <?php if($this->session->flashdata('workproject_updated')): ?>
   <?php echo '<p class="alert alert-success">'.$this->session->flashdata('workproject_updated').'</p>'; ?>
   <?php endif; ?>

     <?php if($this->session->flashdata('workproject_deleted')): ?>
   <?php echo '<p class="alert alert-success">'.$this->session->flashdata('workproject_deleted').'</p>'; ?>
   <?php endif; ?>

   <?php if($this->session->flashdata('user_registered')): ?>
   <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_registered').'</p>'; ?>
   <?php endif; ?>

    <?php if($this->session->flashdata('login_failed')): ?>
   <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('login_failed').'</p>'; ?>
   <?php endif; ?>

      <?php if($this->session->flashdata('user_loggedin')): ?>
   <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedin').'</p>'; ?>
   <?php endif; ?>