<!doctype html>
<html lang="en">
  <head>
  <title>Shop</title>
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

            
        <div class="container-fluid">
            <h3 class="text-center"style="color:white;">Shop</h3>
            <div class="col-md-12">
              <div class="row">
        <?php if($categories): ?>
        <?php foreach($categories as $products): ?>

              <div class="col-md-2">
                <img src="<?=base_url('uploads/' .$products["image"])?>" height="150px" width="200px" alt="image">
                <h2 class="text-center" style="color:white; font-family: 'Raleway', sans-serif; font-weight: 500;"><?=$products['item_name']; ?></h2>
                <p style=" color:white; font-size: 16px; font-weight: 500; font-family: 'Raleway', sans-serif;"><?=$products['description']; ?></p>
                <p style=" color:white; font-size: 20px; font-weight: 500; font-family: 'Raleway', sans-serif;"><?=$products['category_name']; ?></p>
                <h2 class="text-center" style="color:green; font-family: 'Raleway', sans-serif; font-weight: 800;">$<?= number_format($products['price'],2); ?></h2>

                <a href="<?= base_url('cart/buy/' .$products["id"]) ?>" style="border-radius:20px;" class="btn btn-primary btn-block my-2">Add to Cart</a>
              </div>

          <?php endforeach ?>
            <?php endif ?>
            

          </div>
</div>


  </body>
</html>
