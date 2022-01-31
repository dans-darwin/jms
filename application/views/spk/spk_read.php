<!doctype html>
<html>
    <head>
        <title>SPK Read</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Spk Read</h2>
        <table class="table">
	    <tr><td>Nama Client</td><td><?php echo $nama_client; ?></td></tr>
	    <tr><td>Nama Project</td><td><?php echo $nama_project; ?></td></tr>
	    <tr><td>Item Project</td><td><?php echo $item_project; ?></td></tr>
	    <tr><td>Start Date</td><td><?php echo $start_date; ?></td></tr>
	    <tr><td>Due Date</td><td><?php echo $due_date; ?></td></tr>
	    <tr><td>Status</td><td><?php echo $status; ?></td></tr>
	    <tr><td>Last Update By</td><td><?php echo $last_update_by; ?></td></tr>
	    <tr><td>Last Update Time</td><td><?php echo $last_update_time; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('spk') ?>" class="btn btn-default">Back To List</a> <span><a href="<?php echo site_url('adminbackend/report_spk')  ?>" class="btn btn-success">Back To Report</a></span></td></tr>
	</table>
        </body>
</html>