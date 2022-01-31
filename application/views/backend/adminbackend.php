<?php 
$this->db->where('status !=', 'Done');
$total_spk = $this->db->get('spk')->num_rows();
$this->db->where('status !=', 'Done');
$total_ticket = $this->db->get('ticket')->num_rows();
/*$this->db->where('status !=', 'Done');*/
$total_agenda = $this->db->get('agenda')->num_rows();

$total = $total_spk + $total_ticket + $total_agenda;

?>
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

				<li class="active">
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
						<li><a href="<?php echo base_url('adminbackend/profil'); ?>"><span class="fa-stack fa-lg pull-left"><i class="fa fa-users fa-stack-1x "></i></span>Profil</a></li>
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
			<!-- <h3><p style="text-align: left; margin-left: 30px;"><b>Job Management System</a></p></h3>
			<h4><p style="text-align: right; margin-right: 20px;">Login as <a href=""><span>Agung Prabowo</span></a></p></h4> -->
			<h3><center>Unfinished JOB : <span class="btn btn-danger btn-lg" style="border:1px solid red; padding: 10px; border-radius: 5px; color: #fff;"><?php echo $total ; ?></span></center></h3>
			<hr />
			<div class="container">
				<div class="row">
					<div class="col-md-2">
						<h3 style="text-align: center;">SPK</h3>
					</div>
					<div class="col-md-9">
						<center>
							<table class="table table-bordered" style="background-color: #F0FFF0;">
								<thead>
									<tr>
										<th style="text-align: center;">No. SPK</th>
										<th style="text-align: center;">Client Name</th>
										<th style="text-align: center;">Project Name</th>
										<th style="text-align: center;">Item Project</th>
										<th style="text-align: center;">Status</th>
										<th style="text-align: center;">Change Status</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$this->db->where('status !=', 'Done');
									if($this->db->get('spk')->num_rows() == 0) { ?>
									<tr>
										<td colspan="5"><center>SELESAI !!!</center></td>
									</tr>	
									<?php } else { ?>
									<?php 
									$no = 1 ;
									foreach ($spk as $spk_data) :
										?>
									<tr>
										<td><?php echo $no++ ?></td>
										<td><?php echo $spk_data['nama_client'] ?></td>
										<td><?php echo $spk_data['nama_project'] ?></td>
										<td><?php echo $spk_data['item_project'] ?></td>
										<td><?php echo $spk_data['status'] ?></td>	
										<td style="text-align: center;"><a href="<?=base_url('adminbackend/change_status/Done/'. $spk_data['no_spk'])?>" class="btn btn-success btn-xs">Done</a> <a href="<?=base_url('adminbackend/change_status/Checking/'. $spk_data['no_spk'])?>" class="btn btn-warning btn-xs">Checking</a></td>
									</tr>
								<?php endforeach ; ?>
								<?php } ?>
							</tbody>
						</table>
					</center>
				</div>
			</div>
		</div>
		<hr />
		<div class="container">
			<div class="row">
				<div class="col-md-2">
					<h3 style="text-align: center;">Ticket</h3>
				</div>
				<div class="col-md-9">
					<center>
						<table class="table table-bordered" style="background-color: #FFF0F5;"  id="mytable">
							<thead>
								<tr>
									<th style="text-align: center;">No. Ticket</th>
									<th style="text-align: center;">Client Name</th>
									<th style="text-align: center;">Report</th>
									<th style="text-align: center;">Report In</th>
									<th style="text-align: center;">Level</th>
									<th style="text-align: center;">Status</th>
									<th style="text-align: center;">Change Status</th>
								</tr>
							</thead>
							<tbody>

								<?php 
								$this->db->where('status !=', 'Done');
								if($this->db->get('ticket')->num_rows() == 0){ ?>
								<tr>
									<td colspan="7"><center>SELESAI !!!</center></td>
								</tr>	
								<?php } else { ?>
								<?php
								$no = 1 ;
								foreach ($ticket as $ticket_data) :
									?>	
								<tr>
									<td><?php echo $no++ ?></td>
									<td><?php echo $ticket_data['nama_client'] ?></td>
									<td><?php echo $ticket_data['report'] ?></td>
									<td><?php echo $ticket_data['report_in'] ?></td>
									<td><?php $level = $ticket_data['level'] ;
									if ($level == 1) {
										echo 'High';
									} elseif ($level == 2) {
										echo 'Medium';
									} else {
										echo 'Low';
									}
									 ?></td>
									<td><?php echo $ticket_data['status'] ?></td>
									<td style="text-align: center;"><a href="<?=base_url('adminbackend/change_status_t/Done/'. $ticket_data['no_spk'])?>" class="btn btn-success btn-xs">Done</a> <a href="<?=base_url('adminbackend/change_status_t/Checking/'. $ticket_data['no_spk'])?>" class="btn btn-warning btn-xs">Checking</a></td>	
								</tr>
							<?php endforeach ; ?>
							<?php } ?>
						</tbody>
					</table>
				</center>
			</div>
		</div>
	</div>
	<hr />
	<div class="container">
		<div class="row">
			<div class="col-md-2">
				<h3 style="text-align: center;">Agenda</h3>
			</div>
			<div class="col-md-10">
				<center>
					<table class="table table-bordered" style="background-color: #FFF8DC;">
						<thead>
							<tr>
								<th style="text-align: center;">No. Agenda</th>
								<th style="text-align: center;">Invited By</th>
								<th style="text-align: center;">Judul Agenda</th>
								<th style="text-align: center;">Deskripsi Agenda</th>
								<th style="text-align: center;">Tempat</th>
								<th style="text-align: center;">Tanggal</th>
								<th style="text-align: center;">Jam</th>
								<th style="text-align: center;">Attenders</th>
								<th style="text-align: center;">Status</th>
								<th style="text-align: center;">Change Status</th>
							</tr>
						</thead>
						<tbody>
							<?php if($this->db->get('agenda')->num_rows() == 0) { ?>
							<tr>
								<td colspan="10"><center>Tidak Ada Agenda</center></td>
							</tr>
							<?php } else { ?>
							<?php
							$no = 1 ;
							foreach ($agenda as $agenda_data) :

								?>
							<tr>
								<td><?php echo $no++ ?></td>
								<td><?php echo $agenda_data['invited_by'] ?></td>
								<td><?php echo $agenda_data['judul_agenda'] ?></td>
								<td style="width: 170px;"><?php echo $agenda_data['deskripsi_agenda'] ?></td>
								<td style="width: 100px;"><?php echo $agenda_data['tempat'] ?></td>
								<td style="width: 100px;"><?php echo $agenda_data['tanggal'] ?></td>
								<td><?php echo $agenda_data['jam'] ?></td>
								<td style="width: 200px;"><?php echo $agenda_data['attenders'] ?></td>
								<td><?php echo $agenda_data['status'] ?></td>	
								<td style="text-align: center; width: 150px;"><a href="<?=base_url('adminbackend/change_status_a/Cancel/' . $agenda_data
									['no_agenda'])?>" class="btn btn-warning btn-xs">Cancel</a> <a href="<?=base_url('adminbackend/change_status_a/Pending/'. $agenda_data['no_agenda'])?>" class="btn btn-danger btn-xs">Pending</a>
									<a href="<?=base_url('adminbackend/change_status_a/Reschedule/' . $agenda_data['no_agenda'])?>" class="btn btn-info btn-xs">Reschedule</a></td>	
								</tr>
							<?php endforeach ; ?>
							<?php } ?>
						</tbody>
					</table>
				</center>
			</div>
		</div>
	</div>
</div>
<script src="<?=base_url();?>assets/js/jquery.js"></script>
<script src="<?=base_url();?>assets/js/bootstrap.min.js"></script>
<script src="<?=base_url();?>assets/js/wow.min.js"></script>
<script src="<?=base_url() ?>assets/js/load.js"></script>
<script src="<?=base_url();?>assets/js/sidebar_menu.js"></script>
</body>
</html>