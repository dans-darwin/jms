<!doctype html>
<html>
<head>
    <title>Read Users</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
    <style>
        body{
            padding: 15px;
        }
    </style>
</head>
<body>
    <h2 style="margin-top:0px">Users Read</h2>
    <table class="table">
       <tr><td>Username</td><td><?php echo $username; ?></td></tr>
       <tr><td>Password</td><td><input type="password" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" /></td></tr>
       <tr><td>User Mail</td><td><?php echo $user_mail; ?></td></tr>
       <tr><td>User Fullname</td><td><?php echo $user_fullname; ?></td></tr>
       <tr><td>User Level</td><td><?php echo $last_update_by; ?></td></tr>

       <tr><td></td><td><a href="<?php echo site_url('users') ?>" class="btn btn-default">Cancel</a></td></tr>
   </table>
</body>
</html>