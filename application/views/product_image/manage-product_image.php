 <style>
 
 ul li {     
  list-style:none;           
}
ul li img {
  cursor: pointer;
}




</style>
<div class="dashboard-wrapper">
  <div class="dashboard-ecommerce">
    <div class="container-fluid dashboard-content ">
      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="page-header">
            <h2 class="pageheader-title">Manage Product Image
            </h2>
            <div class="page-breadcrumb">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>Dashboard" class="breadcrumb-link">Dashboard</a></li>
                  <li class="breadcrumb-item"><a href="">Product Image</a></li>
                  <li class="breadcrumb-item "><a href="">Manage Product Image</a></li>
                  
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
       <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
          <form  role="form" action="<?php echo site_url(); ?>Product_Image/Product_imageController/ManageProduct_image" method="post">
           <div class="row col-md-12">
             <div class="col-md-3 card-header">
              <input type="hidden" name=""  placeholder="Search By Name" class="form-control form-control ml-2"/></div>
              <div class="col-md-4 card-header">
                <select class="form-control form-control "  name="product_id">
                 <option value="">Search By Name</option>
                 <?php foreach($productdropdown as $row): ?>
                  <option value="<?php echo $row->id; ?>" ><?php echo $row->product_name; ?></option>
                <?php endforeach; ?>
              </select>
            </div>

            <div class="col-md-3 card-header">
              <button type="submit" class="btn btn-sm btn-info" name="search" >Search</button>
              <button class="btn btn-sm btn-danger"  onClick="return redirect('<?php echo base_url();?>Product_Image/Product_imageController/ManageProduct_image');">Reset</button>
            </div>

            <div class="col-md-2 card-header text-right">
              <button class="btn btn-sm btn-primary"  onClick="return redirect('<?php echo site_url(); ?>Product_Image/Product_imageController/addProduct_image');"><i class="fa fa-plus" aria-hidden="true"></i> Add New</button>
            </div>
            
            
          </div>
        </form>
        <?php if($this->session->flashdata('success')){ ?>
         <div class="alert alert-success">
          <strong><span class="glyphicon glyphicon-ok"></span>   <?php echo $this->session->flashdata('success'); ?></strong>
        </div>
      <?php } ?>

      <div class="card-body">
        <div class="table-responsive">
         
          <?php if(!empty($product_images)) {?>
            <table class="table table-striped table-bordered first">
              <thead>
                <tr>
                 <th>Sr No</th>
                 <th>Product</th>
                 <th>Image</th>
                 <th>Status</th>
                 <th colspan="2">Actions</th>
               </tr>
             </thead>
             <tbody>
              <?php $i=1; foreach($product_images as $product_image) { ?>
               <tr>
                 <td> <?php echo $i; ?> </td>
                 <td> <?php 
                 $productname=$getproductname($product_image->product_id);
                 if(!empty($productname)){echo $productname[0]->product_name;}
                 ?></td>
                 <td><ul><li><img class="img-responsive" src="<?php echo base_url().'uploads/product_image/'.$product_image->product_image ?>" alt="Image" height="50px"width="50px" style="border: 1px solid gray"></li></ul></td>

                 <td><span <?php if($product_image->status==0){?> class="badge badge-success"<?php }else{ ?> class="badge badge-danger"<?php }?>>
                  <a style="color:#fff;" href="<?php echo site_url()?>Product_Image/Product_imageController/changeStatusProduct_image/<?php echo $product_image->id ?>"  > <?php if($product_image->status==0){ echo "Activate"; } else { echo "Deactivate"; } ?></a></span></td>
                  

                  <td><a href="<?php echo site_url()?>Product_Image/Product_imageController/editProduct_image/<?php echo $product_image->id?>"><i class="fas fa-pencil-alt"style="color: blue;"></i></a></td>


                  <td><a href="<?php echo site_url()?>Product_Image/Product_imageController/deleteProduct_image/<?php echo $product_image->id?>" onclick="return confirm('are you sure to delete')"><i class="fa fa-trash"style="color: red;"></i></a></td>

                </tr>
                <?php $i++; } ?>
              </tbody>
            </table>
          <?php } else {?>
            <div class="alert alert-info" role="alert">
             <strong>No Product Image Record Found!</strong>
           </div>
         <?php } ?>

         <div class="dataTables_paginate paging_simple_numbers pt-2 "><?php echo $links; ?></div>
       </div>
     </div>
   </div>

 </div>
</div>
</div>



<div class="modal fade" id="myModal" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">   
      <h4  class="btn btn-block">
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button> </h4>  
        <div class="modal-body text-center">

        </div>
      </div>
    </div>
  </div>
  
