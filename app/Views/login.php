<!DOCTYPE html>
<html lang="en">
  <head>
  <script src="https://kit.fontawesome.com/1c3de9b1bb.js" crossorigin="anonymous"></script>
  <title>Login page</title>

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
    <h1>Login</h1>

    <div class="social-icons1">
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
    </div>
    <form id="login" class="input-group" method="POST" action="<?= base_url('Loginandregister/check');?>">
    <?= csrf_field(); ?>
    <?php if(!empty(session()->getFlashdata('fail'))): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
    <?php endif ?>
    <?php if(!empty(session()->getFlashdata('success'))): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
    <?php endif ?>
        <input type="email" class="input-field translate-middle-y" placeholder="Email Address" name="email" value="<?= set_value('email') ?>">
        <span class ="text-danger"><?= isset($validation) ? display_error($validation, 'email') : '' ?></span>
        <input type="password" class="input-field translate-middle-y" placeholder="Password" name="password">
        <span class ="text-danger"><?= isset($validation) ? display_error($validation, 'password') : '' ?></span><br><br>
        <button type="submit" class="submit-btn translate-middle-y" name="login"> Login </button><br>
        <a href="register" class="link translate-middle-y">I don't have an account</a>
    </form>

</div>
</div>

  </body>
</html>