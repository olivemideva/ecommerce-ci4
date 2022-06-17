<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add user</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins&display=swap">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Great+Vibes" type="text/css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/admin.css'); ?>">
        <script src="https://www.gstatic.com/charts/loader.js"></script>
</head>
<body>
    <div class="included">
<?php include(APPPATH.'Views\templates\sidebar.php'); ?>
</div>

<div class="table">
<div class="row justify-content-center" style="margin-left: 200px;">
<a href="<?= base_url('Admin/customers'); ?>"><span class="las la-arrow-circle-left" id="back"></span></a> <br><br>
       <form class="input-group" method="POST" action="<?= base_url('Admin/add_users_validation'); ?>">
       <?= csrf_field(); ?>
       <div class="form-group">
         <label>Username</label>
       <input type="text" class="input-field" placeholder="Username" name="username" value="<?= set_value('username'); ?>">
        <span class ="text-danger"><?= isset($validation) ? display_error($validation, 'username') : '' ?></span>
        </div>
        <div class="form-group">
        <label>Firstname</label>
        <input type="text" class="input-field" placeholder="Firstname" name="firstname" value="<?= set_value('firstname'); ?>">
        <span class ="text-danger"><?= isset($validation) ? display_error($validation, 'firstname') : '' ?></span>
        </div>
        <div class="form-group">
        <label>Lastname</label>
        <input type="text" class="input-field" placeholder="Lastname" name="lastname" value="<?= set_value('lastname'); ?>">
        <span class ="text-danger"><?= isset($validation) ? display_error($validation, 'lastname') : '' ?></span>
        </div>
        <div class="form-group">
        <label>Email</label>
        <input type="email" class="input-field" placeholder="Email Address" name="email" value="<?= set_value('email'); ?>">
        <span class ="text-danger"><?= isset($validation) ? display_error($validation, 'email') : '' ?></span>
        </div>
        <div class="form-group">
        <label>Password</label>
        <input type="password" class="input-field" placeholder="Password" name="password" value="<?= set_value('password'); ?>">
        <span class ="text-danger"><?= isset($validation) ? display_error($validation, 'password') : '' ?></span>
        </div>
        <div class="form-group">
        <label>Confirm password</label>
        <input type="password" class="input-field" placeholder="Confirm Password" name="cpassword" value="<?= set_value('cpassword'); ?>">
        <span class ="text-danger"><?= isset($validation) ? display_error($validation, 'cpassword') : '' ?></span>
        </div>
        <div class="form-group">
        <label>Gender</label>
        <div class="input-field">
        <label for="male">Male</label>
        <input type="radio" id="male" name="gender" value="male">
        <label for="female" style="margin-left:40px;">Female</label>
        <input type="radio" id="female" name="gender" value="female">
        <span class ="text-danger"><?= isset($validation) ? display_error($validation, 'gender') : '' ?></span>
        </div>
        </div>
        <div class="form-group">
          <select name="role" class="input-field" value="<?= set_value('role'); ?>">
             <option selected>Role</option>
             <option value="1">Client</option>
             <option value="2">Admin</option>
          </select>
          <span class ="text-danger"><?= isset($validation) ? display_error($validation, 'role') : '' ?></span><br><br>
          </div>
          <div class="form-group">
        <button type="submit" class="btn btn-info" name="register">Add</button>
        </div>
        <div class="form-group">
        <?php if(!empty(session()->getFlashdata('fail'))): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
    <?php endif ?>
    </div>
    <div class="form-group">
    <?php if(!empty(session()->getFlashdata('success'))): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
    <?php endif ?>
    </div>
        </form>
        </div>
        </div>
        
</body>
</html>