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

    <h2>Add Tbl_brand</h2>  
    <form role="form" method="post" action="<?php echo site_url()?>/add-tbl_brand-post"  enctype="multipart/form-data" >
      <div class="form-group">
        <label for="brand_name">Brand_name:</label>
        <input type="text" class="form-control" brand_brand_id="brand_name" name="brand_name">
      </div>
      <div class="form-group">
        <label for="brand_image">Brand_image:</label>
        <input type="file" class="btn btn-primary" brand_brand_id="brand_image" name="brand_image">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>

</body>
</html>