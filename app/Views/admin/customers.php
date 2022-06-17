<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customers</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins&display=swap">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Great+Vibes" type="text/css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/admin.css'); ?>">
        <script src="https://www.gstatic.com/charts/loader.js"></script>
</head>
<body>
    <div class="included">
<?php include(APPPATH.'Views\templates\sidebar.php'); ?>
</div>

<div class="table">
<table class="table table-striped">
  <thead>
      <tr>
      <th>Users</th>
      <th><a href="<?= base_url('Admin/add_users'); ?>" class = "btn btn-success">Update</a></th>
      </tr>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Username</th>
      <th scope="col">Firstname</th>
      <th scope="col">Lastname</th>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
      <th scope="col">Gender</th>
      <th scope="col">Role</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

  <?php
  
  if($user_data){
      foreach($user_data as $user){
          echo '<tr>
          <td>'.$user["id"].'</td>
          <td>'.$user["username"].'</td>
          <td>'.$user["firstname"].'</td>
          <td>'.$user["lastname"].'</td>
          <td>'.$user["email"].'</td>
          <td>'.$user["password"].'</td>
          <td>'.$user["gender"].'</td>
          <td>'.$user["role"].'</td>
          <td><a href="'.base_url('Admin/fetch_user/' .$user["id"]).'" class = "btn btn-warning">Edit</a></td>
          <td><button type="button" onclick="delete_data('.$user["id"].')" class = "btn btn-danger">Delete</button></td>
          </tr>';
      }
  }

  ?>
  </tbody>
</table>
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

<div>
<?php

if($pagination_link){
    $pagination_link->setPath('Admin/customers');

    echo $pagination_link->links();
}

?>
</div>
</div>
</body>
</html>
<style>
    .pagination li a{
        position: relative;
        display: block;
        padding: .5rem .75rem;
        margin-left: 200px;
        line-height: 1.25;
        color: #007bff;
        background-color: #fff;
        border: 1px solid #dee2e6;
    }
    .pagination li.active a{
        z-index: 1;
        color: #fff;
        background-color: #007bff;
        border-color: #007bff;
    }
</style>
<script>
    function delete_data(id)
    {
        if(confirm("Are you sure you want to delete this information?"))
        {
            window.location.href="<?php echo base_url(); ?>/Admin/delete_user/"+id;
        }
        return false;
    }
</script>