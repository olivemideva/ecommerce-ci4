<!DOCTYPE html>
<html lang="en">
  <head>
  <script src="https://kit.fontawesome.com/1c3de9b1bb.js" crossorigin="anonymous"></script>
  <title>Registration page</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Great+Vibes" type="text/css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        
        <link rel="stylesheet" href="<?php echo base_url('assets/css/activity0.css'); ?>">
  </head>
  <body>
  <a href="#" class="logo">Nguø</a>
      
  <div class="one">

<div class="form-box">
<h1>Register</h1>
    <div class="social-icons1">
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
    </div>
    <form class="input-group" method="POST" action="<?= base_url('Loginandregister/save'); ?>">
    <?= csrf_field(); ?>
    <?php if(!empty(session()->getFlashdata('fail'))): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
    <?php endif ?>
    <?php if(!empty(session()->getFlashdata('success'))): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
    <?php endif ?>
        <input type="text" class="input-field" placeholder="Username" name="username" value="<?= set_value('username'); ?>">
        <span class ="text-danger"><?= isset($validation) ? display_error($validation, 'username') : '' ?></span>
        <input type="text" class="input-field" placeholder="Firstname" name="firstname" value="<?= set_value('firstname'); ?>">
        <span class ="text-danger"><?= isset($validation) ? display_error($validation, 'firstname') : '' ?></span>
        <input type="text" class="input-field" placeholder="Lastname" name="lastname" value="<?= set_value('lastname'); ?>">
        <span class ="text-danger"><?= isset($validation) ? display_error($validation, 'lastname') : '' ?></span>
        <input type="email" class="input-field" placeholder="Email Address" name="email" value="<?= set_value('email'); ?>">
        <span class ="text-danger"><?= isset($validation) ? display_error($validation, 'email') : '' ?></span>
        <input type="password" class="input-field" placeholder="Password" name="password" value="<?= set_value('password'); ?>">
        <span class ="text-danger"><?= isset($validation) ? display_error($validation, 'password') : '' ?></span>
        <input type="password" class="input-field" placeholder="Confirm Password" name="cpassword" value="<?= set_value('cpassword'); ?>">
        <span class ="text-danger"><?= isset($validation) ? display_error($validation, 'cpassword') : '' ?></span>
        <div class="input-field">
        <label for="male">Male</label>
        <input type="radio" id="male" name="gender" value="male">
        <label for="female" style="margin-left:40px;">Female</label>
        <input type="radio" id="female" name="gender" value="female">
        </div>
        <span class ="text-danger"><?= isset($validation) ? display_error($validation, 'gender') : '' ?></span>
          <select name="role" class="input-field">
             <option selected>Role</option>
             <option value="1">Client</option>
             <option value="2">Admin</option>
          </select>
          <span class ="text-danger"><?= isset($validation) ? display_error($validation, 'role') : '' ?></span><br><br>
        <button type="submit" class="submit-btn" name="register"> Register</button><br><br>
        <a href="login" class="link">I already have an account</a>
    </form>
</div>
</div>
  </body>
</html>