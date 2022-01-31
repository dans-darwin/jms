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
		setTimeout("location.href='http://localhost/jm_project/board/index2'", 19000);
	</script>
	<link href="<?=base_url()?>assets/bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="<?=base_url()?>assets/styles.css" rel="stylesheet">
	<link href="<?=base_url()?>assets/css/simple-sidebar.css" rel="stylesheet">
	<link href="<?=base_url()?>assets/css/font-awesome.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/css/animate.css" rel="stylesheet">
</head>

<body class="wow animated fadeIn data-wow-duration='3s' data-wow-delay='3s'" style="background: url('./assets/img/V9BqwTs.png'); background-width: 3000px; margin-top: 20px;"> 
	<div class="container-fluid">
		<div class="row">
			<div class="" style="">
				<h2><center><big style="color: #fff; text-align: center;"><strong>Surat Perintah Kerja</strong></big></center></h2>
			</div>
		</div>
	</div>
</div>
<hr>
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-3">
			<big style="color: #fff;"><strong>SPK TEAM PROJECT</strong></big>
		</div>
		<div class="col-sm-2" style="color: #fff;">
			<span class="pull-right">Keterangan :</span>
		</div>
		<div class="col-md-3">
			<table class="table">
				<a href="#" class="btn btn-danger btn-md btn-block">Telah Melewati Duedate</a>
			</table>
		</div>
		<div class="col-md-2">
			<table class="table">
				<a href="#" class="btn btn-warning btn-md btn-block">Duedate kurang dari 7 hari</a>
			</table>
		</div>
		<div class="col-sm-2">
			<a href="<?=base_url()?>board/index2" class="btn btn-success btn-xs btn-block">Go to &rarr; Ticket & Agenda</a>
		</div>
	</div>
	<br>
	<?php foreach ($message_board as $key) { ?>
	<h1 style="color: #fff;"><marquee><?=$key['message'] ?> By - <?=$key['authors'] ?> -</marquee></h1>
	<?php } ?> 
	<br>
	<div class="col-md-12">
		<div class="yogs">
			<table class="table table-cell">
				<thead style="color: #fff;">
					<tr>
						<th>No. SPK</th>
						<th>Nama Klien</th>
						<th>Nama Project</th>
						<th>Item Project</th>
						<th>Start</th>
						<th>Duedate</th>
						<th>Status</th>
					</tr>						
				</thead>
				<tbody style="color: #fff;">
					<?php 
					$this->db->where('status !=', 'Done');
					if($this->db->get('spk')->num_rows() == 0) { ?>
					<tr>
						<td colspan="5"><center>SELESAI !!!</center></td>
					</tr>	
					<?php } else { ?>
					<?php 
					$i = 1;
					foreach ($spk as $key) : ?>
					<?php if($today >= $key['due_date']) { ?>
					<tr class="red">
						<?php } else if($next7day >= $key['due_date']) { ?>
						<tr class="yellow">
							<?php } else { ?>
							<tr>
								<?php } ?>
								<td><?=$i++ ?></td>
								<td><?=$key['nama_client']?></td>
								<td><?=$key['nama_project']?></td>
								<td>
									<?php
									$this_value = strip_tags($key['item_project']);
									if(strlen($this_value) > 70)
									{
										$this_value = substr($this_value,0,70)." ...";
									}
									echo $this_value ;
									?>
								</td>
								<td><?=date('D, d-M-Y',strtotime($key['start_date']))?></td>
								<td><?=date('D, d-M-Y',strtotime($key['due_date']))?></td>
								<td><?=$key['status'] ?></td>
							</tr>
						<?php endforeach; ?>
						<?php $i++; } ?> 

					</tbody>
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