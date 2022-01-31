<!doctype html>
<html>
<head>
    <title>Ticket Update/Create</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
    <style>
        body{
            padding: 15px;
        }
    </style>
</head>
<body>
    <h2 style="margin-top:0px">Ticket <?php echo $button ?></h2>
    <form action="<?php echo $action; ?>" method="post">
       <div class="form-group">
        <label for="varchar">Nama Client <?php echo form_error('nama_client') ?></label>
        <input type="text" class="form-control" name="nama_client" id="nama_client" placeholder="Nama Client" value="<?php echo $nama_client; ?>" />
    </div>
    <div class="form-group">
        <label for="report">Report <?php echo form_error('report') ?></label>
        <textarea class="form-control" rows="3" name="report" id="report" placeholder="Report"><?php echo $report; ?></textarea>
    </div>
    <div class="form-group">
        <label for="date">Report In <?php echo form_error('report_in') ?></label>
        <input type="date" class="form-control" name="report_in" id="report_in" placeholder="Report In" value="<?php echo $report_in; ?>" />
    </div>
    <div class="form-group">
        <label for="int">Level <?php echo form_error('level') ?></label>
        <select  class="form-control" name="level" id="level" placeholder="Level">
            <option><?php $level ; if ($level == 1) {
                echo 'High';
            } elseif ($level == 2) {
                echo 'Medium';
            } else {
                echo 'Low';
            } ?></option>
            <option value="1">High</option>
            <option value="2">Medium</option>
            <option value="3">Low</option>
        </select>
    </div>
    <div class="form-group">
        <label for="enum">Status <?php echo form_error('status') ?></label>
        <select class="form-control" name="status" id="status" placeholder="Status" />
        <option><?php echo $status;?></option>
        <option value="checking">Checking</option>
        <option value="done">Done</option>
        <option value="on progress">On Progress</option>
    </select>
</div>
<input type="hidden" name="no_spk" value="<?php echo $no_spk; ?>" /> 
<button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
<a href="<?php echo site_url('ticket') ?>" class="btn btn-default">Cancel</a>
</form>
</body>
</html>