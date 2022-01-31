<!doctype html>
<html>
    <head>
        <title>SPK Word</title>
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
        <h2>Spk List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama Client</th>
		<th>Nama Project</th>
		<th>Item Project</th>
		<th>Start Date</th>
		<th>Due Date</th>
		<th>Status</th>
		<th>Last Update By</th>
		<th>Last Update Time</th>
		
            </tr><?php
            foreach ($spk_data as $spk)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $spk->nama_client ?></td>
		      <td><?php echo $spk->nama_project ?></td>
		      <td><?php echo $spk->item_project ?></td>
		      <td><?php echo $spk->start_date ?></td>
		      <td><?php echo $spk->due_date ?></td>
		      <td><?php echo $spk->status ?></td>
		      <td><?php echo $spk->last_update_by ?></td>
		      <td><?php echo $spk->last_update_time ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>