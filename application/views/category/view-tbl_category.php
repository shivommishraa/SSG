 <!DOCTYPE html>
 <html lang="en">
 <head>
  <title>Nice Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="wcategory_idth=device-wcategory_idth, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>
<body>
  <nav class="navbar navbar-inverse">
    <div class="container-flucategory_id">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">Category</a>
      </div>
      <ul class="nav navbar-nav">
        <li class="active" ><a href="<?php echo site_url(); ?>Category/Category_Controller/ManageTbl_category">Manage Category</a></li>
        <li><a href="<?php echo site_url(); ?>Category/Category_Controller/addTbl_category">Add Category</a></li>
      </ul>
    </div>
  </nav>

  <div class="container">

   <div class="row well">
    
     <div class="col-md-6 ">
      Category Name  :  <?php echo $tbl_brand[0]->category_name ?> 
    </div>
    <div class="col-md-6 ">
      Parent  :  <?php if($tbl_brand[0]->parent_id!=0){  $pname=$getparent($tbl_brand[0]->parent_id);
        if(!empty($pname)){ echo $pname[0]->category_name;}  }else{ echo '--';}?> 
      </div>
      
    </div>
  </div>

</div>

</body>
</html>