<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add sub-categories</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins&display=swap">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Great+Vibes" type="text/css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/admin.css'); ?>">
        <script src="https://www.gstatic.com/charts/loader.js"></script>
        <style>
          form{
            width: 50%;
            margin-left: 345px;
          }
          form div{
            margin-top: 50px;
          }
        </style>
</head>
<body>
<div class="included">
<?php include(APPPATH.'Views\templates\sidebar.php'); ?>
</div>

<div id="content">
    <form method="POST" action="<?= base_url('Admin/storesubcategory'); ?>">
    <?= csrf_field(); ?>
       <div>
       <label> Sub-Category </label>
       <input type="text" class="input-field" placeholder="Sub-category name" name="sub_category_name" value="<?= set_value('sub_category_name'); ?>">
        <span class ="text-danger"><?= isset($validation) ? display_error($validation, 'sub_category_name') : '' ?></span>
        </div>

        <div>
        <label> Categories </label>
        <select name="category_id">
        <?php
        
         foreach ($sub_category as $item): ?>
         
          <option value='<?= $item->id ?>'><?= json_encode ($item->category_name)?></option>";
          
          <?php endforeach;?>
        </select>
    <span class ="text-danger"><?= isset($validation) ? display_error($validation, 'category_name') : '' ?></span>
        </div>

        <div>
        <button type="submit" class="btn btn-primary" name="register">Add</button>
        </div>

    </form>

    <a href="<?= base_url('Admin/admindashboard'); ?>"><span class="las la-arrow-circle-left" id="back"></span></a> <br><br>

</div>

        
</body>
</html>