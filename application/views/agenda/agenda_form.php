<!doctype html>
<html>
<head>
    <title>Agenda Create/Update</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
    <style>
        body{
            padding: 15px;
        }
    </style>
</head>
<body>
    <h2 style="margin-top:0px">Agenda <?php echo $agenda['button'] ?></h2>
    <form action="<?php echo $agenda['action']; ?>" method="post">
        <div class="form-group">
            <label for="varchar">Invited By <?php echo form_error('invited_by') ?></label>
            <input type="text" class="form-control" name="invited_by" id="invited_by" placeholder="Invited By" value="<?php echo $agenda['invited_by']; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">Judul Agenda <?php echo form_error('judul_agenda') ?></label>
            <input type="text" class="form-control" name="judul_agenda" id="judul_agenda" placeholder="Judul Agenda" value="<?php echo $agenda['judul_agenda']; ?>" />
        </div>
        <div class="form-group">
            <label for="deskripsi_agenda">Deskripsi Agenda <?php echo form_error('deskripsi_agenda') ?></label>
            <textarea class="form-control" rows="3" name="deskripsi_agenda" id="deskripsi_agenda" placeholder="Deskripsi Agenda"><?php echo $agenda['deskripsi_agenda']; ?></textarea>
        </div>
        <div class="form-group">
            <label for="varchar">Tempat <?php echo form_error('tempat') ?></label>
            <input type="text" class="form-control" name="tempat" id="tempat" placeholder="Tempat" value="<?php echo $agenda['tempat']; ?>" />
        </div>
        <div class="form-group">
            <label for="date">Tanggal <?php echo form_error('tanggal') ?></label>
            <input type="date" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo $agenda['tanggal']; ?>" />
        </div>
        <div class="form-group">
            <label for="time">Jam <?php echo form_error('jam') ?></label>
            <input type="time" class="form-control" name="jam" id="jam" placeholder="Jam" value="<?php echo $agenda['jam']; ?>" />
        </div>
        <div class="form-group">
            <label for="attenders">Attenders</label>

            <?php
            $dataEdit = array();
            if(!empty($agenda['attenders'])){
                $dataEdit = explode(', ', $agenda['attenders']); 
            }
            foreach ($users as $user) { ?>
            <label class="checkbox-inline">
            <input type="checkbox" name="attend[]" value="<?php echo $user['user_fullname']; ?>" checked="<?php in_array($user['user_fullname'], $dataEdit) ? true : false ?>" /><?php echo $user['user_fullname'] ;?>
          </label>
          <?php } ?>
      </div>
      <div class="form-group">
        <label for="enum">Status <?php echo form_error('status') ?></label>
        <select class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $agenda['status']; ?>" />
            <option><?php echo $agenda['status']; ?></option>
            <option name="active">Active</option>
            <option name="cancel">Cancel</option>
            <option name="pending">Pending</option>
            <option name="reschedule">Reschedule</option>
        </select>
    </div>
    <br>
    <input type="hidden" name="no_agenda" value="<?php echo $agenda['no_agenda']; ?>" /> 
    <button type="submit" class="btn btn-primary"><?php echo $agenda['button'] ?></button> 
    <a href="<?php echo site_url('agenda') ?>" class="btn btn-default">Cancel</a>
</form>
</body>
</html>