<!DOCTYPE html>
<?php
$today = date('Y-m-d');
$next7day = date("Y-m-d", strtotime("+1 week"));
?>
<style type="text/css">
	.red{
		background-color: #d9534f !important;
	}
	.yellow{
		background-color: #ec971f !important;
	}
</style>
<html>
<head>
	<title>JMS Project</title>
	<script language=javascript>
		setTimeout("location.href='http://localhost/jm_project/board'", 19000);
	</script>
	<link href="<?=base_url()?>assets/bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="<?=base_url()?>assets/styles.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Arvo" rel="stylesheet">
	<link href="<?=base_url()?>assets/css/simple-sidebar.css" rel="stylesheet">
	<link href="<?=base_url()?>assets/css/font-awesome.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/css/animate.css" rel="stylesheet">
</head>
<body class="wow animated fadeIn data-wow-duration='3s' data-wow-delay='3s'" style="background: url('../assets/img/V9BqwTs.png'); background-width: 3000px; margin-top: 20px;"> 
	<div class="container-fluid">
		<div class="row" style="color: #fff;">
			<div class="col-sm-3">
				<big><strong style="font-family: 'Arvo', serif;">SPK Team Project</strong></big>
			</div>
			<div class="col-sm-2" style="color: #fff; margin-left:375px;">
				<span class="pull-right">Keterangan :</span>
			</div>
			<div class="col-md-2">
				<table class="table">
					<a href="" class="btn btn-warning btn-md btn-block">Mendekati Waktu Agenda</a>
				</table>
			</div>
			<div class="col-md-2">
				<a href="<?=base_url()?>board" class="btn btn-success btn-xs btn-block">Go to &rarr; SPK</a>
			</div>
		</div>
	</div>
	<hr>
	<?php foreach ($message_board as $key) { ?>
	<h1 style="color: #fff;"><marquee><?=$key['message'] ?> By - <?php echo $key['authors'] ?>-</marquee></h1>
	<?php } ?>
	<div class="container-fluid">
		<div class="col-md-12" style="color: #fff;">
			<center><big style="color: #fff; font-size: 30px;"><strong>Ticket</strong></big></center><br>
			<div class="yogs">
				<table class="table">
					<thead>
						<tr>
							<th>No. Ticket</th>
							<th>Nama Klien</th>
							<th>Laporan</th>
							<th>Report In At</th>
							<th>Level</th>
							<th>Status</th>
						</tr>						
					</thead>
					<?php 
					$this->db->where('status !=', 'Done');
					if($this->db->get('ticket')->num_rows() == 0) { ?>
					<tr>
						<td colspan="6"><center>SELESAI !!!</center></td>
					</tr>	
					<?php } else { ?>
					<?php $i = 1; foreach ($ticket as $key) : ?>
					<tr> 
						<td><?php echo $i++ ?></td>
						<td><?=$key['nama_client'] ?></td>
						<td><?=$key['report'] ?></td>
						<td><?=$key['report_in'] ?></td>
						<td><?php $level = $key['level'] ;
							if ($level == 1) {
								echo 'High';
							} elseif ($level == 2) {
								echo 'Medium';
							} else {
								echo 'Low';
							}
							?></td>
							<td><?=$key['status'] ?></td>
						</tr>
					<?php endforeach ; ?>
					<?php } ?> 
				</table>
			</div>
		</div>
	</div>
	<br>
	<div class="container-fluid">
		<div class="col-md-12" style="color: #fff">
			<center><big style="color: #fff; font-size: 30px;"><strong>Agenda</strong></big></center><br>
			<div class="yogs">
				<table class="table">
					<thead>
						<tr>
							<th>No. Agenda</th>
							<th>Invited By</th>
							<th>Judul Agenda</th>
							<th>Deskripsi Agenda</th>
							<th>Tempat</th>
							<th>Tanggal</th>
							<th>Jam</th>
							<th>Attenders</th>
							<th>Status</th>
						</tr>						
					</thead>
					<?php 
					$this->db->where('status !=', 'Cancel');
					if($this->db->get('agenda')->num_rows() == 0) { ?>
					<tr>
						<td colspan="9"><center>Tidak Ada Agenda</center></td>
					</tr>	
					<?php } else { ?>
					<?php $i = 1; foreach ($agenda as $key) : ?>
					<?php if($next7day >= $key['tanggal']) { ?>
					<tr class="yellow">
						<?php } else { ?>
						<tr>
							<?php } ?>
							<td><?=$i++ ?></td>
							<td><?=$key['invited_by']?></td>
							<td><?=$key['judul_agenda']?></td>
							<td>
								<?php
								$this_value = strip_tags($key['deskripsi_agenda']);
								if(strlen($this_value) > 70)
								{
									$this_value = substr($this_value,0,70)." ...";
								}
								echo $this_value ;
								?>
							</td>
							<td><?=$key['tempat']?></td>
							<td><?=date('D, d-M-Y',strtotime($key['tanggal']))?></td>
							<td><?=$key['jam']?></td>
							<td><?=$key['attenders']?></td>
							<td><?=$key['status'] ?></td>
						</tr>
					<?php endforeach; ?> 
					<?php } ?>
				</table>
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

