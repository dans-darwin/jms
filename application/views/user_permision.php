<!doctype html>
<html>
<head>
    <title>User Permision</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
    <link rel="stylesheet" href="<?php echo base_url('assets/datatables/dataTables.bootstrap.css') ?>"/>
    <link rel="stylesheet" href="<?php echo base_url('assets/datatables/dataTables.bootstrap.css') ?>"/>
    <link href="<?=base_url()?>assets/css/simple-sidebar.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/styles.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/css/font-awesome.css" rel="stylesheet">
    <style>
        .dataTables_wrapper {
            min-height: 500px
        }

        .dataTables_processing {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 100%;
            margin-left: -50%;
            margin-top: -25px;
            padding-top: 20px;
            text-align: center;
            font-size: 1.2em;
            color:grey;
        }
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
                <div class="alert alert-danger">You don't have permission to Access</div> <a href="<?php echo base_url('users') ?>">Back To List</a>
                <script src="<?=base_url();?>assets/js/jquery.js"></script>
                <script src="<?=base_url();?>assets/js/bootstrap.min.js"></script>
                <script src="<?=base_url();?>assets/js/wow.min.js"></script>
                <script src="<?=base_url() ?>assets/js/load.js"></script>
                <script src="<?=base_url();?>assets/js/sidebar_menu.js"></script>
                <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
                <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
                <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>