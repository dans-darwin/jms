<!doctype html>
<html>
    <head>
        <title>Ticket Word</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Ticket List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama Client</th>
		<th>Report</th>
		<th>Report In</th>
		<th>Level</th>
		<th>Status</th>
		
            </tr><?php
            foreach ($ticket_data as $ticket)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $ticket->nama_client ?></td>
		      <td><?php echo $ticket->report ?></td>
		      <td><?php echo $ticket->report_in ?></td>
		      <td><?php echo $ticket->level ?></td>
		      <td><?php echo $ticket->status ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>