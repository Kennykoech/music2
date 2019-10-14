<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery-3.4.1.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/css/bootstrap.css'); ?>"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">  
  </head>
  <body class="body">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mynavbar" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  <a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/head.jpg"/> </a>
  <div class="collapse navbar-collapse" id="mynavbar">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
    <?php if(!$this->session->userdata('logged_in')) : ?>
      <li class="nav-item" >
        <a style="color:lightseagreen;" class="nav-link" href="<?php echo base_url();?>users/sign_up">Sign Up</a>
      </li>
      <li class="nav-item">
        <a style="color:lightseagreen;" class="nav-link" href="<?php echo base_url();?>users/login">Login</a>
      </li>
      <?php endif;?>
      <?php if($this->session->userdata('logged_in')) : ?>
      <li class="nav-item">
        <marquee><h4>Welcome!</h4></marquee>
      </li>
      <li class="nav-item">
        <a style="color:lightseagreen;"class="nav-link" href="<?php echo base_url();?>users/logout">Logout</a>
      </li>
      <?php endif;?>
    </ul>
    <?php echo form_open('users/search_results')?>
        <?php echo form_input(array('name'=>'search'))?>
        <?php echo form_submit('search_submit','Search')?>
    <?php echo form_close()?>
  </div>
</nav>
<?php if($this->session->flashdata('user_loggedin')): ?>
  <?php echo '<p class="alert alert-success">' .$this->session->flashdata('user_loggedin').'</p>';?>
<?php endif; ?>