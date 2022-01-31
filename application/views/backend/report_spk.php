<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>JMS Project Team</title>
	<link href="<?=base_url()?>assets/bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="<?=base_url()?>assets/styles.css" rel="stylesheet">
	<link href="<?=base_url()?>assets/css/simple-sidebar.css" rel="stylesheet">
	<link href="<?=base_url()?>assets/css/font-awesome.css" rel="stylesheet">
</head>
<body style="background-color: #fff;">
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
                <li class="active">
                    <a href="<?php echo base_url(); ?>adminbackend/report_spk"><span class="fa-stack fa-lg pull-left"><i class="fa fa-paper-plane-o fa-stack-1x "></i></span>Report SPK</a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>users"><span class="fa-stack fa-lg pull-left"><i class="fa fa-user fa-stack-1x "></i></span> User</a>
                </li>
                <li>
                    <a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-cogs fa-stack-1x "></i></span> Options </a>
                    <ul class="nav-pills nav-stacked" style="list-style-type:none;">
                        <li><a href="<?php echo base_url(); ?>adminbackend/profil"><span class="fa-stack fa-lg pull-left"><i class="fa fa-users fa-stack-1x "></i></span>Profil</a></li>
                        <li><a href="<?php echo base_url('login/logout'); ?>"><span class="fa-stack fa-lg pull-left"><i class="fa fa-sign-out fa-stack-1x "></i></span>Logout</a></li>

                    </ul>
                </li>
            </ul>
        </div><!-- /#sidebar-wrapper -->
        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h4><strong>Job Management System</strong></h4>
                    </div>
                    <div class="col-md-6 text-right">
                        <h4 class="pull-right">Login as <a href="#"><?php echo $this->session->userdata("fullname"); ?></a></h4>
                    </div>  
                </div>
                <!-- end  -->
                <hr>
			<div class="col-md-4">
				<h2 style="margin-top: 30px; margin-bottom: 25px ">Report</h2>
			</div>
			<div class="col-md-12">
				<div class="well">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th style="text-align: center;">No . SPK</th>
								<th style="text-align: center;">Action</th>
								<th style="text-align: center;">No . Ticket</th>
								<th style="text-align: center;">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							foreach ($ticket as $keys) :
								foreach ($spk as $key) :
									?>
								<tr style="text-align: center;">
									<td><?php echo $key['no_spk']; ?></td>
									<td style="text-align: center;"><a href="<?=base_url('spk/read/' . $key['no_spk'])?>" class="btn btn-success btn-sm"><i class="fa fa-search" aria-hidden="true"></i></a></td>
									<td><?php echo $keys['no_spk']; ?></td>
									<td style="text-align: center;"><a href="<?=base_url('ticket/read/' . $keys['no_spk'])?>" class="btn btn-info btn-sm"><i class="fa fa-search" aria-hidden="true"></i></a></td>
								</tr>
							<?php endforeach ; ?>
						<?php endforeach ; ?>
					</tbody>

					<script src="<?=base_url();?>assets/js/jquery.js"></script>
					<script src="<?=base_url();?>assets/js/bootstrap.min.js"></script>
					<script src="<?=base_url();?>assets/js/wow.min.js"></script>
					<script src="<?=base_url() ?>assets/js/load.js"></script>
					<script src="<?=base_url();?>assets/js/sidebar_menu.js"></script>
				</body>
				</html>