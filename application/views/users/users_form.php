<!doctype html>
<html>
<head>
    <title>User Create/Update</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
    <style>
        body{
            padding: 15px;
        }
    </style>
</head>
<body>
    <h2 style="margin-top:0px">Users <?php echo $button ?></h2>
    <form action="<?php echo $action; ?>" method="post">
       <div class="form-group">
        <label for="varchar">Username <?php echo form_error('username') ?></label>
        <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" />
    </div>
    <div class="form-group">
        <label for="varchar">Password <?php echo form_error('password') ?></label>
        <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" />
    </div>
    <div class="form-group">
        <label for="varchar">User Mail <?php echo form_error('user_mail') ?></label>
        <input type="text" class="form-control" name="user_mail" id="user_mail" placeholder="User Mail" value="<?php echo $user_mail; ?>" />
    </div>
    <div class="form-group">
        <label for="varchar">User Fullname <?php echo form_error('user_fullname') ?></label>
        <input type="text" class="form-control" name="user_fullname" id="user_fullname" placeholder="User Fullname" value="<?php echo $user_fullname; ?>" />
    </div>
    <div class="form-group">
        <label for="enum">User Level <?php echo form_error('user_level') ?></label>
        <select class="form-control" name="user_level" id="user_level" placeholder="User Level" value="<?php echo $user_level; ?>">
          <option><?php echo $user_level; ?></option>
          <option value="administrator">Administrator</option>
          <option value="superuser">Superuser</option>
      </select>
  </div>
  <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
  <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
  <a href="<?php echo site_url('users') ?>" class="btn btn-default">Cancel</a>
</form>
</body>
</html>
