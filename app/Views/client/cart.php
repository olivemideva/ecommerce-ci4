<!doctype html>
<html lang="en">
  <head>
  <title>Cart</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/activity0.css'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/1c3de9b1bb.js" crossorigin="anonymous"></script>
       
        <meta name="veiwport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins&display=swap">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Great+Vibes" type="text/css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
    span{
        font-size: 50px;
        color: #fff;
    }
</style>
  </head>
  <body>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <div class="body">
    <?php include(APPPATH.'Views\templates\navbar.php'); ?>
</div>
<div class="table">
<table class="table table-striped">
  <thead>
      <tr>
      <th>Cart</th>
      </tr>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Itemname</th>
      <th scope="col">Price</th>
      <th scope="col">Description</th>
      <th scope="col">Image</th>
      <th scope="col">Quantity</th>
      <th scope="col">Sub-Total</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php
  
  if($items){
      foreach($items as $item){
          echo '<tr>
          <td>'.$item["id"].'</td>
          <td>'.$item["item_name"].'</td>
          <td>'.$item["price"].'</td>
          <td>'.$item["description"].'</td>
          <td>
             <img src="'.base_url('uploads/' .$item["image"]).'" height="150px" width="200px" alt="image">
          </td>
          <td>'.$item["quantity"].'</td>
          <td>'.$item["price"] * $item["quantity"].'</td>
          <td><a href="'.base_url('' .$procuct["id"]).'" class = "btn btn-danger">Remove</a></td>
          </tr>';
      }
  }

  ?>
  </tbody>
</table>
</div>

  </body>
</html>
