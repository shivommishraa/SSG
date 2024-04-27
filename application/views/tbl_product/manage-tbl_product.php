 <div class="dashboard-wrapper">
  <div class="dashboard-ecommerce">
    <div class="container-fluid dashboard-content ">
      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="page-header">
            <h2 class="pageheader-title">Manage Products</h2>
            <div class="page-breadcrumb">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>Dashboard" class="breadcrumb-link">Dashboard</a></li>
                  <li class="breadcrumb-item"><a href="">Product</a></li>
                  <li class="breadcrumb-item "><a href="">Manage Product</a></li>
                  
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
       <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
          <form  role="form" action="<?php echo site_url(); ?>Product/Tbl_productController/manageTbl_product" method="post">
           <div class="row col-md-12">
             <div class="col-md-3 card-header">
              <input type="text" name="product_name"  placeholder="Search By Name" class="form-control form-control ml-2"/></div>
              <div class="col-md-4 card-header">
                <select class="form-control form-control "  name="product_brand">
                 <option value="">Search By Brand</option>
                 <?php foreach($branddropdown as $row): ?>
                  <option value="<?php echo $row->brand_id; ?>" ><?php echo $row->brand_name; ?></option>
                <?php endforeach; ?>
              </select>
            </div>

            <div class="col-md-3 card-header">
              <button type="submit" class="btn btn-sm btn-info" name="search" >Search</button>
              <button class="btn btn-sm btn-danger"  onClick="return redirect('<?php echo base_url();?>Product/Tbl_productController/manageTbl_product');">Reset</button>
            </div>

            <div class="col-md-2 card-header text-right">
              <button class="btn btn-sm btn-primary"  onClick="return redirect('<?php echo site_url(); ?>Product/Tbl_productController/addTbl_product');"><i class="fa fa-plus" aria-hidden="true"></i> Add New</button>
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
          <?php if(!empty($tbl_products)) {?>
            <table class="table table-striped table-bordered first">
              <thead>
                <tr>
                 <th>SL No</th>
                 <th>Product Name</th>
                 <th>Brand</th>
                 <th>Status</th>
                 <th colspan="3">Actions</th>

               </tr>
             </thead>
             <tbody>
              <?php $i=1; foreach($tbl_products as $tbl_product) { ?>
               <tr>
                <td> <?php echo $i; ?> </td>
                <td> <?php echo $tbl_product->product_name ?></td>
                
                <td> <?php foreach($branddropdown as $row){
                  if($row->brand_id==$tbl_product->product_brand){
                    echo $row->brand_name;
                  }

                } ?></td> 


                <td><span <?php if($tbl_product->status==0){?> class="badge badge-success"<?php }else{ ?> class="badge badge-danger"<?php }?>>
                  <a style="color:#fff;" href="<?php echo site_url()?>Product/Tbl_productController/changeStatusTbl_product/<?php echo $tbl_product->id ?>" > <?php if($tbl_product->status==0){ echo "Activate"; } else { echo "Deactivate"; } ?></a></span></td>
                  
                  <td><a href="" onclick="javascript:load_marks(<?php echo $tbl_product->id ?>)" data-toggle="modal" data-target="#modal-info"><i class="fa fa-eye"style="color: green;"></i></a></td>

                  <td><a href="<?php echo site_url()?>Product/Tbl_productController/editTbl_product/<?php echo $tbl_product->id?>"><i class="fas fa-pencil-alt"style="color: blue;"></i></a></td>

                  <td><a href="<?php echo site_url()?>Product/Tbl_productController/deleteTbl_product/<?php echo $tbl_product->id?>" onclick="return confirm('are you sure to delete')"><i class="fa fa-trash"style="color: red;"></i></a></td>
                </tr>
                <?php $i++; } ?>
              </tbody>
            </table>
          <?php } else {?>
            <div class="alert alert-info" role="alert">
             <strong>No Product Record Found!</strong>
           </div>
         <?php } ?>

         <div class="dataTables_paginate paging_simple_numbers pt-2 "><?php echo $links; ?></div>
       </div>
     </div>
   </div>

 </div>
</div>
</div>


<!--Code start for print the data from database in popup box -->


<div class="modal modal-light   displaycontent" id="modal-info">
  <?php //include('adminviewpopup.php'); ?>
</div>
<script src="<?php echo base_url()  ?>Custom_JS/Product_JS/product.js" type="text/javascript"></script>
<script type="text/javascript">
 var baseURL ='<?php echo base_url();  ?>'
</script>

<!--Code End for print the data from database in popup box -->
