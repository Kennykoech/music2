<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-primary">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mynavbar" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="#"><img src="<?php echo base_url(); ?>assets/images/song.jpg"/></a>

  <div class="collapse navbar-collapse" id="mynavbar">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
    <li class="nav-item">
        <a class="nav-link" href=""><h2 style="color:skyblue;">kennymix</h2></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><h2 style="color:skyblue;">Administration</h2></a>
      </li>
      <li class="nav-item">
        <a class="nav-link"><h2 style="color:skyblue;">Panel</h2></a>
      </li>
    </ul>
  </div>
  <div class="navbar navbar-right">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <?php if(!$this->session->userdata('logged_in')) : ?>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url();?>admin/sign_up"><h5 style="color:skyblue;">Sign Up</h5></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url();?>admin/login"><h5 style="color:skyblue;">Login</h5></a>
      </li>
      <?php endif; ?>
      
      <?php if($this->session->userdata('logged_in')) : ?>
      <li class="nav-item">
        <a class="nav-link" href="#"><?php echo anchor('admin/create', 'Add Song', ['class' => 'btn btn-primary']);?></a>
      </li><br><br>
      <?php echo form_open('admin/search_results')?>
        <?php echo form_input(array('name'=>'search'))?>
        <?php echo form_submit('search_submit','Search')?>
      <?php echo form_close()?>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url();?>admin/logout"><h5 style="color:skyblue;">Logout</h5></a>
      </li>
      <?php endif; ?>
    </ul>  
  </div>
</nav>
<?php if($this->session->flashdata('admin_loggedin')): ?>
  <?php echo '<p class="alert alert-success">' .$this->session->flashdata('admin_loggedin').'</p>';?>
<?php endif; ?>
<!-- <div id="result">

</div> -->

  