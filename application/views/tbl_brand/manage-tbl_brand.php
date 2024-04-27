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
            <h2 class="pageheader-title">Manage Brand</h2>
            <div class="page-breadcrumb">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>Dashboard" class="breadcrumb-link">Dashboard</a></li>
                  <li class="breadcrumb-item"><a href="">Brand</a></li>
                  <li class="breadcrumb-item "><a href="">Manage Brand</a></li>
                  
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
       <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
          <form  role="form" action="<?php echo site_url(); ?>Brand/Tbl_brandController/ManageTbl_brand" method="post">
           <div class="row col-md-12">
             <div class="col-md-3 card-header"></div>
             <div class="col-md-4 card-header">
              <input type="text" name="brand_name"  placeholder="Search By Name" class="form-control form-control ml-2"/></div>
              

              <div class="col-md-3 card-header">
                <button type="submit" class="btn btn-sm btn-info" name="search" >Search</button>
                <button class="btn btn-sm btn-danger"  onClick="return redirect('<?php echo base_url();?>Brand/Tbl_brandController/ManageTbl_brand');">Reset</button>
              </div>

              <div class="col-md-2 card-header text-right">
                <button class="btn btn-sm btn-primary"  onClick="return redirect('<?php echo site_url(); ?>Brand/Tbl_brandController/addTbl_brand');"><i class="fa fa-plus" aria-hidden="true"></i> Add New</button>
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
            <?php if(!empty($tbl_brands)) {?>
              <table class="table table-striped table-bordered first">
                <thead>
                  <tr>
                   <th>SL No</th>
                   <th>Brand Name</th>
                   <th>Image</th>
                   <th>Status</th>
                   <th colspan="2">Actions</th>
                 </tr>
               </thead>
               <tbody>
                <?php $i=1; foreach($tbl_brands as $tbl_brand) { ?>
                 <tr>
                  <td> <?php echo $i; ?> </td>
                  <td> <a href="<?php echo site_url()?>Brand/Tbl_brandController/viewTbl_brand/<?php echo $tbl_brand->brand_id?>" > <?php echo $tbl_brand->brand_name ?> </a> </td>
                  <td><ul><li><img class="img-responsive" src="<?php echo base_url().'uploads/tbl_brand/'.$tbl_brand->brand_image ?>" alt="Image" height="50px"width="50px" style="border: 1px solid gray"></li></ul></td>
                  

                  <td><span <?php if($tbl_brand->status==0){?> class="badge badge-danger"<?php }else{ ?> class="badge badge-success"<?php }?>>
                    <a style="color:#fff;" href="<?php echo site_url()?>Brand/Tbl_brandController/changeStatusTbl_brand/<?php echo $tbl_brand->brand_id ?>"  > <?php if($tbl_brand->status==1){ echo "Activate"; } else { echo "Deactivate"; } ?></a></span></td>
                    

                    <td><a href="<?php echo site_url()?>Brand/Tbl_brandController/editTbl_brand/<?php echo $tbl_brand->brand_id?>"><i class="fas fa-pencil-alt"style="color: blue;"></i></a></td>


                    <td><a href="<?php echo site_url()?>Brand/Tbl_brandController/deleteTbl_brand/<?php echo $tbl_brand->brand_id?>" onclick="return confirm('are you sure to delete')"><i class="fa fa-trash"style="color: red;"></i></a></td>

                  </tr>
                  <?php $i++; } ?>
                </tbody>
              </table>
            <?php } else {?>
              <div class="alert alert-info" role="alert">
               <strong>No Brand Record Found!</strong>
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
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  
  