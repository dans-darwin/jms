<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>JMS Project Team</title>
	<link href="<?php echo base_url()?>assets/bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/css/animate.css" rel="stylesheet">
</head>
<body style="background:url(<?php echo base_url();?>assets/img/bg.jpg) no-repeat top center;">

	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-2 wow animated bounceInUp data-wow-duration='0,1s' data-wow-delay='0,1s'">
				<div style="margin-top: 200px;">
					<center><h3><strong>Job Management System</strong></h3></center>
					<center>SPK, Agenda & Revisi Team Project</center>
					<br>
					<center><p><b>Untuk Melihat Job Board Information</b></p></center>
					<a href="<?php echo base_url(); ?>board" class="btn btn-success btn-lg btn-block"><span class="glyphicon glyphicon-list" aria-hidden="true"></span> VIEW JOB BOARD</a>
				</div>
			</div>
			<center>
				<div class="col-md-4 wow animated bounceInDown data-wow-duration='0,1s' data-wow-delay='0,1s'">
					<div style="margin-top: 150px;">
						<div class="login-panel panel">
							<center><img src="<?php echo base_url()?>assets/img/logo1.png" width="200"><br/></center>

							<h5 style="text-align: center;"><strong>Login Information</strong></h5>
							<div class="panel-body">
								<form role="form" method="post" action="<?php echo base_url('login/proses_login'); ?>">
									<fieldset>
										<div class="form-group">
											<input class="form-control" placeholder="Username" name="username" type="username" autofocus>
										</div>
										<div class="form-group">
											<input class="form-control" placeholder="Password" name="password" type="password" value="">
										</div>
										<div class="checkbox">
											<label>
												<input name="remember" type="checkbox" value="Remember Me">Remember Me
											</label>
										</div>
										<!-- Change this to a button or input when using this as a form -->
										
										<button type="submit" class="btn btn-success btn-lg btn-block"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> Login</button>
									</fieldset>
								</form>
							</div>
						</div>
					</div>
				</div>
			</center>
			<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
			<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
			<script src="<?php echo base_url();?>assets/js/wow.min.js"></script>
			<script src="<?php echo base_url() ?>assets/js/load.js"></script>
			<script>
				$(function(){
					new WOW().init();
				});
			</script>
		</body>
		</html>