<!-- <?php print_r($users); ?> -->
<!doctype html>
<html>
<head>
  <title>Profil</title>
  <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
  <link href="<?=base_url()?>assets/css/simple-sidebar.css" rel="stylesheet">
  <link href="<?=base_url()?>assets/styles.css" rel="stylesheet">
  <link href="<?=base_url()?>assets/css/font-awesome.css" rel="stylesheet">
  <style>
    body{
      padding: 15px;
    }
  </style>
</head>
<body>
  <nav class="navbar no-margin">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header fixed-brand">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"  id="menu-toggle">
        <span class="glyphicon glyphicon-th-large" aria-hidden="true"> </span>
      </button>
      <img style="width: 60%; margin-left: 45px;" src="<?=base_url();?>assets/img/logo1.png">
    </div><!-- navbar-header-->

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active" ><button class="navbar-toggle collapse in" data-toggle="collapse" id="menu-toggle-2"> <span class="glyphicon glyphicon-th-large" aria-hidden="true"></span></button></li>
      </ul>
    </div><!-- bs-example-navbar-collapse-1 -->
  </nav>
  <div id="wrapper">
    <!-- Sidebar -->
    <div id="sidebar-wrapper">
      <ul class="sidebar-nav nav-pills nav-stacked" id="menu">

        <li>
          <a href="<?php echo base_url(); ?>adminbackend/report"><span class="fa-stack fa-lg pull-left"><i class="fa fa-cloud-download fa-stack-1x "></i></span>Home</a>
        </li>
        <li>
          <a href="<?php echo base_url(); ?>spk"> <span class="fa-stack fa-lg pull-left"><i class="fa fa-briefcase fa-stack-1x "></i></span>SPK</a>
        </li>
        <li>
          <a href="<?php echo base_url(); ?>ticket"><span class="fa-stack fa-lg pull-left"><i class="fa fa-ticket fa-stack-1x "></i></span>Ticket</a>
        </li>
        <li>
          <a href="<?php echo base_url(); ?>agenda"><span class="fa-stack fa-lg pull-left"><i class="fa fa-calendar fa-stack-1x "></i></span>Agenda</a>
        </li>
        <li>
          <a href="<?php echo base_url(); ?>message_board"><span class="fa-stack fa-lg pull-left"><i class="fa fa-comments-o fa-stack-1x "></i></span>Message Board</a>
        </li>
        <li>
          <a href="<?php echo base_url(); ?>adminbackend/report_spk"><span class="fa-stack fa-lg pull-left"><i class="fa fa-paper-plane-o fa-stack-1x "></i></span>Report SPK</a>
        </li>
        <li>
          <a href="<?php echo base_url(); ?>users"><span class="fa-stack fa-lg pull-left"><i class="fa fa-user fa-stack-1x "></i></span> User</a>
        </li>
        <li  class="active">
          <a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-cogs fa-stack-1x "></i></span> Options </a>
          <ul class="nav-pills nav-stacked" style="list-style-type:none;">
            <li ><a href="<?php echo base_url('adminbackend/profil'); ?>"><span class="fa-stack fa-lg pull-left"><i class="fa fa-users fa-stack-1x "></i></span>Profil</a></li>
            <li><a href="<?php echo base_url('login/logout'); ?>"><span class="fa-stack fa-lg pull-left"><i class="fa fa-sign-out fa-stack-1x "></i></span>Logout</a></li>

          </ul>
        </li>
      </ul>
    </div><!-- /#sidebar-wrapper -->
    <!-- Page Content -->
    <div id="page-content-wrapper">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <h4><strong>Job Management System</strong></h4>
          </div>
          <div class="col-md-6">
            <h4 class="pull-right">Login as <a href="#"><?php echo $this->session->userdata("fullname"); ?></a></h4>
          </div>  
        </div>
      </div>
      <hr>
      <div class="container-fluid">

        <form action="<?php echo $action; ?>" method="post">
         <div class="form-group">
          <label for="varchar">Username <?php echo form_error('username') ?></label>
          <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" disabled="disabled" />
        </div>
        <div class="form-group">
          <label for="varchar">User Mail <?php echo form_error('user_mail') ?></label>
          <input type="text" class="form-control" name="user_mail" id="user_mail" placeholder="User Mail" value="<?php echo $user_mail; ?>" />
        </div>
        <div class="form-group">
          <label for="varchar">User Fullname <?php echo form_error('user_fullname') ?></label>
          <input type="text" class="form-control" name="user_fullname" id="user_fullname" placeholder="User Fullname" value="<?php echo $user_fullname; ?>" />
        </div>
        <div class="form-group">
          <label for="varchar">Password <?php echo form_error('password') ?></label> (leave blank if not change password)
          <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="" />
        </div>
        <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
        <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
        <a href="<?php echo site_url('users') ?>">
        </div>
      </body>
      <script src="<?=base_url();?>assets/js/jquery.js"></script>
      <script src="<?=base_url();?>assets/js/bootstrap.min.js"></script>
      <script src="<?=base_url();?>assets/js/wow.min.js"></script>
      <script src="<?=base_url() ?>assets/js/load.js"></script>
      <script src="<?=base_url();?>assets/js/sidebar_menu.js"></script>
      </html>