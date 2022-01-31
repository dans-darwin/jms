<!doctype html>
<html>
<head>
    <title>Ticket Read</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
    <style>
        body{
            padding: 15px;
        }
    </style>
</head>
<body>
    <h2 style="margin-top:0px">Ticket Read</h2>
    <table class="table">
       <tr><td>Nama Client</td><td><?php echo $nama_client; ?></td></tr>
       <tr><td>Report</td><td><?php echo $report; ?></td></tr>
       <tr><td>Report In</td><td><?php echo $report_in; ?></td></tr>
       <tr><td>Level</td><td><?php $level; if ($level == 1) {
        echo 'High';
    } elseif ($level == 2) {
        echo 'Medium';
    } else {
        echo 'Low';
    } ?></td></tr>
    <tr><td>Status</td><td><?php echo $status; ?></td></tr>
    <tr><td></td><td><a href="<?php echo site_url('ticket') ?>" class="btn btn-default">Back To List</a> <span><a href="<?php echo site_url('adminbackend/report_spk') ?>" class="btn btn-info">Back To Report</a></span></td></tr>
</table>
</body>
</html>