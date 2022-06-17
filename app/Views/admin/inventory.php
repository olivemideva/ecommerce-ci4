<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins&display=swap">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Great+Vibes" type="text/css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/admin.css'); ?>">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
      <th>Products</th>
      <th><a href="<?= base_url('Admin/add_item'); ?>" class = "btn btn-success">Update</a></th>
      </tr>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Itemname</th>
      <th scope="col">Price</th>
      <th scope="col">Description</th>
      <th scope="col">Image</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php
  
  if($item_data){
      foreach($item_data as $item){
          echo '<tr>
          <td>'.$item["id"].'</td>
          <td>'.$item["item_name"].'</td>
          <td>'.$item["price"].'</td>
          <td>'.$item["description"].'</td>
          <td>
             <img src="'.base_url('uploads/' .$item["image"]).'" height="150px" width="200px" alt="image">
          </td>
          <td><a href="'.base_url('Admin/fetch_item/' .$item["id"]).'" class = "btn btn-warning">Edit</a></td>
          <td><button type="button" onclick="delete_data('.$item["id"].')" class = "btn btn-danger">Delete</button></td>
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
    $pagination_link->setPath('Admin/inventory');

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
            window.location.href="<?php echo base_url(); ?>/Admin/delete_item/"+id;
        }
        return false;
    }
</script>