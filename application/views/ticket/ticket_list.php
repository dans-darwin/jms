<!doctype html>
<html>
<head>
    <title>Ticket List</title>
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
                <li class="active">
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
                <h2 style="margin-top:0px">Ticket List</h2>
                <br>
                <div class="row" style="margin-bottom: 10px">
                    <div class="col-md-4">
                        <?php echo anchor(site_url('ticket/create'),'Create', 'class="btn btn-primary"'); ?>
                    </div>
                    <div class="col-md-4 text-center">
                        <div style="margin-top: 8px" id="message">
                            <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                        </div>
                    </div>
                    <div class="col-md-1 text-right">
                    </div>
                    <div class="col-md-3 text-right">
                        <form action="<?php echo site_url('ticket/index'); ?>" class="form-inline" method="get">
                            <div class="input-group">
                                <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                                <span class="input-group-btn">
                                    <?php 
                                    if ($q <> '')
                                    {
                                        ?>
                                        <a href="<?php echo site_url('ticket'); ?>" class="btn btn-default">Reset</a>
                                        <?php
                                    }
                                    ?>
                                    <button class="btn btn-primary" type="submit">Search</button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
                <br>
                <table class="table table-bordered" style="margin-bottom: 10px;">
                    <thead>
                        <th>No</th>
                        <th>Nama Client</th>
                        <th>Report</th>
                        <th>Report In</th>
                        <th>Level</th>
                        <th>Status</th>
                        <th>Action</th>
                    </thead><?php
                    foreach ($ticket_data as $ticket)
                    {
                        ?>
                        <tbody>
                         <td width="80px"><?php echo ++$start ?></td>
                         <td><?php echo $ticket->nama_client ?></td>
                         <td><?php echo $ticket->report ?></td>
                         <td><?php echo $ticket->report_in ?></td>
                         <td><?php $level = $ticket->level ; 
                             if ($level == 1) {
                                echo 'High';
                            } elseif ($level == 2) {
                                echo 'Medium';
                            } else {
                                echo 'Low';
                            }?></td>
                            <td><?php echo $ticket->status ?></td>
                            <td style="text-align:center" width="200px">
                                <?php 
                                echo anchor(site_url('ticket/read/'.$ticket->no_spk),'<i class="fa fa-search fa-xs" aria-hidden="true"></i>'); 
                                echo ' | '; 
                                echo anchor(site_url('ticket/update/'.$ticket->no_spk),'<i class="fa fa-pencil fa-xs" aria-hidden="true"></i>'); 
                                echo ' | '; 
                                echo anchor(site_url('ticket/delete/'.$ticket->no_spk),'<i class="fa fa-trash-o fa-xs" aria-hidden="true"></i>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
                                ?>
                            </td>
                        </tbody>
                        <?php
                    }
                    ?>
                </table>
                <div class="row">
                    <div class="col-md-6">
                        <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
                        <?php echo anchor(site_url('ticket/excel'), 'Excel', 'class="btn btn-primary"'); ?>
                        <?php echo anchor(site_url('ticket/word'), 'Word', 'class="btn btn-primary"'); ?>
                    </div>
                    <div class="col-md-6 text-right">
                        <?php echo $pagination ?>
                    </div>
                </div>
                <script src="<?=base_url();?>assets/js/jquery.js"></script>
                <script src="<?=base_url();?>assets/js/bootstrap.min.js"></script>
                <script src="<?=base_url();?>assets/js/wow.min.js"></script>
                <script src="<?=base_url() ?>assets/js/load.js"></script>
                <script src="<?=base_url();?>assets/js/sidebar_menu.js"></script>
            </body>
            </html>