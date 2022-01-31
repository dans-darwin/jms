<!doctype html>
<html>
<head>
    <title>Message Board</title>
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
                <li class="active">
                    <a href="<?php echo base_url(); ?>message_board"><span class="fa-stack fa-lg pull-left"><i class="fa fa-comments-o fa-stack-1x "></i></span>Message Board</a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>adminbackend/report_spk"><span class="fa-stack fa-lg pull-left"><i class="fa fa-paper-plane-o fa-stack-1x "></i></span>Report SPK</a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>users"><span class="fa-stack fa-lg pull-left"><i class="fa fa-user fa-stack-1x "></i></span> User</a>
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

                <div class="row" style="margin-bottom: 10px">
                    <div class="col-md-4">
                        <h2 style="margin-top:0px">Message Board List</h2>
                    </div>
                    <div class="col-md-4 text-center">
                        <div style="margin-top: 4px"  id="message">
                            <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                        </div>
                    </div>
                    <div class="col-md-4 text-right">
                        <?php echo anchor(site_url('message_board/create'), 'Create', 'class="btn btn-primary"'); ?>
                        <?php echo anchor(site_url('message_board/excel'), 'Excel', 'class="btn btn-primary"'); ?>
                        <?php echo anchor(site_url('message_board/word'), 'Word', 'class="btn btn-primary"'); ?>
                    </div>
                </div>
                <table class="table table-bordered table-striped" id="mytable">
                    <thead>
                        <tr>
                            <th width="80px">No</th>
                            <th>Message</th>
                            <th>Authors</th>
                            <th width="200px">Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <script src="<?=base_url();?>assets/js/jquery.js"></script>
    <script src="<?=base_url();?>assets/js/bootstrap.min.js"></script>
    <script src="<?=base_url();?>assets/js/wow.min.js"></script>
    <script src="<?=base_url() ?>assets/js/load.js"></script>
    <script src="<?=base_url();?>assets/js/sidebar_menu.js"></script>
    <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
    <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
            {
                return {
                    "iStart": oSettings._iDisplayStart,
                    "iEnd": oSettings.fnDisplayEnd(),
                    "iLength": oSettings._iDisplayLength,
                    "iTotal": oSettings.fnRecordsTotal(),
                    "iFilteredTotal": oSettings.fnRecordsDisplay(),
                    "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                    "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
                };
            };

            var t = $("#mytable").dataTable({
                initComplete: function() {
                    var api = this.api();
                    $('#mytable_filter input')
                    .off('.DT')
                    .on('keyup.DT', function(e) {
                        if (e.keyCode == 13) {
                            api.search(this.value).draw();
                        }
                    });
                },
                oLanguage: {
                    sProcessing: "Loading..."
                },
                processing: true,
                serverSide: true,
                ajax: {"url": "message_board/json", "type": "POST"},
                columns: [
                {
                    "data": "id",
                    "orderable": false
                },{"data": "message"},{"data": "authors"},
                {
                    "data" : "action",
                    "orderable": false,
                    "className" : "text-center"
                }
                ],
                order: [[0, 'desc']],
                rowCallback: function(row, data, iDisplayIndex) {
                    var info = this.fnPagingInfo();
                    var page = info.iPage;
                    var length = info.iLength;
                    var index = page * length + (iDisplayIndex + 1);
                    $('td:eq(0)', row).html(index);
                }
            });
        });
    </script>
</body>
</html>