<!doctype html>
<html>
    <head>
        <title>Message Board Create</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Message Board <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Message <?php echo form_error('message') ?></label>
            <input type="text" class="form-control" name="message" id="message" placeholder="Message" value="<?php echo $message; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Authors <?php echo form_error('authors') ?></label>
            <input type="text" class="form-control" name="authors" id="authors" placeholder="Authors" value="<?php echo $authors; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('message_board') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>