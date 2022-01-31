<!doctype html>
<html>
    <head>
        <title>SPK Create/Update</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Spk <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama Client <?php echo form_error('nama_client') ?></label>
            <input type="text" class="form-control" name="nama_client" id="nama_client" placeholder="Nama Client" value="<?php echo $nama_client; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Project <?php echo form_error('nama_project') ?></label>
            <input type="text" class="form-control" name="nama_project" id="nama_project" placeholder="Nama Project" value="<?php echo $nama_project; ?>" />
        </div>
	    <div class="form-group">
            <label for="item_project">Item Project <?php echo form_error('item_project') ?></label>
            <textarea class="form-control" rows="3" name="item_project" id="item_project" placeholder="Item Project"><?php echo $item_project; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="date">Start Date <?php echo form_error('start_date') ?></label>
            <input type="date" class="form-control" name="start_date" id="start_date" placeholder="Start Date" value="<?php echo $start_date; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Due Date <?php echo form_error('due_date') ?></label>
            <input type="date" class="form-control" name="due_date" id="due_date" placeholder="Due Date" value="<?php echo $due_date; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Status <?php echo form_error('status') ?></label>
            <select class="form-control" name="status" id="status" placeholder="Status" />
                <option><?php echo $status; ?></option>
                <option value="checking">Checking</option>
                <option value="done">Done</option>
                <option value="on progress">On Progress</option>
                <option value="pending">Pending</option>
            </select>
        </div>
	    <input type="hidden" name="no_spk" value="<?php echo $no_spk; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('spk') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>