
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Nice Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>
<body>
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">Product Image</a>
      </div>
      <ul class="nav navbar-nav">
        <li><a href="<?php echo site_url(); ?>Product_Image/Product_imageController/ManageProduct_image">Manage Product Image</a></li>
        <li><a href="<?php echo site_url(); ?>Product_Image/Product_imageController/addProduct_image">Add Product Image</a></li>
      </ul>
    </div>
  </nav>

  <div class="container">

   <div class="row">
    <div class="col-xs-12 col-md-10 well">
     Product  : 
     <?php 
     $productname=$getproductname($product_image[0]->product_id);
     if(!empty($productname)){echo $productname[0]->product_name;}
     ?>
     <img class="img-thubnell" src="<?php echo base_url().'uploads/product_image/'. $product_image[0]->product_image ?>" height="100px" width="100px"/>
   </div>
 </div>

</div>

</body>
</html>