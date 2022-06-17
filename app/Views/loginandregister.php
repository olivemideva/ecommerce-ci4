<!DOCTYPE html>
<html lang="en">
  <head>
  <script src="https://kit.fontawesome.com/1c3de9b1bb.js" crossorigin="anonymous"></script>
  <title>Login and Registration page</title>

    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/activity0.css'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Great+Vibes" type="text/css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    
  </head>
  <body>
  <a href="#" class="logo">Nguø</a>
      
  <div class="one">

<div class="form-box">
    <div class="button-box">
        <div id="btn"></div>
        <button type="button" class="toggle-btn" onclick="login()">Login</button>
        <button type="button" class="toggle-btn" onclick="register()">Register</button>
    </div>
    <div class="social-icons1">
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
    </div>
    <form id="login" class="input-group" method="POST" action="<?= base_url('Loginandregister/login');?>">
        <input type="text" class="input-field" placeholder="Email Address" name="email" value="<?= set_value('user-email') ?>" required>
        <input type="password" class="input-field" placeholder="Password" name="password" required>
        <button type="submit" class="submit-btn" name="login"> Login </button><br>
    </form>
    <form id="register" class="input-group" method="POST" action="<?= base_url('Loginandregister/register');?>">
    <?= csrf_field(); ?>
        <input type="text" class="input-field" placeholder="Username" name="username">
        <span class="text-danger"><?= isset($validation) ? display_error($valiadation, 'username') : '' ?></span>
        <input type="text" class="input-field" placeholder="Firstname" name="firstname">
        <span class="text-danger"><?= isset($validation) ? display_error($valiadation, 'firstname') : '' ?></span>
        <input type="text" class="input-field" placeholder="Lastname" name="lastname">
        <span class="text-danger"><?= isset($validation) ? display_error($valiadation, 'lastname') : '' ?></span>
        <input type="email" class="input-field" placeholder="Email Address" name="email">
        <span class="text-danger"><?= isset($validation) ? display_error($valiadation, 'email') : '' ?></span>
        <input type="password" class="input-field" placeholder="Password" name="password">
        <span class="text-danger"><?= isset($validation) ? display_error($valiadation, 'password') : '' ?></span>
        <input type="password" class="input-field" placeholder="Confirm Password" name="cpassword">
        <span class="text-danger"><?= isset($validation) ? display_error($valiadation, 'cpassword') : '' ?></span>
        <label for="male">Male</label>
        <input type="radio" id="male" name="gender" value="male">
        <label for="female" style="margin-left:40px;">Female</label>
        <input type="radio" id="female" name="gender" value="female">
        <span class="text-danger"><?= isset($validation) ? display_error($valiadation, 'gender') : '' ?></span>
          <select name="role" class="input-field">
             <option selected>Role</option>
             <option value="1">Client</option>
             <option value="2">Admin</option>
          </select>
          <span class="text-danger"><?= isset($validation) ? display_error($valiadation, 'role') : '' ?></span>
        <button type="submit" class="submit-btn" name="register"> Register</button>
    </form>
    <section id="login-error">
       <?php if(session()->getFlashdata('msg')):?>
                    <div class="alert alert-info">
                       <?= session()->getFlashdata('msg') ?>
                    </div>
                <?php endif;?>
      </section>
</div>
</div>

<script src="<?php echo base_url('assets/js/loginandregister.js'); ?>"></script>

  </body>
</html>