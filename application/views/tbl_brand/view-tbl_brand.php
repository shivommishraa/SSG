  <!DOCTYPE html>
  <html lang="en">
  <head>
    <title>Nice Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="wbrand_idth=device-wbrand_idth, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  </head>
  <body>
    <nav class="navbar navbar-inverse">
      <div class="container-flubrand_id">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">Brand</a>
        </div>
        <ul class="nav navbar-nav">
          <li class="active" ><a href="<?php echo site_url(); ?>Brand/Tbl_brandController/ManageTbl_brand">Manage Tbl_brand</a></li>
          <li><a href="<?php echo site_url(); ?>Brand/Tbl_brandController/addTbl_brand">Add Tbl_brand</a></li>
        </ul>
      </div>
    </nav>
    <div class="container">

     <div class="row">
      
       <div class="col-md-6 ">
        Brand Name  :  <?php echo $tbl_brand[0]->brand_name ?> &nbsp;
        <img class="img-thubnell" src="<?php echo base_url().'uploads/tbl_brand/'.$tbl_brand[0]->brand_image ?>" alt="Image" height="150px"width="150px">
      </div>
      
    </div>
  </div>

</div>

</body>
</html>