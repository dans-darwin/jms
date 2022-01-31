<!doctype html>
<html>
    <head>
        <title>Read Agenda</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Agenda Read</h2>
        <table class="table">
	    <tr><td>Invited By</td><td><?php echo $invited_by; ?></td></tr>
	    <tr><td>Judul Agenda</td><td><?php echo $judul_agenda; ?></td></tr>
	    <tr><td>Deskripsi Agenda</td><td><?php echo $deskripsi_agenda; ?></td></tr>
	    <tr><td>Tempat</td><td><?php echo $tempat; ?></td></tr>
	    <tr><td>Tanggal</td><td><?php echo $tanggal; ?></td></tr>
	    <tr><td>Jam</td><td><?php echo $jam; ?></td></tr>
	    <tr><td>Attenders</td><td><?php echo $attenders; ?></td></tr>
	    <tr><td>Status</td><td><?php echo $status; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('agenda') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>